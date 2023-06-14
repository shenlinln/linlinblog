<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Release extends Model
{
    protected  $table  = 'release';
    public $timestamps = false;
    public function web_release_list(){
        $list = $this::select('id','title','introduction','release_time','images')->where('id','>','0')->orderBy('id','DESC')->paginate(15);
        return $list;
    }
    public function web_release_detail($id){
        
        $data = $this::where('id','=',$id)->first();
        return $data;
    }
    public function admin_release_list(){
        $list = $this::where('id','>','0')->orderBy('id','DESC')->paginate(15);
        return $list;
    }
    
    
    public function admin_release_detail($id){
        
        $data = $this::where('id','=',$id)->first();
        return $data;
    }
    public function admin_release_update($data){
        $id = intval($data['id']);
        if(!empty($data['images'])){
            $array = ['title' => trim($data['title']),'author' => trim($data['author']),'release_time' => trim($data['release_time']),'keyword' => trim($data['keyword']),'introduction' => trim($data['introduction']),'content' => $data['content'],'update_at' => time(),'images' => $data['images']];   
        }else{
            $array = ['title' => trim($data['title']),'author' => trim($data['author']),'release_time' => trim($data['release_time']),'keyword' => trim($data['keyword']),'introduction' => trim($data['introduction']),'content' => $data['content'],'update_at' => time()];
        }
        $update = $this::where('id', $id)->update($array);
        return $update;
        
    }
    
    public function release_add($request){
        
        
        $rules = [
            'title' => 'required|string|max:40',
            'author' => 'required|string|max:2',
            'introduction' => 'required|string|max:200',
        ];
        $validate = Validator::make($request, $rules);
        
        if ($validate->fails()) {
            return $validate->messages()->first();
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
        if(isset($request['release_time']) && !empty($request['release_time'])){
            $this->release_time = strtotime($request['release_time']);
        }
  
        if(isset($request['keyword']) && !empty($request['keyword'])){
            $this->keyword = trim($request['keyword']);
        }

        if(isset($request['content']) && !empty($request['content'])){
            $this->content = $request['content'];
        }
        if(isset($request['images']) && !empty($request['images'])){
            $this->images = $request['images'];
        }
        $this->create_at = time();
        $this->update_at = 0;
        $result = $this->save();
        return $result;
        
        
    }
}
