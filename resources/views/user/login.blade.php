@extends('layouts.main')
@section('content')

<div class="reg_main">
    <div class="reg_top">用户登录</div>
    <div class="reg_box">
        <form action="#">
        <div class="main_left">
        <div class="item_box">
          <div class="type">用户名：</div><div class="value"><input placeholder="请输入昵称"  type="text" name="user_name" id="user_name" class="txt" /><label id="Nickname_Message"></label></div>
        </div>
        <div class="item_box">
          <div class="type">密码：</div><div class="value"><input placeholder="请输入密码"  type="password" name="pass_word" id="pass_word" class="txt" /><label id="Password_Message"></label></div>
        </div>
        <div class="item_box">
          <div class="type">验证码：</div><div class="value"><input placeholder="请输入验证码"  type="text" name="code" id="code" class="txt" /><img th:src="@{getVerifyCode}" onclick="changeCode()" class="verifyCode"/>
          <label id="Code_Message"></label>
        </div>
        </div>
        <div class="submit">
          <div class="item_box">
          <div class="type"></div>
          <div class="value">
            <input type="hidden" name="_token" id="_token" class="txt" value="{{csrf_token()}}"/>
            <input type="button" id="submit" class="bt" value="&nbsp;&nbsp;立即登录 &nbsp; &nbsp; "/>
          </div>
          </div>
        </div>
      </div>
        </form>
        <div class="main_right">

            <div class="tips">我们诚挚的邀请您加入<br/>GETPHP.CN 这里是最全的PHP资讯网站！</div>
            <div class="box">
                还没有账户：<a href="{{route('usersReg')}}">马上注册</a><br/><br/>
                            </div>

        </div>

    </div>
</div>
@endsection