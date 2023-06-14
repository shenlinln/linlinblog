@extends('admin.layouts.header')
@section('title', '中医药网后台')
@section('sidebar')
    @parent
@endsection
@section('content')
<div class="page-header">
	<h1>应用发布提交
	   <small>
			<i class="ace-icon fa fa-angle-double-right"></i>
				Common form elements and layouts
		</small>
	</h1>
</div>
<form class="form-horizontal" role="form">
  <div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">发布标题</label>
            <div class="col-sm-9"><input type="text" id="title" placeholder="发布标题" class="col-xs-10 col-sm-5"><label id="errorTitleMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关键字</label>
          <div class="col-sm-9"><input type="text" id="keyword" placeholder="关键字" class="col-xs-10 col-sm-5"></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">导读</label>
            <div class="col-sm-4">	<textarea id="introduction" class="autosize-transition form-control" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 62px;"></textarea>
           </div> <label id="errorIntroductionMessage"  style="padding-left: 30px;color: red;"></label>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">来源</label>
          <div class="col-sm-9"><input type="text" id="source" placeholder="来源" class="col-xs-10 col-sm-5"><label id="errorSourceMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">来源地址</label>
          <div class="col-sm-9"><input type="text" id="source_url" placeholder="来源地址" class="col-xs-10 col-sm-5"><label id="errorSourceUrlMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">作者</label>
          <div class="col-sm-9"><input type="text" id="author" placeholder="作者" class="col-xs-10 col-sm-5"><label id="errorAuthorMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>

	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">发布时间</label>
          <div class="col-sm-9"><input type="text" id="release_time" placeholder="发布时间" class="col-xs-10 col-sm-5"></div>
	</div>
		<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">内容</label>
           <div class="col-sm-6"><div id="release_content"></div></div>
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
			<button class="btn btn-info" type="button" id="release_submit">
			<i class="ace-icon fa fa-check bigger-110"></i>
			提交
			</button>

		</div>
	</div>
	<input type="hidden" id="_token" value="{{csrf_token()}}">		
</form>
<script>

laydate.render({
  elem: '#release_time' 
});
var E = window.wangEditor
var editor1 = new E('#release_content')
//editor1.customConfig.uploadImgShowBase64 = true
 editor1.customConfig.uploadImgServer = 'https://www.gongkew.com/api/UploadImageFile';
editor1.customConfig.uploadFileName = 'file';
editor1.customConfig.uploadImgMaxSize = 1 * 1024 * 1024
editor1.customConfig.uploadImgHeaders = {'Accept' : 'multipart/form-data'};
editor1.customConfig.uploadImgHooks = {
error: function (xhr, editor) {alert("2:"+xhr);},
fail: function (xhr, editor, result) {alert("1:"+xhr);},
success:function(xhr, editor, result){console.log(result)},
customInsert: function (insertImg, result, editor) {insertImg(result.url)}
};
editor1.create();
if(document.getElementById("release_submit"))
{
	document.getElementById("release_submit").onclick=function()
	{

	   
		let title = document.getElementById("title").value;
		if(title == ''){
			document.getElementById("errorTitleMessage").innerHTML = "请填写新闻标题";
			return false;
		}else{
			document.getElementById("errorTitleMessage").innerHTML = "";
		}
		let introduction = document.getElementById("introduction").value;
		if(introduction == ''){
			document.getElementById("errorIntroductionMessage").innerHTML = "请填写导读";
			return false;
		}else{
			document.getElementById("errorIntroductionMessage").innerHTML = "";
		}
		
		let source = document.getElementById("source").value;
		if(source == ''){
			document.getElementById("errorSourceMessage").innerHTML = "请填写来源";
			return false;
		}else{
			document.getElementById("errorSourceMessage").innerHTML = "";
		}
		let source_url = document.getElementById("source_url").value;
		if(source_url == ''){
			document.getElementById("errorSourceUrlMessage").innerHTML = "请填写来源地址";
			return false;
		}else{
			document.getElementById("errorSourceUrlMessage").innerHTML = "";
		}
		
		let author = document.getElementById("author").value;
		if(author == ''){
			document.getElementById("errorAuthorMessage").innerHTML = "请填写新闻作者";
			return false;
		}else{
			document.getElementById("errorAuthorMessage").innerHTML = "";
		}
		let  list_images = document.getElementById("images");
		if(typeof(list_images.files[0]) != "undefined")
		{
			var images = document.getElementById("images").files[0];
		}
		else
		{
			document.getElementById("errorImagesMessage").innerHTML = "请上传图片";
		}	
		 let release_time = document.getElementById("release_time").value;
		 let keyword = document.getElementById("keyword").value;
    	 let content = editor1.txt.html();
		 let _token = document.getElementById("_token").value;
		 let formData = new FormData();
		    formData.append("title", title);
		    formData.append("introduction", introduction);
		    formData.append("source", source);
		    formData.append("source_url", source_url);
		    formData.append("author", author);
		    formData.append("release_time", release_time);
		    formData.append("keyword", keyword);
		    formData.append("content", content);
		    formData.append("images", images);
		    formData.append("_token", _token);
	        httpHelper({
	            type:'POST',
	            async:'TRUE',
	            data:formData,
	            url:"{{route('a_applic_add')}}",
	            success:function(data){
	            	 let json_data = JSON.parse(data);
	            	 if(json_data.bool == true){
	            		 alert(json_data.message);
		            	 self.location="{{route('a_applic_list')}}";
	            	 }else{
	            		 alert(json_data.message);
		            	 self.location="{{route('a_applic_add')}}";
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