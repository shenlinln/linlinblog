@extends('web.layouts.header')
@section('content')
<main>
<!-- 每列显示15条 -->
    <h2 class="place">您现在的位置是：<a href="http://www.getphp.cn">主页</a> &gt; <a href="/yingxiaotuiguang/">PHP应用</a> &gt; </h2>
    <div class="bloglist">
      <ul>
       @foreach($data as $key => $value)
        <li> <i class="blogpic"><a href="{{route('p_detail',['id' => $value->id])}}" title="{{$value->title}}" target="_blank"><img src="{{$value->list_image}}" alt="{{$value->title}}"></a></i>
          <dl>
            <dt><a href="{{route('p_detail',['id' => $value->id])}}" title="{{$value->title}}" target="_blank"><b>{{$value->title}}</b></a></dt>
            <dd><span class="bloginfo">{{$value->introduction}}</span>
              <p class="timeinfo"><span class="lanmu"><a href="/yingxiaotuiguang/">PHP应用</a></span><span class="date">{{date('Y-m-d',$value->release_date)}}</span></p>
              <a class="read" href="{{route('p_detail',['id' => $value->id])}}" target="_blank">阅读更多</a> </dd>
          </dl>
        </li> 
        @endforeach
      </ul>
    </div>
    <!--bloglist end--> 
    <div class="pagelist"><ul><li>首页</li>
<li class="thisclass">1</li>
<li><a href="list_10_2.html">2</a></li>
<li><a href="list_10_2.html">下一页</a></li>
<li><a href="list_10_2.html">末页</a></li>
</ul></div>
  </main>
  @include('web.layouts.offside')

@endsection