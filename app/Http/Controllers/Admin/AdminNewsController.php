<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DesignPatterns\ConcreteFactory;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    protected object $factory;
    protected object $model_newscategory; 
    protected  function setClass($class){
        $this->factory = new ConcreteFactory();
        $data = $this->factory->createVehicle($class);
        return $data;
    }
    public function Admin_News_List(){
        $common = $this->setClass('common');
        $news_audit = $common->bf_audit_status();
        $news_list = $this->setClass('news');
        $data = $news_list->admin_news_list();
        return view('admin.news.list',compact('data','news_audit'));
    }
    public function Admin_News_Add(Request $request){
        $newscategory = $this->setClass('newscategory');
        $news_type = $newscategory->admin_news_category();
        $news = $this->setClass('news');
        if($request->isMethod('post')){
            $data = $request->except('_token');
            if(!empty($data['news_image'])){
                $file = $request->file('news_image');
                if($file->isValid()){
                    $ext = $file->getClientOriginalExtension();
                    $path = $file->getRealPath();
                    $filename = date('Ymdhis').'.'.$ext;
                    Storage::disk('news')->put($filename, file_get_contents($path));
                    $arr = ['news_image' => 'uploads/news/'.$filename];
                    $merge = array_merge($data,$arr);
                    $array_data = $merge;
                }
                
            }else{
                $array_data = $data;
            }
            $result = $news->news_add($array_data);
            if(!empty($result)){
                return json_encode(['bool' => true,'message' => '添加成功']);
            }else{
                return json_encode(['bool' => false,'message' => '添加失败']);
            }
            
        }
        else{
          return view('admin.news.news_add',compact('news_type'));
        }
    }
    function UploadImageFile(Request $request){
        
        $file = $request->file('file');
        if($file->isValid()){
            $ext = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $filename = date('Ymdhis').'.'.$ext;
            $images_name =  Storage::disk('contentimages')->put($filename, file_get_contents($path));
            echo '{"status":1,"content":"上传成功","url":"'.$images_name.'"}';
        }
    }
    
}
