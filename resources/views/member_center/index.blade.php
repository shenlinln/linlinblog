@extends('web.layouts.header')
@section('content')
<div class="top">
    欢迎您： <b style="color: #f60;font-weight: 400;">[ MrShenLin ]</b>  &nbsp;&nbsp;
    <a href="http://www.php1.cn/?s=user/index/index">管理首页</a> &nbsp;|&nbsp;
    <a href="http://www.php1.cn/" target="_blank">返回网站首页</a>

</div>
<div class="main">
    <div class="left">
    <div class="user_box">
        <div class="ub_1">
            <div class="u_face">
                <img src="http://www.php1.cn/uploads/user/face/base.png" width="56" height="56">
            </div>
            <div class="u_info">
                <div class="u_name">
                    MrShenLin                </div>
                <div class="u_cz">
                    <img src="http://aaa.php1.cn/Public/images/user/sex0.gif">
                    <a href="http://www.php1.cn/?s=user/setting/index">
                        修改资料
                    </a>
                    <a href="http://www.php1.cn/?s=user/setting/userpic">
                        更换头像
                    </a>
                </div>
            </div>
        </div>
        <div class="ub_2">
            <a href="">
                提问: (0)
            </a>
            &nbsp;
            <a href="">
                回答：(0)
            </a>
            &nbsp;
            <a href="">
                积分: (36)
            </a>
        </div>
    </div>
    <div class="user_tips">
        个人简介 :<br>
        这个屌丝很懒，什么也没留下！    </div>
    <div class="user_bts">
        <div class="bt1">
            <a href="http://ask.php1.cn/?s=index/add" target="_blank">
                <img src="/style/home/images/bt1.gif">
                <b>发表提问</b>
            </a>
        </div>
        <div class="bt2">
            <a href="http://www.php1.cn/?s=user/setting/index">
                <img src="/style/home/images/bt2.gif">
                <b>资料修改</b>
            </a>
        </div>
    </div>
    <div class="lm_top">
        我的提问 (0) 个
    </div>
    <div class="ask_box">
        <ul>
                        <li>还没有发表提问。</li>
                    </ul>
    </div>
    <div class="lm_top">
        我的回答 (0) 个
    </div>
    <div class="ask_box">
        <ul>
                        <li>还没有发表提问。</li>
                    </ul>
    </div>
    <div class="lm_top">
        我的评论 (0) 个
    </div>
    <div class="cmnt_box">
        <ul>
                        <li>还没有发表评论。</li>
                    </ul>
    </div>
    <div class="lm_top">
        我的统计
    </div>
    <div class="visit_box">
        积分：36
        <br>
        评论：0        <br>
        提问：0        <br>
        回答：0        <br>
    </div>
</div>    <div class="center">

        <div class="post_box">
            <form action="https://www.php1.cn/?s=user/index/postMsg" method="post">
            <div class="post_tips">
                <div class="tp1">
                    今天你吐槽了吗？
                </div>
                <div class="tp2">
                    还可以输入160字
                </div>
            </div>
                    <textarea id="content" name="content" class="post_txt"></textarea>

            <div class="post_bt">
                <div class="pbt1">
                    表情: &nbsp;<input type="button" class="face" style="background: url(http://aaa.php1.cn/Public/images/user/ico1.gif);border: 0;width: 22px;height: 22px;">
                                    </div>
                <div class="pbt2">
                    <input type="submit" value="发布">
                </div>
            </div>
            </form>
        </div>


        <div class="myblogs" style="display: none;">
            <div class="tips">
                <div class="tp_1">
                    最新博文 (共1篇)
                </div>
                <div class="tp_2">
                    <a href="">
                        进入博客&gt;&gt;
                    </a>
                </div>
            </div>

            <div class="newblogs">
                <ul>
                    <li>
                        <div class="b_title">
                            <a href="">
                                Oracle对Java数项版权声明遭美国专利局否决...
                            </a>
                            0评/0阅
                        </div>
                        <div class="b_time">
                            2013-04-01
                        </div>
                    </li>
                    <li>
                        <div class="b_title">
                            <a href="">
                                Oracle对Java数项版权声明遭美国专利局否决...
                            </a>
                            0评/0阅
                        </div>
                        <div class="b_time">
                            2013-04-01
                        </div>
                    </li>
                    <li>
                        <div class="b_title">
                            <a href="">
                                Oracle对Java数项版权声明遭美国专利局否决...
                            </a>
                            0评/0阅
                        </div>
                        <div class="b_time">
                            2013-04-01
                        </div>
                    </li>
                </ul>
            </div>
        </div>


        <div class="logs">
            <ul class="LogTabs">
                <li style="display:none;">
                    <a href="http://www.php1.cn/?s=user/index/index&amp;tab=index">
                        最新动态
                    </a>
                </li>
                <li class="active">
                    <a href="http://www.php1.cn/?s=user/index/index&amp;tab=tucao">
                        吐槽 TuCao
                    </a>
                </li>
                <li>
                    <a href="http://www.php1.cn/?s=user/index/index&amp;tab=ask">
                        问答 ASK
                    </a>
                </li>
                <li>
                    <a href="http://www.php1.cn/?s=user/index/index&amp;tab=cmnt">
                        评论
                    </a>
                </li>
                <li>
                    <a href="http://www.php1.cn/?s=user/index/index&amp;tab=news">
                        新闻 News
                    </a>
                </li>
            </ul>

            <ul class="LogList">



                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                qazwsx558                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            毕业(真实版本)阿德莱德大学毕业证|Adelaide真实一样证书
