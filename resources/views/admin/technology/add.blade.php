@extends('admin.layouts.header')
@section('title', '中医药网后台')
@section('sidebar')
    @parent
@endsection
@section('content')
<div class="page-header">
	<h1>相关技术资讯提交
	   <small>
			<i class="ace-icon fa fa-angle-double-right"></i>
				Common form elements and layouts
		</small>
	</h1>
</div>
<form class="form-horizontal" role="form">
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1">技术分类</label>
<div class="col-sm-9">
     <select   data-placeholder="Choose a State..." id="news_type">
		<option value="0">==请选择==  </option>
		@foreach($news_type as $key => $value)
		<option value="{{$value->id}}">{{$value->news_name}}</option>
		@endforeach
		</select><label id="errorTypeMessage"  style="padding-left: 30px;color: red;"></label>
		</div>
	</div>	
	
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">今日焦点</label>
		&nbsp;&nbsp;&nbsp;&nbsp;<input name="focus_today" type="radio"  class="ace"   value="0" checked="checked"><span class="lbl">&nbsp;&nbsp;否</span>
		&nbsp;&nbsp;&nbsp;&nbsp;<input name="focus_today" type="radio" class="ace" value="1"><span class="lbl">&nbsp;&nbsp;是</span>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">是否推荐</label>
		&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_recommend" type="radio"  class="ace"   value="0" checked="checked"><span class="lbl">&nbsp;&nbsp;不推荐</span>
		&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_recommend" type="radio" class="ace" value="1"><span class="lbl">&nbsp;&nbsp;推荐</span>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">是否热门</label>
		&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_hot" type="radio"  class="ace"   value="0" checked="checked"><span class="lbl">&nbsp;&nbsp;不热门</span>
		&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_hot" type="radio" class="ace" value="1"><span class="lbl">&nbsp;&nbsp;热门</span>
</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关键字</label>
          <div class="col-sm-9"><input type="text" id="keyword" placeholder="关键字" class="col-xs-10 col-sm-5"></div>
	</div>
  <div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">技术资讯标题</label>
            <div class="col-sm-9"><input type="text" id="title" placeholder="新闻标题" class="col-xs-10 col-sm-5"><label id="errorTitleMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">技术资讯导读</label>
            <div class="col-sm-4">	<textarea id="introduction" class="autosize-transition form-control" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 62px;"></textarea>
           </div> <label id="errorIntroductionMessage"  style="padding-left: 30px;color: red;"></label>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">技术资讯作者</label>
          <div class="col-sm-9"><input type="text" id="author" placeholder="新闻作者" class="col-xs-10 col-sm-5"><label id="errorAuthorMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">技术资讯来源</label>
          <div class="col-sm-9"><input type="text" id="source" placeholder="新闻来源" class="col-xs-10 col-sm-5"></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">发布时间</label>
          <div class="col-sm-9"><input type="text" id="release_date" placeholder="发布时间" class="col-xs-10 col-sm-5"></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">来源地址</label>
          <div class="col-sm-9"><input type="text" id="source_url" placeholder="来源地址" class="col-xs-10 col-sm-5"></div>
	</div>

		<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">技术资讯内容</label>
           <div class="col-sm-6"><div id="news_content"></div></div>
	</div>
	
<div class="form-group"><div class="col-xs-12">
 <label class="col-sm-3 control-label no-padding-right" for="form-field-1">技术资讯图片</label>
				 <div class="col-sm-2"><label class="ace-file-input ace-file-multiple">
				<input multiple="" type="file" id="news_image" onchange="previews(this)">
				<span class="ace-file-container" >
				<span class="ace-file-name"><i class=" ace-icon ace-icon fa fa-cloud-upload"></i>
				</span></span><a class="remove" href="#">
				<i class=" ace-icon fa fa-times"></i></a></label>
				<div id="Test" style="display:inline-block"><img alt="" /></div></div>
</div>
</div>
<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="button" id="news_submit">
			<i class="ace-icon fa fa-check bigger-110"></i>
			提交
			</button>

		</div>
	</div>
	<input type="hidden" id="_token" value="{{csrf_token()}}">		
</form>
<script>

laydate.render({
  elem: '#release_date' 
});
var E = window.wangEditor
var editor1 = new E('#news_content')
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
if(document.getElementById("news_submit"))
{
	document.getElementById("news_submit").onclick=function()
	{
		let type = document.getElementById('news_type');
		
		var news_type = type.selectedIndex;
		
	    if(news_type == 0)
	    {
	    	document.getElementById("errorTypeMessage").innerHTML = "请填写新闻类别";
	    	return false;
		}else{
			document.getElementById("errorTypeMessage").innerHTML = "";
			}
	    let inputs = document.getElementsByName("focus_today");
	      for (var i = 0; i < inputs.length; i++) {
	    	if (inputs[i].checked) {
	    		var  focus_today = inputs[i].value;
	    	}
	      }

	   let recommend = document.getElementsByName("is_recommend"); 
	      for (var i = 0; i < recommend.length; i++) {
		    	if (recommend[i].checked) {
		    		var  is_recommend = recommend[i].value;
		    	}
		      }
	   let hot = document.getElementsByName("is_hot"); 
		      for (var i = 0; i < hot.length; i++) {
			    	if (hot[i].checked) {
			    		var  is_hot = hot[i].value;
			    	}
			      }
	   
		let title = document.getElementById("title").value;
		if(title == ''){
			document.getElementById("errorTitleMessage").innerHTML = "请填写新闻标题";
			return false;
		}else{
			document.getElementById("errorTitleMessage").innerHTML = "";
		}
		let introduction = document.getElementById("introduction").value;
		if(introduction == ''){
			document.getElementById("errorIntroductionMessage").innerHTML = "请填写新闻导读";
			return false;
		}else{
			document.getElementById("errorIntroductionMessage").innerHTML = "";
		}
		let author = document.getElementById("author").value;
		if(author == ''){
			document.getElementById("errorAuthorMessage").innerHTML = "请填写新闻作者";
			return false;
		}else{
			document.getElementById("errorAuthorMessage").innerHTML = "";
		}

		
		let source = document.getElementById("source").value;
		let release_date = document.getElementById("release_date").value;
		let source_url = document.getElementById("source_url").value;
		let keyword = document.getElementById("keyword").value;
		let  images = document.getElementById("news_image");
		
		if(typeof(images.files[0]) != "undefined")
		{
			var news_image = document.getElementById("news_image").files[0];
		}
		else
		{
			var news_image = '';
		}
		
		 let   content = editor1.txt.html();
		 let _token = document.getElementById("_token").value;
		 let formData = new FormData();
		    formData.append("news_type", news_type);
		    formData.append("is_recommend", is_recommend);
		    formData.append("is_hot", is_hot);
		    formData.append("focus_today", focus_today);
		    formData.append("title", title);
		    formData.append("introduction", introduction);
		    formData.append("author", author);
		    formData.append("source", source);
		    formData.append("release_date", release_date);
		    formData.append("source_url", source_url);
		    formData.append("keyword", keyword);
		    formData.append("news_image", news_image);
		    formData.append("content", content);
		    formData.append("_token", _token);
	        httpHelper({
	            type:'POST',
	            async:'TRUE',
	            data:formData,
	            url:"{{route('a_technology_add')}}",
	            success:function(data){
	            	 let json_data = JSON.parse(data);
	            	 if(json_data.bool == true){
	            		 alert(json_data.message);
		            	 self.location="{{route('a_technology_list')}}";
	            	 }else{
	            		 alert(json_data.message);
		            	 self.location="{{route('a_technology_add')}}";
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
