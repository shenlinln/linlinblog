<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnologyCategory extends Model
{
    protected  $table  = 'technology_category';
    public $timestamps = false;
    
    public function admin_technology_category(){
        $list = $this::where('id','>','0')->orderBy('id','ASC')->get();
        return $list;
    }
}
