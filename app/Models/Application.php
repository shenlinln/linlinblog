<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected  $table  = 'application';
    public $timestamps = false;
    
    public function web_application_list(){
        $list = $this::select('id','title','introduction','release_date','list_image')->where('id','>','0')->orderBy('id','DESC')->paginate(15);
        return $list;
    }
    public function web_application_detail($id){
        
        $data = $this::where('id','=',$id)->first();
        return $data;
    }
    public function admin_application_list(){
        $list = $this::where('id','>','0')->orderBy('id','DESC')->paginate(15);
        return $list;
    }
    public function application_add($request){
        
        
        if(isset($request['title']) && !empty($request['title'])){
            $this->title = trim($request['title']);
        }
        if(isset($request['introduction']) && !empty($request['introduction'])){
            $this->introduction = trim($request['introduction']);
        }
        if(isset($request['keyword']) && !empty($request['keyword'])){
            $this->keyword = trim($request['keyword']);
        }
        if(isset($request['content']) && !empty($request['content'])){
            $this->content = $request['content'];
        }
        if(isset($request['source']) && !empty($request['source'])){
            $this->source = trim($request['source']);
        }
        if(isset($request['source_url']) && !empty($request['source_url'])){
            $this->source_url = trim($request['source_url']);
        }
        if(isset($request['images']) && !empty($request['images'])){
            $this->list_image = trim($request['images']);
        }
        $this->browse = 0;
        if(isset($request['author']) && !empty($request['author'])){
            $this->author = trim($request['author']);
        }
        $this->is_recommend = 0;
        if(isset($request['release_time']) && !empty($request['release_time'])){
            $this->release_date = trim(strtotime($request['release_time']));
        }
        //返回true 失败返回false
        if(!empty($this->save())){ //
            return true;
        }else{
            throw new \Exception("插入php应用失败");
        }

       // return $result;
        
        
    }
}
