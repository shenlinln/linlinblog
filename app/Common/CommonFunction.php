<?php
namespace App\Common;


class CommonFunction{
    //数字加密
  
    function encrypt_password($password,$salt)
    {
        return md5(md5(md5(trim($password))) . $salt);
    }
    /**
     *  资讯分类
     */
    public function bf_news_type(){
        return ['1' => '行业动态','2' => '石油石化','3' => '市场分析','4' => '原料价格','5' => '企业资讯','6' => '综合报道','7' => '政策法规','8' => '产地快讯'];  
       
    }
    /**
     *  审核状态
     */
    public function bf_audit_status(){
        return ['0' => '通过','1' => '待审核','2' => '不通过'];
        
    }
    /**
     * 广告栏目
     */
    public function AdvertisingColumn(){
        return ['1' => '首页',2 => '其他'];
    }

    /**
       * 获得随机字符串
     * @param $len             
     * @param $special        
     * @return string       返回随机字符串
     */
    function getRandomStr($length = 16){
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
    /**
     * 获得随机数字
     * @param $len
     * @param $special
     * @return string       返回随机字符串
     */
    function getRandomNumber($length = 16){
        $chars = '0123456789';
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
    //递归循环
    function recursion($arr,$id,$level)
    {
        $list = [];
        foreach ($arr as $k=>$v){
            if ($v->parent_id == $id){
                $v['level']=$level;
                $v['son'] = $this->recursion($arr,$v->id,$level+1);
                $list[] = $v;
            }
        }
        return $list;
    }
    
}


?>