7分钟前【微/Q:210 564 507】《阿德莱德大学毕业证》                        </div>
                        <div class="log_info">
                            <div class="time">
                                2020/10/24 00:41                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                林间有风                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            腾讯云双11.11 云上盛惠，云产品限时抢购，1核2G云服务器首年88元
1核2G1M50G盘，88元/1年，
2核4G3M50G盘，698元/3年，
更多进入活动地址：
https://curl.qcloud.com/fk3zBX1F

阿里云活动推荐：
（ 老用户购买联系我，返现10%20%）vx：15521054523
https://c.tb.cn/k6.HXenc?userCode=wbqjs7bw                        </div>
                        <div class="log_info">
                            <div class="time">
                                2020/10/22 21:07                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                L921A                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            中国的舰艇钢除了921A、907A、945、980之外还有什么？                        </div>
                        <div class="log_info">
                            <div class="time">
                                2020/10/20 11:02                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                小肥星星                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            澳洲幸运10官方群5113660                        </div>
                        <div class="log_info">
                            <div class="time">
                                2020/09/05 13:21                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                lellele999                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            好大的雨啊，门都出不了                        </div>
                        <div class="log_info">
                            <div class="time">
                                2020/08/30 14:07                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                鼎盛国际19188199555                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            我来自缅甸，是鼎盛国际的点击部客服之一                        </div>
                        <div class="log_info">
                            <div class="time">
                                2020/08/19 19:56                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                鼎盛国际19188199555                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            各位，请多多关照                        </div>
                        <div class="log_info">
                            <div class="time">
                                2020/08/19 19:52                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                hhxsv5                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            LaravelS 基于Swoole加速Laravel/Lumen，常驻内存，内置HTTP/WebSocket Server，支持TCP/UDP Server、协程的查询构造器与ORM（MySQL）、自定义进程、异步的事件监听、异步任务队列、毫秒级定时任务、平滑Reload，与Nginx配合搭建高可用分布式服务器群，开箱即用。

https://github.com/hhxsv5/laravels                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/07/11 13:16                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                杯莫停                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            新人学习
<img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/a5/cza_org.gif" class="faceimg">                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/30 22:50                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/180630/180630h_5b36eb38566e9_501_centre.jpg" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                彭德利                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            大家好，我是新人，请多关照                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/30 10:29                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                九育                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            新人报到~希望找位有意向求职php开发讲师的朋友，工作地点：武汉洪山区 。可以推荐朋友昂，<img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/06/zuoyi_org.gif" class="faceimg">若有意向，请发我邮箱yuanjuan@corp.the9.com。
                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/11 11:10                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                D                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            各位老鸟！                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/06 09:03                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                D                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            <img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/wabi_org.gif" class="faceimg">                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/06 09:03                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                码天下                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            咱们是不是都是同行呢。都是拍黄片的<img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_org.gif" class="faceimg">                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/05 17:08                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                随意                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            <img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/34/xiaoku_org.gif" class="faceimg">                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/05 16:05                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                码天下                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            我是做拍黄片的<img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_org.gif" class="faceimg">                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/05 15:28                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                mce                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            <img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/c3/zy_org.gif" class="faceimg">                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/05 15:15                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                码天下                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            初来炸到<img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_org.png" class="faceimg">                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/05 11:02                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                码天下                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            程序猿屌丝们好<img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/34/xiaoku_org.gif" class="faceimg">                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/06/05 11:02                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                                <li>
                    <div class="u_face">
                        <img src="http://www.php1.cn/uploads/user/face/base.png" width="34" height="34">
                    </div>
                    <div class="log_content">
                        <div class="log_title">
                            <a href="#">
                                滴滴                            </a>
                            吐了个槽：
                            <a href="http://www.php1.cn" target="_blank">
                                                            </a>
                        </div>
                        <div class="log_txt">
                            thinkphp5和laravel的免费在线视频教程，需要的小伙伴们可以取了解下：https://v.58hualong.cn                        </div>
                        <div class="log_info">
                            <div class="time">
                                2018/05/27 21:27                            </div>
                            <div class="pcount">
                                <a href="#" style="display: none;">
                                    评论(36)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </li>
                



            </ul>
        </div>
    </div>
    <div class="right">
        <div class="u_info">
            <ul class="u_i_box">
                <li>
                    我的积分：
                    <a href="">
                        36
                    </a>
                    分
                </li>
                <li>
                    我的提问：
                    <a href="">
                        0                    </a>
                    个
                </li>
                <li>
                    我的回答：
                    <a href="">
                        0                    </a>
                    个
                </li>
            </ul>
            <div class="u_i_tp">
                职业技能
            </div>
            <ul class="skill">
                <li>
                    <h3>                        工作年限：
                    </h3>
                    未填写                </li>
                <li>
                    <h3>
                        目前职业：
                    </h3>
                                        未填写                </li>
                <li>
                    <h3>
                        开发平台：
                    </h3>
                    没有填写!
                </li>
                <li>
                    <h3>
                        擅长领域：
                    </h3>
                    没有填写!                </li>
            </ul>
        </div>
        <div class="favorite">
            <div class="tp">
                <div class="t">
                    我的收藏夹
                </div>
                <div class="l">
                    <a href="">

                    </a>
                </div>
            </div>
            <div class="f_box">
                尚未收藏任何文章
            </div>
        </div>
        <div class="share" style="display: none;">
            <div class="tp">
                <div class="t">
                    我分享的资源
                </div>
                <div class="l">
                    <a href="">
                        进入
                    </a>
                </div>
            </div>
            <div class="s_box">
                尚未分享任何资源
            </div>
        </div>
    </div>
    <div style="clear:both;">
    </div>
</div>
@endsection