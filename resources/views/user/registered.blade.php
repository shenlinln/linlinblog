@extends('layouts.main')
@section('content')
<div class="reg_main">
    <div class="reg_top">新用户注册</div>
    <div class="reg_box">
       
    <div class="main_left">
      <div class="item_box">
        <div class="type">昵称：</div><div class="value"><input type="text" placeholder="请输入昵称，至少2个字符，至多20个"  title="昵称，至少2个字符，至多20个字符" name="nickname" id="nickname" class="txt" /><label id="Nickname_Message"></label></div>
      </div>
      <div class="item_box">
        <div class="type">密码：</div><div class="value"><input placeholder="请输入密码"  type="password" name="pass_word" id="pass_word" class="txt" /><label id="Password_Message"></label></div>
      </div>
      <div class="item_box">
        <div class="type">邮箱：</div><div class="value"><input type="text" placeholder="请输入邮箱" title="请输入邮箱" name="phone_number" id="phone_number" class="txt" /><label id="Phone_Number_Message"></label></div>
      </div>
      <div class="item_box">
        <div class="type">验证码：</div><div class="value"><input placeholder="请输入验证码"  type="text" name="code" id="code" class="txt" /><img th:src="@{getVerifyCode}" onclick="changeCode()" class="verifyCode"/>
        <label id="Code_Message"></label>
      </div>
      </div>
      <div class="item_box_bux">
        <div class="type_bux"></div>
        <div class="value_bux">
          <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
          <input type="button" id="register" class="bt" value=" &nbsp;&nbsp;提交注册 &nbsp; &nbsp; "/></div>
      </div>
    </div>
        <div class="main_right">
            <div class="tips">我们诚挚的邀请您加入<br/>GETPHP.CN这里是最全的PHP资讯网站！</div>
            <div class="box">  已有账户：<a href="{{route('userLogin')}}">直接登录</a><br/><br/></div>
        </div>
    </div>
</div>


@endsection