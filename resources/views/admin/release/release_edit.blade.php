@extends('admin.layouts.header')
@section('title', 'PHP中文网网后台')
@section('sidebar')
    @parent
@endsection
@section('content')
<div class="page-header">
	<h1>PHP发布修改提交
	   <small>
			<i class="ace-icon fa fa-angle-double-right"></i>
				Common form elements and layouts
		</small>
	</h1>
</div>
<form class="form-horizontal" role="form">
  <div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">发布标题</label>
            <div class="col-sm-9"><input type="text" id="title" placeholder="发布标题" class="col-xs-10 col-sm-5" value="{{$data->title}}"><label id="errorTitleMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关键字</label>
          <div class="col-sm-9"><input type="text" id="keyword" placeholder="关键字" class="col-xs-10 col-sm-5" value="{{$data->keyword}}"></div>
	</div>

	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">简介</label>
            <div class="col-sm-4">	<textarea id="introduction" class="autosize-transition form-control" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 62px;">{{$data->introduction}}</textarea>
           </div> <label id="errorIntroductionMessage"  style="padding-left: 30px;color: red;"></label>
	</div>
	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">作者</label>
          <div class="col-sm-9"><input type="text" id="author" placeholder="作者" class="col-xs-10 col-sm-5" value="{{$data->author}}"><label id="errorAuthorMessage"  style="padding-left: 30px;color: red;"></label></div>
	</div>

	<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">发布时间</label>
          <div class="col-sm-9"><input type="text" id="release_time" placeholder="发布时间" class="col-xs-10 col-sm-5" value="{{$data->release_time}}"></div>
	</div>
		<div class="form-group">
	      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">内容</label>
           <div class="col-sm-6"> <textarea id="editor" name="editor" rows="5" style="display: none;">{{$data->content}}</textarea></div>
	</div>
	<div class="form-group">
	<div class="col-xs-12">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1">图片</label>
				 <div class="col-sm-2"><label class="ace-file-input ace-file-multiple" style="color: red;">
				<input multiple="" type="file" id="images" onchange="previews(this)">
				<span class="ace-file-container" >
				<span class="ace-file-name"><i class=" ace-icon ace-icon fa fa-cloud-upload"></i>
				</span></span><a class="remove" href="#">
				<i class=" ace-icon fa fa-times"></i></a>
		 </label>
	<div id="Test" style="display:inline-block"><img alt="" src="http://soucat.oss-cn-beijing.aliyuncs.com/{{$data->images}}"/></div></div><label  id="errorImagesMessage" style="color: red;"></label>
</div>
</div>
<div class="clearfix form-actions">

	<div class="col-md-offset-3 col-md-9">
	        <input type="hidden" id="id"  class="col-xs-10 col-sm-5" value="{{$data->id}}">
	        <input type="hidden" id="_token" value="{{csrf_token()}}">	
			<button class="btn btn-info" type="button" id="release_submit">
			
			<i class="ace-icon fa fa-check bigger-110"></i>
			提交
			</button>
		</div>
	</div>
</form>
<script src="{{URL::asset('admin/js/HandyEditor.min.js')}}"></script>
<script>
var he = HE.getEditor('editor',{
	  width : '800px',
	  height : '400px',
	  autoHeight : true,
	  autoFloat : false,
	  topOffset : 0,
	  uploadPhoto : true,
	  uploadPhotoHandler : 'php/uploadPhoto.php',
	  uploadPhotoSize : 0,
	  uploadPhotoType : 'gif,png,jpg,jpeg',
	  uploadPhotoSizeError : '不能上传大于××KB的图片',
	  uploadPhotoTypeError : '只能上传gif,png,jpg,jpeg格式的图片',
	  lang : 'zh-jian',
	  skin : 'HandyEditor',
	  externalSkin : '',
	  item : ['bold','italic','strike','underline','fontSize','fontName','paragraph','color','backColor','|','center','left','right','full','indent','outdent','|','link','unlink','textBlock','code','selectAll','removeFormat','trash','|','image','expression','subscript','superscript','horizontal','orderedList','unorderedList','|','undo','redo','|','html','|','about']
	});
laydate.render({
  elem: '#release_time' 
});

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
			document.getElementById("errorIntroductionMessage").innerHTML = "请填写简介";
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
		let  list_images = document.getElementById("images");
		if(typeof(list_images.files[0]) != "undefined")
		{
			var images = document.getElementById("images").files[0];
		}
		else
		{
			var images = 0;
		}	
		 let release_time = document.getElementById("release_time").value;
		 let keyword = document.getElementById("keyword").value;
    	 let   content = he.getHtml();
    	 let   id = document.getElementById('id').value;
		 let _token = document.getElementById("_token").value;
		 let formData = new FormData();
		    formData.append("title", title);
		    formData.append("introduction", introduction);
		    formData.append("author", author);
		    formData.append("release_time", release_time);
		    formData.append("keyword", keyword);
		    formData.append("content", content);
		    formData.append("images", images);
		    formData.append("id", id);
		    formData.append("_token", _token);
	        httpHelper({
	            type:'POST',
	            async:'TRUE',
	            data:formData,
	            url:"{{route('a_release_add')}}",
	            success:function(data){
	            	 let json_data = JSON.parse(data);
	            	 if(json_data.bool == true){
	            		 alert(json_data.message);
		            	 self.location="{{route('a_release_list')}}";
	            	 }else{
	            		 alert(json_data.message);
		            	 self.location="{{route('a_release_add')}}";
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