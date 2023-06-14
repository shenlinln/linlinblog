/**
 * login 操作
 */

if(document.getElementById("admin_login"))
{
	document.getElementById("admin_login").onclick=function()
	{
		
		let user = document.getElementById("adminuser").value;
		if(user == ''){
			document.getElementById("errorMessage").innerHTML = "请填写登录名";
			return false;
		}
		let passwrod = document.getElementById("adminpass").value;
		if(passwrod == ''){
			document.getElementById("errorMessage").innerHTML = "请填写密码";
			return false;
		}
		 let _token = document.getElementById("_token").value;
		 let formData = new FormData();
		    formData.append("adminuser", user);
		    formData.append("adminpass", passwrod);
		    formData.append("_token", _token);
	        httpHelper({
	            type:'post',
	            async:'true',
	            data:formData,
	            url:'/admin/gkwbackstage-login',
	            success:function(data){
	            	 let json_data = JSON.parse(data);
	            	 if(json_data.bool == true){
	            		 alert(json_data.message);
		            	 self.location='/admin/main';
	            	 }else{
	            		 alert(json_data.message);
		            	 self.location='/admin/login';
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
/**
 * 添加新闻资讯添加按钮
 */
if(document.getElementById("news_add"))
{
	document.getElementById("news_add").onclick=function()
	{
		self.location="/admin/news_add";
	}
}

/**
 * 添加相关技术资讯
 */
if(document.getElementById("technology_add"))
{
	document.getElementById("technology_add").onclick=function()
	{
		self.location="/admin/technology_add";
	}
}

/**
 * 添加发布PHP添加按钮
 */
if(document.getElementById("release_add"))
{
	document.getElementById("release_add").onclick=function()
	{
		self.location="/admin/release_add";
	}
}
/**
*添加广告图
 */
if(document.getElementById("advertising_add")){
	
	document.getElementById("advertising_add").onclick = function(){
		
		self.location = "/admin/advertising_add";
	}
}
/**
 * 添加发布应用添加按钮
 */
if(document.getElementById("application_add"))
{
	document.getElementById("application_add").onclick=function()
	{
		self.location="/admin/application_add";
	}
}
//更改发布按钮
function release_edit(value){
	let id = value;
	self.location="/admin/release_edit/"+id;
}
/**
 * 发布详细
 */

function release_detail(value){
	let id = value;
	
	self.location="/admin/release_detail/"+id;
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