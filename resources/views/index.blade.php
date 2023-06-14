@extends('layouts.main')
@section('content')
  <main>
    <!--banner begin-->
    <div class="banner">
      <div id="banner" class="fader">
      @foreach($adv as $a_key => $a_v)
        <li class="slide" ><a href="{{$a_v->address_url}}" title="{{$a_v->title}}" target="_blank">
              <img src="{{$a_v->banner_images}}" alt="{{$a_v->title}}"><span class="imginfo">{{$a_v->title}}</span></a>
        </li>
       @endforeach

        <div class="fader_controls">
          <div class="page prev" data-target="prev">&lsaquo;</div>
          <div class="page next" data-target="next">&rsaquo;</div>
          <ul class="pager_list">
          </ul>
        </div>
      </div>
    </div>
    <!--banner end-->
    <div class="bloglist">
      <ul>
      <!--  每页显示十五条 -->
      @foreach($data as $key => $value)
         <li> <i class="blogpic"><a href="{{route('indexDetail',['id' => $value->id])}}" title="{{$value->title}}" target="_blank"><img src="{{$value->images}}" alt="{{$value->title}}"> </a></i>
          <dl>
            <dt><a href="{{route('indexDetail',['id' => $value->id])}}" title="{{$value->title}}" target="_blank">{{$value->title}}</a></dt>
            <dd><span class="bloginfo">{{$value->introduction}}</span>
              <p class="timeinfo"><span class="lanmu"><a href="/SEOzixun/">发布时间</a></span><span class="date">{{date('Y-m-d',$value->release_time)}}</span></p>
              <a class="read" href="{{route('indexDetail',['id' => $value->id])}}">阅读更多</a> </dd>
          </dl>
        </li>
     @endforeach   
      </ul>
    </div>
    <!--bloglist end--> 
  </main>
  @include('layouts.offside')
  <!--sidebar end--> 
@endsection