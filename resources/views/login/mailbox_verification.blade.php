@extends('web.layouts.header')
@section('content')
<div class="reg_main">
    <div class="reg_top">邮箱验证</div>
    <div class="reg_box">
        <form action="https://www.php1.cn/?s=user/login/checkLogin&from=https%3A%2F%2Fwww.php1.cn%2F" method="post">
            <div class="main_left">
                <div class="item_code">
                    <div class="code">邮箱验证码:</div>
                    <div class="value"><input type="text" name="code" id="code" class="txt" /></div>
                </div>
                 <div class="item_box_bux_zy">
                    <div class="type_bux_yz"></div>
                    <div class="value_bux">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                    <input type="button" id="mailbox_code" class="bts" value="验证 "/></div>
                </div>
            </div>
        </form>
        <div class="main_right">
            <div class="tips">我们诚挚的邀请您加入<br/>GETPHP.CN 这里是最全的PHP资讯网站！</div>
            <div class="box">
                                                    还没有账户：<a href="https://www.php1.cn/?s=user/reg/index">马上注册</a><br/><br/>
            </div>
        </div>

    </div>
</div>
@endsection