
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('admin/css/bootstrap.min.css')}}" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Loding font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/style.css')}}">
    
    <title>PHP中文网网后台登录</title>
  </head>
<body>
    <!-- Backgrounds -->
    <div id="login-bg" class="container-fluid">
      <div class="bg-img"></div>
      <div class="bg-color"></div>
    </div>

    <!-- End Backgrounds -->

    <div class="container" id="login">
        <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="login">
            <h1>PHP中文网后台登录</h1>
            <!-- Loging form -->
              <div id="from">
                    <div class="form-group">
                      <input type="text" class="form-control" id="adminuser" aria-describedby="emailHelp" placeholder="用户名">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="adminpass" placeholder="密码">
                    </div>
                      <div class="form-check">
                      <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                      <label class="form-check-label" for="exampleCheck1">记住我</label>
                    </div>
                    <br> 
                    <input type="hidden" class="form-control" id="_token" value="{{csrf_token()}}">
                    <button type="button" class="btn btn-lg btn-block btn-success" id="admin_login">登录</button>
                     <label id="errorMessage" style="padding-top: 20px;color: red;"></label>
             </div>
          </div>
        </div>
        </div>
    </div>
  </body>
   <script src="{{URL::asset('admin/js/admin_operation.js')}}"></script>
</html>
