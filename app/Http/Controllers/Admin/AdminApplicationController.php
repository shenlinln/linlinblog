<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DesignPatterns\ConcreteFactory;
class AdminApplicationController extends Controller
{
    protected object $factory;
    protected object $model_application;
    protected  function setClass($class){
        $this->factory = new ConcreteFactory();
        $data = $this->factory->createVehicle($class);
        return $data;
    }
    
    public function Admin_Application_List(Request $request){
        $this->model_application = $this->setClass('application');
        $data = $this->model_application->admin_application_list();
        
        return view('admin.application.list',compact('data'));
       
    }
    
    public function Admin_Application_add(Request $request){
      
        if($request->isMethod('post')){
            $array_list =  $request->all();
            $file = $request->file('images');
           
            if($file->isValid()){
                
                $ext = $file->getClientOriginalExtension();
                $path = $file->getRealPath();
                $filename = date('Ymdhis').'.'.$ext;
                Storage::disk('applicimages')->put($filename, file_get_contents($path));
                $arr = ['images' => 'uploads/applicimages/'.$filename];
                $data = array_merge($array_list,$arr);
                $this->model_application = $this->setClass('application');
                try{
                   $this->model_application->application_add($data);
                   return json_encode(['bool' => true,'message' => '添加成功']);
                   
                }catch (\Exception $e){
                    Log::debug($e->getMessage());
                    echo $e->getMessage();
                }
                
                
                 
            }else{
                echo "无效";
            }
           exit();
            Storage::disk('applicimages')->put('uploads/applicimages', $images);
            var_dump($request->all());exit('结束');
            
        }
        return view('admin.application.add');
    
    }
}
