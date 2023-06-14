<?php
namespace App\Http\Controllers\designPatterns;
/**
 * 简单工厂模式
 */
class ConcreteFactory
{
    /**
     * @var array
     */
    protected $typeList;
   
    /**
     * 
     */
    public function __construct()
    {
        $this->typeList = [
            'admin' => \App\Models\Admin::class,
            'advertising' =>'App\Model\Advertising',
            'news' => \App\Models\News::class,
            'newscategory' => 'App\Model\NewsCategory',
            'technology' => 'App\Model\Technology',
            'technologycategory' => 'App\Model\TechnologyCategory',
            'release' => \App\Models\Release::class,
            'application' => 'App\Model\Application',
            'membercenter' => 'App\Model\MemberCenter',
            'comment' => 'App\Model\Comment',
            'reply' => \App\Models\Reply::class,
            'common' =>\App\Common\CommonFunction::class,
            'phpmailer' =>'App\Common\PHPMailer',
            'ws' =>'App\Common\WS',
            'validateCode' => 'App\Common\ValidateCode'
           ];
    }
    
    /**
     * 创建生产类
     *
     * @param string $type a known type key
     *
     * @return 
     * @throws
     */
    public function createVehicle($type)
    {
        if (!array_key_exists($type, $this->typeList)) {
            throw new \InvalidArgumentException("$type is not valid vehicle");
        }
        $className = $this->typeList[$type];
        return new $className();
    }
    public function createWS($type,$address,$port)
    {
        if (!array_key_exists($type, $this->typeList)) {
            throw new \InvalidArgumentException("$type is not valid vehicle");
        }
        $className = $this->typeList[$type];
        return new $className($address,$port);
    }
}