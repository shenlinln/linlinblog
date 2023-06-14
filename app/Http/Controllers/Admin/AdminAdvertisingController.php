<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DesignPatterns\ConcreteFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminAdvertisingController extends Controller
{
    protected object $factory;
    protected object $modelAdvertising; 
    protected  function setClass($class){
        $this->factory = new ConcreteFactory();
        $data = $this->factory->createVehicle($class);
        return $data;
    }
    public function AdminAdvertisingList(){

        return view('admin.advertising.list');
    }
    public function AdminAdvertisingAdd(Request $request){
        if($request->isMethod('post')){
            $rules = [
                'title' => 'required|unique:advertising,title|string|max:100',
                'belong_type' => 'required|int',
                'address_url' => 'required|unique:advertising,address_url|string|max:200',
            ];
            $data =$request->all();
            
            $validate = Validator::make($data, $rules);
            if ($validate->fails()) {
                return json_encode(['status' => 101,'message' => '填写内容有误']);//$validate->messages()->first();
            }
            $file = $request->file('images');
          
            if($file->isValid()){
                $ext = $file->getClientOriginalExtension();
                $path = $file->getRealPath();
                $filename = date('Ymdhis').'.'.$ext;
                Storage::disk('advpicture')->put($filename, file_get_contents($path));
                $arr = ['title' => trim($data['title']),'belong_type' => $data['belong_type'],'banner_images' => 'uploads/advpicture/'.$filename,'address_url' => $data['address_url']];
                $this->modelAdvertising = $this->setClass('advertising');
                $result = $this->modelAdvertising->advertising_add($arr);
                if(!empty($result)){
                    return json_encode(['status' => 200,'message' => '添加成功']);
                }else{
                    return json_encode(['status' => 101,'message' => '添加失败']);
                }
            }
        }
        
        $queryCommon = $this->setClass('common');
        $advValue = $queryCommon->AdvertisingColumn();
        return view('admin.advertising.add',compact('advValue'));
    }
    
   
}
