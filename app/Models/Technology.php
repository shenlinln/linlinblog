<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Technology extends Model
{
    protected  $table  = 'technology';
    public $timestamps = false;
    
    public function web_news_recommend($news_type,$recommend,$pagesize){
        $list = $this::select('id','title','news_image','release_date')->where('news_type',$news_type)->where('is_recommend',$recommend)->orderBy('id','DESC')->paginate($pagesize);
        return $list;
    }
    public function web_news_detail($id){
        
        $data = $this::where('id','=',$id)->first();
        return $data;
    }
    public function admin_technology_list(){
        $list = $this::select('technology.id','technology.title','technology_category.news_name','technology.release_date','technology.author','technology.audit_status')
        ->join('technology_category', 'technology_category.id', '=', 'technology.news_type')
        ->orderBy('technology.id','DESC')->paginate(15);
        return $list;
    }
    public function technology_add($request){
        
        
        $rules = [
            'title' => 'required|string|max:100',
            'author' => 'required|string',
            'introduction' => 'required|string|max:200',
        ];
        $validate = Validator::make($request, $rules);
        
        if ($validate->fails()) {
            return $validate->messages()->first();
        }
        if(isset($request['news_type']) && !empty($request['news_type'])){
            $this->news_type = $request['news_type'];
        }
        if(isset($request['title']) && !empty($request['title'])){
            $this->title = trim($request['title']);
        }
        if(isset($request['introduction']) && !empty($request['introduction'])){
            $this->introduction = trim($request['introduction']);
        }
        if(isset($request['author']) && !empty($request['author'])){
            $this->author = trim($request['author']);
        }
        if(isset($request['source']) && !empty($request['source'])){
            $this->source = trim($request['source']);
        }
        if(isset($request['release_date']) && !empty($request['release_date'])){
            $this->release_date = strtotime($request['release_date']);
        }
        if(isset($request['source_url']) && !empty($request['source_url'])){
            $this->source_url = trim($request['source_url']);
        }
        if(isset($request['keyword']) && !empty($request['keyword'])){
            $this->keyword = trim($request['keyword']);
        }
        if(isset($request['news_image']) && !empty($request['news_image'])){
            $this->news_image = $request['news_image'];
        }else{
            $this->news_image = 0;
        }
        if(isset($request['content']) && !empty($request['content'])){
            $this->content = $request['content'];
        }
        $this->is_recommend = intval($request['is_recommend']);
        $this->focus_today = intval($request['focus_today']);
        $this->is_hot = intval($request['is_hot']);
        $this->browse = 0;
        $this->audit_status = 0;
        //返回true 失败返回false
        if(!empty($this->save())){ 
            return true;
        }else{
            throw new \Exception("插入相关技术资讯失败");
        }
        
        
    }
}
