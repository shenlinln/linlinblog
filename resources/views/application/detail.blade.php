@extends('web.layouts.header')
@section('sidebar')
    @parent
@endsection
@section('content')
<link href="{{URL::asset('web/css/comment.css')}}" rel="stylesheet">
  <main>
    <h2 class="place">您现在的位置是：<a href='http://www.getphp.cn/'>主页</a> > <a href='http://www.getphp.cn/php_index/'>PHP应用</a> > <a href="{{route('p_detail',['id' => $data->id])}}">{{$data->title}}</a></h2>
    <div class="infosbox">
      <div class="newsview">
        <h3 class="news_title">{{$data->title}}</h3>
        <div class="bloginfo">
          <ul>
            <li class="author">作者：{{$data->author}} </li>
            <li class="timer">发布时间：{{date('Y-m-d',$data->release_date)}}</li>
            <li class="view">{{$data->browse}}人已阅读</li>
          </ul>
        </div>
        <!--<div class="tags"></div>-->
        <div class="news_about">
        <!-- 简介 -->
        {{$data->introduction}}
        </div>
        <div class="news_content">
         <!-- 内容 -->
        {!!$data->content!!}
        </div>
      </div>
      <div class="share">
        <p class="diggit"><a href="/SEOzixun/"></a></p>
      </div>
      <div class="nextinfo">
        <p>上一篇：<a href='/SEOzixun/195.html'>seo入门需要多久？学seo入门在哪学靠谱？</a> </p>
        <p>下一篇：没有了 </p>
      </div>
      <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
          <li><a href="/SEOzixun/195.html" title="seo入门需要多久？学seo入门在哪学靠谱？">seo入门需要多久？学seo入门在哪学靠谱？</a></li>
        </ul>
      </div>
      <div class="news_pl">
        <h2>文章评论</h2>
        <div class="gbko"><!-- //主模板必须要引入/include/dedeajax2.js -->
<a name='postform'></a>

<!-- //评论表单区结束 --> 
<div class="mt1">
  <dl class="tbox">
    <dd>
      <div class="dede_comment_post">
        <form action="#" method="post" name="feedback">
          <input type="hidden" name="dopost" id="id" value="{{$data->id}}" />
          <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
          <input type="hidden" name="aid" value="196" />
          <input type="hidden" name="parent_id" id="parent_id" />
          <input type="hidden" name="fid" id='feedbackfid' value="0" />
          <div class="clr"></div>
          <div class="dcmp-content">
            <textarea cols="60" name="msg" id="msg" rows="5" class="ipt-txt"></textarea>
          </div>
          <!-- /dcmp-content -->
          <div class="dcmp-post"><!--未登陆-->
            <div class="dcmp-submit">
              <button type="button"  id="imageField">发表评论</button>
              <p class="comment-sm">注：网友评论仅供其表达个人看法，并不代表本站立场。</p>
            </div>
          </div>
        </form>
      </div>
    </dd>
  </dl>
