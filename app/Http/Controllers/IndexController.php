<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\DesignPatterns\ConcreteFactory;
use App\Models\Release;
use App\Models\CommonFunction;
use App\Models\Comment;
use App\Models\Advertising;
use App\Models\Common;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class IndexController extends Controller
{
    protected  object $model_comment;
    protected  object $model_reply;
    protected  object $model_common;
    protected  object $modelAdvertising; 
    protected  object  $factory;
    private    const    BELONGTYPE = 1;  
    protected  function setClass($class){
        $this->factory = new ConcreteFactory();
        $data = $this->factory->createVehicle($class);
        return $data;
    }
    public function index(): View {
        
        $release = new Release();
        $advertising = new Advertising();
        $belong_type = intval(self::BELONGTYPE);
        $adv = $advertising->web_advertising_throw($belong_type);
        $data = $release->web_release_list();
        return view('index',compact('data','adv'));
    }
    public function detail(Request $request): View {
        $id = intval($request->id);
       // if(empty(Redis::EXISTS('rel_read_count_'.$id))){
           // Redis::SET('rel_read_count_'.$id,0);
          
       // }
       // Redis::INCR('rel_read_count_'.$id);
       // $release_read_count =  Redis::GET('rel_read_count_'.$id);
       $release_read_count = 1;
       $release = new Release();
        $data = $release->web_release_detail($id);
        $comment = new Comment();
        $type_id = 1;
        $selectComment = $comment->query_comment($type_id);
        //$CommonFunction = new CommonFunction();
       // $this->model_common = $this->setClass('common');
        
        $this->model_reply = $this->setClass('reply');
        $reply = $this->model_reply->query_reply();
       
        $arr_data = [];
      //  $arr_data = $comment->recursion($reply, 0, 0);
       
        return view('index.detail',compact('data','release_read_count','selectComment','reply','arr_data'));
    }
    
    public function CommitPost(Request $request){
        
        $data = $request->except('_token');
        $this->model_comment = $this->setClass('comment');
        $array = ['topic_type' => 1,'from_uid' => 1];
        $data_merge = array_merge($data,$array);
        try {
            $result = $this->model_comment->addComment($data_merge);
            if(!empty($result)){
                return json_encode(['bool' => true,'message' => "评论成功"]);
            }
        } catch (\Exception $e){
            echo 'Message: '.$e->getMessage();
        }
        
        
    }
    
    public function ReplyPost(Request $request){
        
        $data = $request->except('_token');
       
        $this->model_reply =  $this->setClass('reply');
        try {
            $result = $this->model_reply->addReply($data);
            if(!empty($result)){
                return json_encode(['bool' => true,'message' => "回复成功"]);
            }
        } catch (\Exception $e){
            echo 'Message: '.$e->getMessage();
        }
        
        
        
        
    }
    

    

}
