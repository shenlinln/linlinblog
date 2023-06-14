<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected  $table  = 'news_category';
    public $timestamps = false;
    
    public function admin_news_category(){
        $list = $this::where('id','>','0')->orderBy('id','ASC')->get();
        return $list;
    }
}
