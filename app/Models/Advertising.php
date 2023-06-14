<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected  $table  = 'advertising';
    public $timestamps = false;
    
    
    public function web_advertising_throw(int $belong_type){
        $list = $this::select('id','title','banner_images','address_url')->where('belong_type',$belong_type)->get();
        return $list;
    }
    public function advertising_add($request){
        
        if(isset($request['title']) && !empty($request['title'])){
            $this->title = $request['title'];
        }
        if(isset($request['belong_type']) && !empty($request['belong_type'])){
            $this->belong_type = $request['belong_type'];
        }
        if(isset($request['banner_images']) && !empty($request['banner_images'])){
            $this->banner_images = $request['banner_images'];
        }
        if(isset($request['address_url']) && !empty($request['address_url'])){
            $this->address_url = $request['address_url'];
        }
        $this->create_at = time();
        $result = $this->save();
        return $result;
        
        
    }
}
