<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DesignPatterns\ConcreteFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminTechnologyController extends Controller
{
    protected object $factory;
    protected object $model_technologycategory;
    protected object $model_technology;
    protected  function setClass($class){
        $this->factory = new ConcreteFactory();
        $data = $this->factory->createVehicle($class);
        return $data;
    }
    public function Admin_Technology_List(){
        $common = $this->setClass('common');
        $news_audit = $common->bf_audit_status();
        $this->model_technology = $this->setClass('technology');
        $data = $this->model_technology->admin_technology_list();
        return view('admin.technology.list',compact('data','news_audit'));
    }
    public function Admin_Technology_Add(Request $request){
        $this->model_technologycategory = $this->setClass('technologycategory');
        $news_type = $this->model_technologycategory->admin_technology_category();
        $this->model_technology = $this->setClass('technology');
        if($request->isMethod('post')){
            $data = $request->except('_token');
            if(!empty($data['news_image'])){
                $file = $request->file('news_image');
                if($file->isValid()){
                    $ext = $file->getClientOriginalExtension();
                    $path = $file->getRealPath();
                    $filename = date('Ymdhis').'.'.$ext;
                    Storage::disk('technology')->put($filename, file_get_contents($path));
                    $arr = ['news_image' => 'uploads/technology/'.$filename];
                    $merge = array_merge($data,$arr);
                    $array_data = $merge;
                }
                
            }else{
                $array_data = $data;
            }
            try{
                $this->model_technology->technology_add($array_data);
                return json_encode(['bool' => true,'message' => '添加成功']);
                
            }catch (\Exception $e){
                Log::debug($e->getMessage());
                echo $e->getMessage();
            }

            
        }
        else{
            return view('admin.technology.add',compact('news_type'));
        }
    }
}
