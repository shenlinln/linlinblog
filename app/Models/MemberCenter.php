<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCenter extends Model
{
    protected  $table  = 'member_center';
    public $timestamps = false;
    
    
    public function member_login($name,$password){

       $user_login = $this::where('nickname', $name)->where('password', $password)->first();
       if(!empty($user_login)){
           return true;
       }else{
           throw new \Exception("查询失败");
       }
                
    }
    
    public function member_salt($name){
        $username = $this::where('nickname',$name)->first();
        if(!empty($username)){
            $salt = $username->salt;
            return $salt;
        }else{
            throw new \Exception("没有找到对应的用户昵称，查询失败");
        }
        
        
        
    }
    
    public function member_center_add($password,$nickname,$salt){
        

        if(isset($password) && !empty($password)){
            $this->password = $password;
        }
        if(isset($nickname) && !empty($nickname)){
            $this->nickname = $nickname;
        }
        $this->username = '';
        $this->usersex = 0;
        $this->birth_year = '';
        $this->birth_month = '';
        $this->birth_day = '';
        $this->province = '';
        $this->city = '';
        $this->area = '';
        $this->signature = '';
        $this->mobile = '';
        $this->head_portrait = '';
        $this->freeze = 0;
        $this->salt = $salt;
        $this->create_at = time();
        $this->update_at = 0;
        $result = $this->save();
        return $result;
        
        
    }
}
