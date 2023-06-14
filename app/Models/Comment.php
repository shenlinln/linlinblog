<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Comment extends Model
{
    protected  $table  = 'comment';
    public $timestamps = false;
    
    
    public function query_comment($type_id){
        $user_data = $this::select('id','topic_id','content','from_uid','create_at')->where('topic_type',$type_id)->get();
        return $user_data;
    }
    /**
     * add data
     * auth :shenll
     */
    public function addComment($request)
    {
        $rules = [
            'content' => 'required|string|max:255',
        ];
        $validate = Validator::make($request, $rules);
        if ($validate->fails()) {
            return $validate->messages()->first();
        }
        if(isset($request['topic_id']) && !empty($request['topic_id'])){
            $this->topic_id = $request['topic_id'];
        }
        if(isset($request['topic_type']) && !empty($request['topic_type'])){
            $this->topic_type = intval($request['topic_type']);
        }
        if(isset($request['content']) && !empty($request['content'])){
            $this->content = trim($request['content']);
        }
        if(isset($request['from_uid']) && !empty($request['from_uid'])){
            $this->from_uid = intval($request['from_uid']);
        }
        $this->create_at = time();
        $result =  $this->save();
        if(empty($result)){
            throw new \Exception("插入评论失败");
        }else{
            return $result;
            }
        
    }
}
