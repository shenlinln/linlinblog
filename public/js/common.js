/**
 * 
 */
if(document.getElementById("register"))
{
	document.getElementById("register").onclick=function()
	{
		

		let nickname = document.getElementById("nickname").value;
		if(nickname == ''){
			document.getElementById("Nickname_Message").innerHTML = "*请填写昵称";
			document.getElementById("Nickname_Message").style.color = "red";
			return false;
		}else{
			document.getElementById("Nickname_Message").innerHTML = "";
		}
		let phone_number = document.getElementById("phone_number").value;
		if(phone_number == ''){
			document.getElementById("Phone_Number_Message").innerHTML = "*请填手机号码";
			document.getElementById("Phone_Number_Message").style.color = "red";
			return false;
		}else{
			document.getElementById("Phone_Number_Message").innerHTML = "";
		}
		let password = document.getElementById("password").value;
		if(password == ''){
			document.getElementById("Password_Message").innerHTML = "*请填写密码";
			document.getElementById("Password_Message").style.color = "red";
			return false;
		}else{
			document.getElementById("Password_Message").innerHTML = "";
		}

		let verification = document.getElementById("verification").value;
		if(verification == ''){
			document.getElementById("Verification_Message").innerHTML = "*请填写验证码";
			document.getElementById("Verification_Message").style.color = "red";
			return false;
		}else{
			document.getElementById("Verification_Message").innerHTML = "";
		}
		
		 let _token = document.getElementById("_token").value;
		 let formData = new FormData();
		    formData.append("phone_number", phone_number);
		    formData.append("nickname", nickname);
		    formData.append("password", password);
		    formData.append("verification", verification);
		    formData.append("_token", _token);
	        httpHelper({
	            type:'post',
	            async:'true',
	            data:formData,
	            url:'/reg',
	            success:function(data){
	            	 let json_data = JSON.parse(data);
	            	 if(json_data.bool == true){
	            		 let formData = new FormData();
	            		 formData.append("account_number", account_number);
	            		 formData.append("nickname", nickname);
	            		 formData.append("_token", _token);
	         	        httpHelper({
	        	            type:'POST',
	        	            async:'true',
	        	            data:formData,
	        	            url:'/mailbox_verification',
	        	            success:function(data){
	        	            	 let json_data = JSON.parse(data);
	        	            	 if(json_data.bool == true){
	        		            	 self.location='/mailbox_verification';
	        	            	 }
	        	            },
	        	            error:function(){
	        	            	let json_data = JSON.parse(err);
	        	            	alert(err.message);
	        	            	alert('失败');
	        	            }
	        	        });
	            		
		            	// self.location='/admin/main';
	            	 }else{
	            		 document.getElementById(json_data.Error_Message).innerHTML = json_data.message;
	         			 document.getElementById(json_data.Error_Message).style.color = "red";
	         			 document.getElementById(json_data.Error_Message).style.fontSize = "12";
		            	 //self.location='/admin/login';
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
if(document.getElementById("submit")){
     document.getElementById("submit").onclick=function(){
	 let user_name = document.getElementById("user_name").value;
		if(user_name == ''){
			document.getElementById("Nickname_Message").innerHTML = "*请填写昵称";
			document.getElementById("Nickname_Message").style.color = "red";
			return false;
		}else{
			document.getElementById("Nickname_Message").innerHTML = "";
		}
		let pass_word = document.getElementById("pass_word").value;
		if(pass_word == ''){
			document.getElementById("Password_Message").innerHTML = "*请填写密码";
			document.getElementById("Password_Message").style.color = "red";
			return false;
		}else{
			document.getElementById("Password_Message").innerHTML = "";
		}
	   let code = document.getElementById("code").value;
		if(code == ''){
			document.getElementById("Code_Message").innerHTML = "*请填写验证码";
			document.getElementById("Code_Message").style.color = "red";
			return false;
		}else{
			document.getElementById("Code_Message").innerHTML = "";
		}
	 let _token = document.getElementById('_token').value;	
      	 let formData = new FormData();
		 formData.append("nickname", user_name);
	     formData.append("password", pass_word);
         formData.append("code", code);
		 formData.append("_token", _token);
	        httpHelper({
	            type:'POST',
	            async:'true',
	            data:formData,
	            url:'/login',
	            success:function(data){
	            	 let json_data = JSON.parse(data);
	            	 
	            },
	            error:function(){
	            	let json_data = JSON.parse(err);
	            	alert(err.message);
	            	alert('失败');
	            }
	        });

	//document.getElementById("L30").style.backgroundColor="#ccc";
   }
  }
 
if(document.getElementById("register")){
     document.getElementById("phone_required").onclick=function(){
	 var phone = document.getElementById("phone_number").value;
	 let _token = document.getElementById('_token').value;	
	 var  tel = /^[1][3,4,5,7,8][0-9]{9}$/;
	 if(phone == ''){
		document.getElementById("Phone_Number_Message").innerHTML = "*请填手机号码";
		document.getElementById("Phone_Number_Message").style.color = "red"
   	    document.getElementById("phone_number").focus();
		return false;
      }
	  else
	  {
      	  if(!tel.test(phone)){
      		  document.getElementById("Phone_Number_Message").innerHTML = "*手机号码输入有误";
    		  document.getElementById("Phone_Number_Message").style.color = "red"
      	      document.getElementById("phone_number").focus();
      	      document.getElementById("phone_number").value="";
      	      return false;
      	  }
      	 let formData = new FormData();
		 formData.append("phone", phone);
		 formData.append("_token", _token);
	        httpHelper({
	            type:'POST',
	            async:'true',
	            data:formData,
	            url:'/verificationMessage',
	            success:function(data){
	            	 let json_data = JSON.parse(data);
	            	 if(json_data.bool == 1){
	            		 document.getElementById("msg_id").value=json_data.msg_id;
	            	 }
	            },
	            error:function(){
	            	let json_data = JSON.parse(err);
	            	alert(err.message);
	            	alert('失败');
	            }
	        });

	//document.getElementById("L30").style.backgroundColor="#ccc";
   }
  }
 }
if(document.getElementById("mailbox_code"))
{
	document.getElementById("mailbox_code").onclick=function()
	{
	  let code = document.getElementById('code').value;	
	  let _token = document.getElementById('_token').value;	
		 let formData = new FormData();
		 formData.append("code", code);
		 formData.append("_token", _token);
	        httpHelper({
            type:'POST',
            async:'true',
            data:formData,
            url:'/mailbox_code',
            success:function(data){
            	 let json_data = JSON.parse(data);
            	 if(json_data.bool == true){
	            	 //self.location='/mailbox_verification';
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
if(document.getElementById("imageField"))
{
	document.getElementById("imageField").onclick=function()
	{
		
	  let id = document.getElementById('id').value;	
	  let msg = document.getElementById('msg').value;	
	  let _token = document.getElementById('_token').value;	
		 let formData = new FormData();
		 formData.append("topic_id", id);
		 formData.append("content", msg);
		 formData.append("_token", _token);
	        httpHelper({
            type:'POST',
            async:'true',
            data:formData,
            url:'/CommitPost',
            success:function(data){
            	 let json_data = JSON.parse(data);
            	 if(json_data.bool == true){
            		 history.go(0);
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

function reply_submit(){
	
	  let comment_id = document.getElementById('id').value;	
	  let from_uid = 5;
	  let to_uid = 1;
	  let content = document.getElementById('reply_msg').value;	
      let parent_id = document.getElementById('parent_id').value;
	  let _token = document.getElementById('_token').value;	
	  let formData = new FormData();
		 formData.append("comment_id", comment_id);
		 formData.append("from_uid", from_uid);
		 formData.append("to_uid", to_uid);
		 formData.append("content", content);
	     formData.append("parent_id", parent_id);
		 formData.append("_token", _token);
	        httpHelper({
            type:'POST',
            async:'true',
            data:formData,
            url:'/ReplyPost',
            success:function(data){
            	 let json_data = JSON.parse(data);
            	 if(json_data.bool == true){
            		 history.go(0);
            	 }
            },
            error:function(){
            	let json_data = JSON.parse(err);
            	alert(err.message);
            	alert('失败');
            }
        });
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