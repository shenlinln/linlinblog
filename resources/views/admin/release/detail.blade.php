@extends('admin.layouts.header')
@section('title', '泵阀网后台')
@section('sidebar')
    @parent
@endsection
@section('content')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">首页</a></li>
		<li><a href="#">发布详细</a></li>
		<li class="active">详细内容</li>
	 </ul>
       <button class="btn btn-primary" id="release_add">返回</button>
	<div class="nav-search" id="nav-search">
		<form class="form-search">
			<span class="input-icon">
			<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
			<i class="ace-icon fa fa-search nav-search-icon"></i>
			</span>
		</form>
	</div>
</div>
		<div class="page-content">
			<div class="page-header"><h1>发布<small><i class="ace-icon fa fa-angle-double-right"></i>详细</small></h1></div>
			 <div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<table id="simple-table" class="table  table-bordered table-hover">
							<tr>
								<td style="width: 100px">标题</td>
								<td style="width: 200px">{{$data->title}}</td>
								<td style="width: 100px">作者</td>
								<td style="width: 200px">{{$data->author}}</td>
								<td style="width: 100px">发布时间</td>
								<td style="width: 200px">{{date('Y-m-d',$data->release_time)}}</td>
				           </tr>
				          <tr>
								<td style="width: 100px">阅读人数</td>
								<td style="width: 200px">{{$data->read_count}}</td>
								<td style="width: 100px">关键字</td>
								<td style="width: 200px">{{$data->keyword}}</td>
								<td style="width: 100px"></td>
								<td style="width: 200px"></td>
				           </tr>
				           <tr>
								<td style="width: 100px">简介</td>
								<td colspan="5">{{$data->introduction}}</td>
				           </tr>
				            <tr>
								<td style="width: 100px">内容</td>
								<td colspan="5">{!!$data->content!!}</td>
				           </tr>
				           <tr>
								<td style="width: 100px">发布时间</td>
								<td colspan="2">{{date('Y-m-d',$data->create_at)}}</td>
								<td style="width: 100px">修改时间</td>
								<td colspan="2">@if($data->update_at == 0)@else{{date('Y-m-d',$data->update_at)}}@endif</td>
				           </tr>
								</table>
							</div>
						</div>
					</div>
				</div>
		</div>
@endsection
