<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\DesignPatterns\ConcreteFactory;
class NewsController extends Controller
{
    protected object $factory;
    protected object $model_news;
    protected object $model_common;
    protected object $model_reply;
    protected object $model_comment;
    private int $news_type;
    private int $norecommend = 0;//不推荐
    private int $recommend = 1;
    private int $re_pagesize = 3;
    private int $nore_pagesize = 10;
    protected  function setClass($class){
        $this->factory = new ConcreteFactory();
        $data = $this->factory->createVehicle($class);
        return $data;
    }
    public function NewsIndex(){
        
        $this->model_news = $this->setClass('news');
        $this->news_type = 1;//编程语言资讯
        $news_recommend_bc = $this->model_news->web_news_recommend($this->news_type,$this->recommend,$this->re_pagesize);
        $news_list_bc = $this->model_news->web_news_recommend($this->news_type,$this->norecommend,$this->nore_pagesize);
        
        $this->news_type = 2;//行业资讯
        $news_recommend_hy = $this->model_news->web_news_recommend($this->news_type,$this->recommend,$this->re_pagesize);
        $news_list_hy = $this->model_news->web_news_recommend($this->news_type,$this->norecommend,$this->nore_pagesize);
        
        $this->news_type = 3;//综合资讯
        $news_recommend_zh = $this->model_news->web_news_recommend($this->news_type,$this->recommend,$this->re_pagesize);
        $news_list_zh = $this->model_news->web_news_recommend($this->news_type,$this->norecommend,$this->nore_pagesize);
        
        
        return view('news.index',compact('news_recommend_bc','news_list_bc','news_recommend_hy','news_list_hy','news_recommend_zh','news_list_zh'));
        
    }
    /**
     * 详细页
     * @param Request $request
     * @return object
     */
    public function Detail(Request $request){
        $id = intval($request->id);
        $this->model_news = $this->setClass('news');
        $data = $this->model_news->web_news_detail($id);
        $this->model_comment = $this->setClass('comment');
        $type_id = 3;//新闻资讯评论
        $comment = $this->model_comment->query_comment($type_id);
        $this->model_common = $this->setClass('common');
        $this->model_reply = $this->setClass('reply');
        $reply = $this->model_reply->query_reply();
        
        $arr_data = [];
        $arr_data = $this->model_common->recursion($reply, 0, 0);
        
        return view('news.detail',compact('data','comment','reply','arr_data'));
    }
    public  function captcha(Request $request)
    {
        $validateCode = $this->setClass('validateCode');
        $validateCode->doimg();
        $code = $validateCode->getCode();
        $request->session()->put('code', $code);
        
        
    }

}
