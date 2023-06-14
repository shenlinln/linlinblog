<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DesignPatterns\ConcreteFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminReleaseController extends Controller
{
    protected $factory;
    protected  function setClass($class){
        $this->factory = new ConcreteFactory();
        $data = $this->factory->createVehicle($class);
        return $data;
    }
    public function Admin_Release_List(Request $request){
        $release_list = $this->setClass('release');
        $data = $release_list->admin_release_list();
        return view('admin.release.list',compact('data'));
    }
    public function Admin_Release_Add(Request $request){
        $release = $this->setClass('release');
        if($request->isMethod('post')){
            $data = $request->except('_token');
            if(empty($data['id']) && !isset($data['id']))
            {
                //添加操作
                 $file = $request->file('images');
                 if($file->isValid()){
                     $ext = $file->getClientOriginalExtension();
                     $path = $file->getRealPath();
                     $filename = date('Ymdhis').'.'.$ext;
                     Storage::disk('release')->put($filename, file_get_contents($path));
                     $arr = ['images' => 'uploads/release/'.$filename];
                     $merge = array_merge($data,$arr);
                     $result = $release->release_add($merge);
                    
                     if(!empty($result)){
                         return json_encode(['bool' => true,'message' => '添加成功']);
                     }else{
                         return json_encode(['bool' => false,'message' => '添加失败']);
                     }
                 }else{
                     return json_encode(['bool' => false,'message' => '文件不符合要求']);
                 }

       
            }else{
                //修改
                if(!empty($data['images'])){
                  $file = $request->file('images');
                  if($file->isValid()){
                      $ext = $file->getClientOriginalExtension();
                      $path = $file->getRealPath();
                      $filename = date('Ymdhis').'.'.$ext;
                      Storage::disk('release')->put($filename, file_get_contents($path));
                      $arr = ['images' => 'uploads/release/'.$filename];
                      $merge = array_merge($data,$arr);
                   }else{
                       return json_encode(['bool' => false,'message' => '文件不符合要求']);
                   }
                }else{
                  $merge = $data;
                }
                $result = $release->admin_release_update($merge);
                if($result > 0){
                    return json_encode(['bool' => true,'message' => '修改成功']);
                    
                }else{
                    return json_encode(['bool' => true,'message' => '修改失败']);
                }
            }
            
        }
        else{
            return view('admin.release.release_add');
        }
    }
    public function Admin_Release_Edit(Request $request){
        
        $id = intval($request->id);
        $release = $this->setClass('release');
        $data = $release->admin_release_detail($id);
        return view('admin.release.release_edit',compact('data'));
    }
    public function Admin_Release_Detail(Request $request){
        $id = intval($request->id);
        $release = $this->setClass('release');
        $data = $release->admin_release_detail($id);
        
        
        return view('admin.release.detail',compact('data'));
        
    }
}
