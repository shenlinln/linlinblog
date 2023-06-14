@extends('layouts.main')
@section('sidebar')
    @parent
@endsection
@section('content')
  <main>
    <h2 class="place">您现在的位置是：<a href='http://localhost/'>主页</a> > <a href='/seo/'>资讯新闻</a></h2>
     <div class="fengm">
      <h3><span><a href="/wangzhanyouhua/" target="_blank">更多+</a></span>编程语言资讯</h3>
      <div class="fpicbox">
        <ul>
        @foreach($news_recommend_bc as $r_key => $r_value)
          <li class="fpic">
             <a href="{{route('n_detail',['id' => $r_value->id])}}" title="{{$r_value->title}}"><img src="{{$r_value->news_image}}" alt="{{$r_value->title}}"><i>{{$r_value->title}}</i></a>
          </li>
        @endforeach   
        </ul>
      </div>
      <ul class="fmnews">
       @foreach($news_list_bc as $l_key => $l_value)
        <li><span>{{date('Y-m-d',$l_value->release_date)}}</span><a href="/wangzhanyouhua/26.html" title="{{$l_value->title}}">{{$l_value->title}}</a></li>
       @endforeach   
      </ul>
    </div><div class="fengm">
      <h3><span><a href="/SEOzixun/" target="_blank">更多+</a></span>行业</h3>
      <div class="fpicbox">
        <ul>
        @foreach($news_recommend_hy as $h_key => $h_value)
          <li class="fpic">
             <a href="#" title="{{$h_value->title}}"><img src="{{$h_value->news_image}}" alt="{{$h_value->title}}"><i>{{$h_value->title}}</i></a>
          </li>
        @endforeach  
        </ul>
      </div>
      <ul class="fmnews">
        @foreach($news_list_hy as $hl_key => $hl_value)
            <li><span>{{date('Y-m-d',$hl_value->release_date)}}</span><a href="/wangzhanyouhua/26.html" title="{{$hl_value->title}}">{{$hl_value->title}}</a></li>
        @endforeach       
       </ul>
    </div><div class="fengm">
      <h3><span><a href="/seojiaocheng/" target="_blank">更多+</a></span>综合资讯</h3>
      <div class="fpicbox">
        <ul>
        @foreach($news_recommend_zh as $z_key => $z_value)
          <li class="fpic">
             <a href="#" title="{{$z_value->title}}"><img src="{{$z_value->news_image}}" alt="{{$z_value->title}}"><i>{{$z_value->title}}</i></a>
          </li>
        @endforeach 
        </ul>
      </div>
      <ul class="fmnews">
        @foreach($news_list_zh as $zl_key => $zl_value)
            <li><span>{{date('Y-m-d',$zl_value->release_date)}}</span><a href="/wangzhanyouhua/26.html" title="{{$zl_value->title}}">{{$zl_value->title}}</a></li>
        @endforeach   
      </ul>
    </div>
  </main>
 @include('layouts.offside')
@endsection
