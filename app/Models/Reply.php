<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Reply extends Model
{
    protected  $table  = 'reply';
    public $timestamps = false;
    
    public function query_reply(){
        $user_data = $this::select('id','comment_id','content','from_uid','create_at','parent_id')->get();
        return $user_data;
    }
    
    /**
     * add data
     * auth :shenll
     */
    public function addReply($request)
    {
        $rules = [
            'content' => 'required|string|max:255',
        ];
        $validate = Validator::make($request, $rules);
        if ($validate->fails()) {
            return $validate->messages()->first();
        }
        if(isset($request['comment_id']) && !empty($request['comment_id'])){
            $this->comment_id = $request['comment_id'];
        }
        if(isset($request['from_uid']) && !empty($request['from_uid'])){
            $this->from_uid = intval($request['from_uid']);
        }
        if(isset($request['content']) && !empty($request['content'])){
            $this->content = trim($request['content']);
        }
        if(isset($request['to_uid']) && !empty($request['to_uid'])){
            $this->to_uid = intval($request['to_uid']);
        }
        if(isset($request['parent_id'])){
            $this->parent_id = $request['parent_id'];
        }
        $this->create_at = time();
        $result =  $this->save();
        if(empty($result)){
            throw new \Exception("插入回复失败");
        }else{
            return $result;
        }
        
    }
}
