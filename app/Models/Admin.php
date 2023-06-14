<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Common\CommonFunction;
use Illuminate\Support\Facades\Validator;

class Admin extends Model
{
    //
    protected  $table  = 'admin';
    public $timestamps = false;

    
    public function query_username($request){
        $user_data = $this::select('id','adminuser','adminpass','salt')->where('adminuser', $request['username'])->first();
        return $user_data;
    }
    public function verification_login($request){
        $user = $this::where('id', $request['id'])->where('adminpass', $request['password'])->first();
        return $user;
    }
    
    public function admin_list(){
        
        $list = $this::where('id','>','0')->orderBy('id','asc')->paginate(10);
        
        return $list;
    }
    
    public function admin_desc()
    {
        
        $list = $this::where('id','>','0')->orderBy('id','desc')->first();
        
        return $list;
    }
    
    /**
     * add data
     * auth :shenll
     */
    public function store($request)
    {
        $rules = [
            'username' => 'required|string',
            'password' => 'required'
        ];
        
        $validate = Validator::make($request, $rules);
        $cf = new CommonFunction();
        if ($validate->fails()) {
            return $validate->messages()->first();
        }
        if(isset($request['username']) && !empty($request['username'])){
            $this->adminuser = $request['username'];
        }
        if(isset($request['password']) && !empty($request['password'])){
            $this->adminpass =$cf->encrypt_password($request['password']);
        }
        if(isset($request['adminemail']) && !empty($request['adminemail'])){
            $this->adminemail = $request['adminemail'];
        }else{
            $this->adminemail = '0';
        }
        $this->logintime = time();
        $this->loginip = getenv('REMOTE_ADDR');
        $this->create_at = time();
        $this->update_at = 0;
        $result =  $this->save();
        return $result;
    }
}