</div>
<!-- //评论内容区 --> 
<div class="ui threaded comments secondary segment" id="commentsContainer">
        <div class="ui inverted dimmer comments-loader">
        <div class="ui text loader">加载中</div>
    </div>
        <div class="comments-wrap">
            <h3 id="comments" class="ui header">评论(<span>12</span>)</h3>
            <!-- 一级回复 -->
             @if(count($comment)!=0)
            @foreach($comment as $m_key => $m_value)
            <div class="comment" name="rpl_318532729" id="rpl_318532729" >
               <a class="ui circular image avatar" href="https://my.oschina.net/u/127025" target="_blank">
               <div class="osc-avatar small-portrait _35x35" title="yong230">
                  <img src="https://static.oschina.net/uploads/user/63/127025_50.jpg?t=1483884846000" alt="yong230" title="yong230">
               </div>
              </a>
              <div class="content">
                   <a class="author" href="https://my.oschina.net/u/127025" target="_blank">yong230</a>
                   <div class="metadata">
                     <span class="date">{{date('Y-m-d',$m_value->create_at)}}</span>
                   </div>
                   <div class="text" data-emoji-render="">{{$m_value->content}}</div>
                   <div class="actions" id="reply_msg_{{$m_value->create_at}}">
                      
                      <input type="hidden" name="aid" id="get_reply_id" value="" />
                      <a class="reply"   onclick="reply_msg({{$m_value->create_at}},0)">回复</a>
                    </div>
              </div>
             @foreach($arr_data as $r_key => $r_value)
               @if($m_value->id == $r_value->comment_id)
                <div class="comments" >
                     <div class="comment" name="rpl_318507472" id="rpl_318507472" >
                       <a class="ui circular image avatar" href="#" target="_blank">
                         <div class="osc-avatar small-portrait _35x35" title="冰力" >
                            <img src="https://static.oschina.net/uploads/user/59/118197_50.JPG?t=1402367476000" alt="冰力" title="冰力">
                          </div>
                      </a>
                      <div class="content"><a class="author" href="#" target="_blank">冰力</a>
                         <span class="osc-author-label">博主</span>
                      <div class="metadata"> <span class="date">{{date('Y-m-d',$r_value->create_at)}}</span> </div>
                      <div class="text" data-emoji-render="">{{$r_value->content}}</div>
                      <div class="actions" id="reply_msg_{{$r_value->create_at}}">
                           <input type="hidden" name="aid" id="get_reply_id" value="" />
                          <a class="reply" onclick="reply_msg({{$r_value->create_at}},{{$r_value->id}})">回复 </a>
                      </div>
                     </div>
                    @foreach($arr_data[$r_key]['son'] as $key => $value)
                      <div class="comments" children-comments="">
                      <div class="comment" name="rpl_318562585" id="rpl_318562585" >
                        <a class="ui circular image avatar" href="#" target="_blank">
                            <div class="osc-avatar small-portrait _35x35 current-user-avatar" title="zb78354233" >
                            <span class="text-portrait" style="background: #bdc3c7">z</span>
                           </div>
                        </a>
                         <div class="content">
                           <a class="author" href="#" target="_blank">zb78354233</a>
                           <div class="metadata"><span class="date">{{date('Y-m-d',$value->create_at)}}</span></div>
                           <div class="text" data-emoji-render="">{{$value->content}}</div>
                           <div class="actions" id="reply_msg_{{$value->create_at}}">
                             <input type="hidden" name="aid" id="get_reply_id" value="" />
                             <a class="reply" onclick="reply_msg({{$value->create_at}},{{$value->id}})">回复 </a>
                           </div>
                         </div>
                       @foreach ($value['son'] as $u => $t)
                         <div class="comments" children-comments="">
                         <div class="comment" name="rpl_318562585" id="rpl_318562585" >
                         <a class="ui circular image avatar" href="#" target="_blank">
                            <div class="osc-avatar small-portrait _35x35 current-user-avatar" title="zb78354233" ><span class="text-portrait" style="background: #bdc3c7">z</span> </div>
                         </a>
                         <div class="content">
                           <a class="author" href="#" target="_blank">zb78354233</a>
                          <div class="metadata"> <span class="date">{{date('Y-m-d',$t->create_at)}}</span></div>
                          <div class="text" data-emoji-render="">{{$t->content}} </div>
                          <div class="actions" id="reply_msg_{{$t->create_at}}">
                           <input type="hidden" name="aid" id="get_reply_id" value="" />
                           <a class="reply" onclick="reply_msg({{$t->create_at}},{{$t->id}})"></a>
                          </div>
                       </div>
                       </div>
                       </div>
                     @endforeach
                  </div>
                  </div>
                @endforeach
               </div>
               </div>
            @endif
          @endforeach   
           </div>
         @endforeach
         @else
         暂无评论
         @endif


    </div>

 <script type="text/javascript">
 function reply_msg(id,parent_id){
     let reply_id = parent_id;
     document.getElementById("parent_id").value= reply_id;
   
	 let dede_comment_post = document.getElementById("dede_comment_post");
	 let q_id = id;
 	 let reply_msg = document.getElementById("reply_msg_"+q_id);
	 if(dede_comment_post == null){
		 document.getElementById("get_reply_id").value = q_id;
		 
	 	 let div1 = document.createElement("div");
	 	 let form = document.createElement("form");
	 	 form.setAttribute("action","#");
	 	 form.setAttribute("method","post");
	 	 form.setAttribute("name","feedback");
	 	 div1.appendChild(form);
	 	 let input1 = document.createElement("input");
	 	 input1.setAttribute("type","hidden");
	 	 input1.setAttribute("name","comment_id");
	 	 input1.setAttribute("id","comment_id");
	 	 input1.setAttribute("value",id);
	 	 form.appendChild(input1);
	 	let input2 = document.createElement("input");
	 	 input2.setAttribute("type","hidden");
	 	 input2.setAttribute("name","_token");
	 	 input2.setAttribute("id","_token");
	 	 input2.setAttribute("value","{{csrf_token()}}");
	 	 form.appendChild(input2);

	 	 
	 	 let div2 = document.createElement("div");
	 	 div2.setAttribute("class","clr");
	 	 form.appendChild(div2);
	 	 let div3 = document.createElement("div");
	 	 div3.setAttribute("class","dcmp-content");
	 	 let textarea = document.createElement("textarea");
	 	 textarea.setAttribute("cols","60");
	 	 textarea.setAttribute("name","msg");
	 	 textarea.setAttribute("id","reply_msg");
	 	 textarea.setAttribute("rows","5");
	 	 textarea.setAttribute("class","ipt-txt");
	 	 div3.appendChild(textarea);
	 	 form.appendChild(div3);
	 	 
	 	 let div4 = document.createElement("div");
	 	 div4.setAttribute("class","dcmp-post");
	   	form.appendChild(div4);
	    let div5 = document.createElement("div");
	    div5.setAttribute("class","dcmp-submit");
	    div4.appendChild(div5);
	    let button = document.createElement("button");
	    button.setAttribute("type","button");
	    button.setAttribute("onclick","reply_submit()");
	    let mz = document.createTextNode("发表评论");
	    button.appendChild(mz);
	    div5.appendChild(button);

	    
	    let p = document.createElement("p");
	    p.setAttribute("class","comment-sm");
	    let sm = document.createTextNode("注：网友评论仅供其表达个人看法，并不代表本站立场。");
	    p.appendChild(sm);
	    div5.appendChild(p);
	 	 div1.setAttribute("class","dede_comment_post");
	 	 div1.setAttribute("id","dede_comment_post");
	 	  reply_msg.appendChild(div1);
		 }else{
			 let get_id = document.getElementById("get_reply_id").value;
			 let reply_remove = document.getElementById("reply_msg_"+get_id);
			 reply_remove.removeChild(dede_comment_post);

			 document.getElementById("get_reply_id").value = q_id;
			 
		 	 let div1 = document.createElement("div");
		 	 let form = document.createElement("form");
		 	 form.setAttribute("action","#");
		 	 form.setAttribute("method","post");
		 	 form.setAttribute("name","feedback");
		 	 div1.appendChild(form);
		 	 let input1 = document.createElement("input");
		 	 input1.setAttribute("type","hidden");
		 	 input1.setAttribute("name","comment_id");
		 	 input1.setAttribute("id","comment_id");
		 	 input1.setAttribute("value",id);
		 	 form.appendChild(input1);
		 	 let div2 = document.createElement("div");
		 	 div2.setAttribute("class","clr");
		 	 form.appendChild(div2);
		 	 let div3 = document.createElement("div");
		 	 div3.setAttribute("class","dcmp-content");
		 	 let textarea = document.createElement("textarea");
		 	 textarea.setAttribute("cols","60");
		 	 textarea.setAttribute("name","msg");
		 	 textarea.setAttribute("id","reply_msg");
		 	 textarea.setAttribute("rows","5");
		 	 textarea.setAttribute("class","ipt-txt");
		 	 div3.appendChild(textarea);
		 	 form.appendChild(div3);
		 	 
		 	 let div4 = document.createElement("div");
		 	 div4.setAttribute("class","dcmp-post");
		   	form.appendChild(div4);
		    let div5 = document.createElement("div");
		    div5.setAttribute("class","dcmp-submit");
		    div4.appendChild(div5);
		    let button = document.createElement("button");
		    button.setAttribute("type","button");
		    button.setAttribute("onclick","reply_submit()");
		    let mz = document.createTextNode("发表评论");
		    button.appendChild(mz);
		    div5.appendChild(button);

		    
		    let p = document.createElement("p");
		    p.setAttribute("class","comment-sm");
		    let sm = document.createTextNode("注：网友评论仅供其表达个人看法，并不代表本站立场。");
		    p.appendChild(sm);
		    div5.appendChild(p);
		 	 div1.setAttribute("class","dede_comment_post");
		 	 div1.setAttribute("id","dede_comment_post");
		 	  reply_msg.appendChild(div1);
			 
			 }

}



</script>
</div>
      </div>
    </div>
  </main>

  @include('web.layouts.offside')
@endsection