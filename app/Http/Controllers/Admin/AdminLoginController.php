<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DesignPatterns\ConcreteFactory;

class AdminLoginController extends Controller
{
    
    protected $factory;
    protected  function setClass($class){
        $this->factory = new ConcreteFactory();
        $data = $this->factory->createVehicle($class);
        return $data;
    }
    public function AdminLogin(Request $request){
        if($request->isMethod('post')){
            $params = $request->except('_token');
            $common = $this->setClass('common');
            $data = ['username' => trim($params['adminuser'])];
            $admin = $this->setClass('admin');
            if(is_object($admin)){
            $user_data = $admin->query_username($data);
            if(!empty($user_data)){
            $password = $common->encrypt_password(trim($params['adminpass']),$user_data['salt']);
            $p_data = ['id' => $user_data['id'],'password' => $password];
            $result = $admin->verification_login($p_data);
            if(!empty($result)){
                $request->session()->put('username', $data['username']);
                return json_encode(['bool' => true,'message' => '登录成功']);
            }else{
                return json_encode(['bool' => false,'message' => '密码错误']);
            }
            }else{
                //用户名不存在
                return json_encode(['bool' => false,'message' => '用户名不存']);
            }
            }else{
                return json_encode(['bool' => false,'message' => '请求失败']);
                
            }
        }
        return view('admin.login.login');
    }
    
    public function Admin_Users_Add(Request $request){
        $data = $request->all();
        $common = $this->setClass('common');
        $salt = $common->getRandomStr(4);
        var_dump($data);die();
        
    }
}
