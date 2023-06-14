@extends('admin.layouts.header')
@section('title', '广告图添加')
@section('sidebar')
    @parent
@endsection
@section('content')
<div class="page-header">
	<h1>广告图
	   <small>
			<i class="ace-icon fa fa-angle-double-right"></i>
				Common form elements and layouts
		</small>
	</h1>
</div>
<form class="form-horizontal" role="form">
  <div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">广告标题</label>
            <div class="col-sm-9"><input type="text" id="title" placeholder="发布标题" class="col-xs-10 col-sm-5"><label id="errorTitleMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">广告栏目</label>
          <div class="col-sm-9">
            <select   data-placeholder="Choose a State..." id="belong_type">
		         <option value="0">==请选择==  </option>
		          @foreach($advValue as $key => $value)
		            <option value="{{$key}}">{{$value}}</option>
		          @endforeach
		   </select><label id="errorTypeMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">广告地址</label>
          <div class="col-sm-9"><input type="text" id=address_url placeholder="广告地址" class="col-xs-10 col-sm-5"> <label  id="errorAddressUrlMessage" style="color: red;"></label></div>
         
	</div>
	<div class="form-group">
	<div class="col-xs-12">
 <label class="col-sm-3 control-label no-padding-right" for="form-field-1">图片</label>
				 <div class="col-sm-2"><label class="ace-file-input ace-file-multiple" style="color: red;">
				<input multiple="" type="file" id="images" onchange="previews(this)">
				<span class="ace-file-container" >
				<span class="ace-file-name"><i class=" ace-icon ace-icon fa fa-cloud-upload"></i>
				</span></span><a class="remove" href="#">
				<i class=" ace-icon fa fa-times"></i></a></label>
				<div id="Test" style="display:inline-block"><img alt="" /></div></div><label  id="errorImagesMessage" style="color: red;"></label>
</div>
</div>

<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="button" id="submit">
			<i class="ace-icon fa fa-check bigger-110"></i>
			提交
			</button>

		</div>
	</div>
	<input type="hidden" id="_token" value="{{csrf_token()}}">		
</form>
<script type="text/javascript">

if(document.getElementById("submit"))
{
	document.getElementById("submit").onclick=function()
	{
 
	   
		let title = document.getElementById("title").value;

		if(title == ''){
			document.getElementById("errorTitleMessage").innerHTML = "请填写新闻标题";
			return false;
		}else{
			document.getElementById("errorTitleMessage").innerHTML = "";
		}
		let type = document.getElementById('belong_type');
		
		var belong_type = type.selectedIndex;
		
	    if(belong_type == 0)
	    {
	    	document.getElementById("errorTypeMessage").innerHTML = "请选择广告栏目";
	    	return false;
		}else{
			document.getElementById("errorTypeMessage").innerHTML = "";
			}
		let address_url = document.getElementById("address_url").value;
		if(address_url == ''){
			document.getElementById("errorAddressUrlMessage").innerHTML = "请填写广告地址";
			return false;
		}else{
			document.getElementById("errorAddressUrlMessage").innerHTML = "";
		}

		let  list_images = document.getElementById("images");
		if(typeof(list_images.files[0]) != "undefined")
		{
			var images = document.getElementById("images").files[0];
			document.getElementById("errorImagesMessage").innerHTML = "";
		}
		else
		{
			document.getElementById("errorImagesMessage").innerHTML = "请上传图片";
			return false;
		}	
		
		 let _token = document.getElementById("_token").value;
		 let formData = new FormData();
		    formData.append("title", title);
		    formData.append("belong_type", belong_type);
		    formData.append("address_url", address_url);
		    formData.append("images", images);
		    formData.append("_token", _token);
	        httpHelper({
	            type:'POST',
	            async:'TRUE',
	            data:formData,
	            url:"{{route('a_advertising_add')}}",
	            success:function(data){
	            	 let json_data = JSON.parse(data);
	            	 if(json_data.status == 200){
	            		 alert(json_data.message);
		            	 self.location="{{route('a_advertising_list')}}";
	            	 }else{
	            		 alert(json_data.message);
		            
	            	 }
	            },
	            error:function(){
	            	let json_data = JSON.parse(err);
	            	alert(err.message);
	            	alert('失败');
	            }
	        });
		
		
	}
}
function httpHelper(params) {
    var request;
    if(XMLHttpRequest)
        request=new XMLHttpRequest();
    else
        request=new ActiveXObject("Microsoft.XMLHTTP");
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.status == 200) {
                if (params.success)
                    params.success(request.responseText);
            }
            else if (parseInt(request.status / 100) == 4) {
                if (params.error)
                    params.error(request.responseText);
            }
        }
    }
    request.open(params.type, params.url, params.async);
    try {
        request.send(params.data||null);
    } catch (e) {
        if (params.error)
            params.error(request.responseText);
    }
}
function previews(file) {
	  var prevDiv = document.getElementById('Test');
	  if (file.files && file.files[0]) {
	   var reader = new FileReader();
	   reader.onload = function(evt) {
	    prevDiv.innerHTML = '<img src="' + evt.target.result + '" />';
	   }
	   reader.readAsDataURL(file.files[0]);
	  } 
	 }
</script>
@endsection
