<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DesignPatterns\ConcreteFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Common\JSMS;
use Illuminate\Support\Facades\Log;
class LoginController extends Controller
{
    //
    protected $factory;
    protected $model_membercenter;
    protected  function setClass($class){
        $this->factory = new ConcreteFactory();
        $data = $this->factory->createVehicle($class);
        return $data;
    }
    private string  $account_number;
    private string  $password;
    private string $verification;
    private string $nickname;
    private string $salt;
  
    const  EMAIL = 'shen_lin_msof@hotmail.com';
    const EMAILPASSWORD = 'SLL&%84869605';
    const SECURE = 'STARTTLS';
    const HOST = 'smtp.office365.com';
    const  APPKEY = "01bc1da35c1959ff5525f0ad";
    const MASTERSECRET = "f3fed959cb7fbf31814b3e0f";
    public function Login(Request $request){
    
        if($request->isMethod('post')){
            
            $params = $request->all();
            $code = $params['code'];
            $getcode = $request->session()->get('code');
            if(strtolower($code) != $getcode){
                return json_encode(['bool' => false,'message' => '验证码输入有误，请重新输入']);
            }
            
            $this->model_membercenter = $this->setClass('membercenter');
            
            $this->nickname = trim($params['nickname']);
            try{
              $this->salt = $this->model_membercenter->member_salt($this->nickname);
             
              $common = $this->setClass('common');
              $this->password = $common->encrypt_password(trim($params['password']),$this->salt);
              try{
                  $this->model_membercenter->member_login($this->nickname,$this->password);
                  return json_encode(['status' => 200,'message' => '登陆成功']);
              }catch(\Exception $e){
                  Log::debug($e->getMessage());
                  return json_encode(['status' => 201,'message' => '登陆失败']);
              }
            }catch (\Exception $e){
                Log::debug($e->getMessage());
                return json_encode(['bool' => false,'message' => '用户名不存在，请您先注册，后登陆']);
               // echo '用户查询失败： ', $e->getMessage();
            }
            
           
            //var_dump($this->salt);die();
        }
       // 
        return view('user.login');
    }
    public  function captcha(Request $request)
    {
        $validateCode = $this->setClass('validateCode');
        $validateCode->doimg();
        $code = $validateCode->getCode();
        $request->session()->put('code', $code);
        
        
    }
    public function Registered(Request $request){
        if($request->isMethod('post')){
            $data = $request->except('_token');
            
            $this->account_number = trim($data['account_number']);
            $this->verification = trim($data['verification']);
            $this->password = trim($data['password']);
            $this->nickname = trim($data['nickname']);
          
            $getcode = $request->session()->get('code');
            if(!preg_match_all("/^\w{3,}@([a-z]{2,7}|[0-9]{3})\.(com|cn)$/",$this->account_number)){
                return json_encode(['bool' => false,'message' => '*邮箱错误','Error_Message' => 'Account_number_Message']);
            }
            if(strlen($this->password) > 32  || strlen($this->password) < 6){
                return json_encode(['bool' => false,'message' => '*密码长度过短','Error_Message' => 'Password_Message']);
            }
            if(strtolower($this->verification) != $getcode){
                return json_encode(['bool' => false,'message' => '*验证码输入有误，请重新输入','Error_Message' => 'Verification_Message']);
            }
            
           $common = $this->setClass('common');
           $this->salt = $common->getRandomStr(4);
           $membercenter = $this->setClass('membercenter');
           $data = $membercenter->member_center_add($this->account_number,$common->encrypt_password($this->password,$this->salt),$this->nickname,$this->salt);
           if(!empty($data)){
              return json_encode(['bool' => true,'message' => '注册成功']);
           }else{
              return json_encode(['bool' => false,'message' => '添加失败']);
           }
            
        }
        return view('user.registered');
    }
    
    
    public function verificationMessage(Request $request){
        
        
        if($request->isMethod('post')){
            
                $phone = $request->except('_token');
                
                $appKey = self::APPKEY;
                $masterSecret = self::MASTERSECRET;
                $client = new JSMS($appKey, $masterSecret);
                $result =  $client->sendCode($phone['phone'],1);
                $msg_id = $result['body']['msg_id'];
                return json_encode(['bool' => 1,'msg_id' => $msg_id]);
          
        }
        
    }
    public function Mailbox_Verification(Request $request){
        if($request->isMethod('post')){
            $random = '';
            $data = $request->except('_token');
            $this->nickname = trim($data['nickname']);
            $this->account_number = trim($data['account_number']);
            $common = $this->setClass('common');
            $random = $common->getRandomNumber(4);
            Redis::SET($this->account_number,$random);
           
            $table ='<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                 <tbody><tr style=""><td height="28" style="line-height:28px;">&nbsp;</td></tr><tr><td style="">
                 <span class="mb_text" style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823;">'.$this->nickname.'，你好：您的验证码 <h1>'.$random.'</h1></span>
                </td></tr><tr style=""><td height="28" style="line-height:28px;">&nbsp;</td></tr><tr><td style="">
                <span class="mb_text" style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823;">你已经注册了 PHP中文网。请验证帐户，完成注册步骤。</span>
                </td></tr></tbody></table>';
             $mail = $this->setClass('phpmailer');                            
          try { 
               //服务器配置
             $mail->CharSet ="UTF-8";//设定邮件编码
             $mail->SMTPDebug = 0;// 调试模式输出
             $mail->isSMTP();// 使用SMTP
             $mail->Host = self::HOST;// SMTP服务器
             $mail->SMTPAuth = true;// 允许 SMTP 认证
             $mail->Username = self::EMAIL;// SMTP 用户名  即邮箱的用户名
             $mail->Password = self::EMAILPASSWORD; // SMTP 密码  部分邮箱是授权码(例如163邮箱)
             $mail->SMTPSecure = self::SECURE;// 允许 TLS 或者ssl协议
             $mail->Port = 587;
             $mail->setFrom(self::EMAIL, 'PHP中文网');  //发件人
             $mail->addAddress($this->account_number, $this->nickname);  // 收件人
            //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
           // $mail->addReplyTo('xxxx@163.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
            //$mail->addCC('cc@example.com');//抄送
            //$mail->addBCC('bcc@example.com');//密送
            //发送附件
            // $mail->addAttachment('../xy.zip');// 添加附件
            // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名
            //Content
             $mail->isHTML(true);// 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
             $mail->Subject = '您好，请查收验证码';
             $mail->Body    = $table;
             $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';
             $mail->send();
             $request->session()->put('email',$this->account_number);
            return json_encode(['bool' => true]);
        } catch (\Exception $e) {
            echo '邮件发送失败: ', $mail->ErrorInfo;
        }
        }
        return view('web.login.mailbox_verification');
    }
    
    public function Mailbox_Code(Request $request){
        if($request->isMethod('post')){
            $data = $request->except('_token');
            $email = $request->session()->get('email');
            $input_code = trim($data['code']);
            $server_code = Redis::GET($email);
           if(strcasecmp($input_code,$server_code) == 0){
            
                echo '验证成功';
            }else{
                echo '验证失败';
            }
        }
        
    }
    
}
