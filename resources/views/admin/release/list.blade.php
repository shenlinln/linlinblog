@extends('admin.layouts.header')
@section('title', '泵阀网后台')
@section('sidebar')
    @parent
@endsection
@section('content')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">首页</a></li>
		<li><a href="#">发布资讯</a></li>
		<li class="active">列表</li>
	 </ul>
       <button class="btn btn-primary" id="release_add">添加发布</button>
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
			<div class="page-header"><h1>发布<small><i class="ace-icon fa fa-angle-double-right"></i>列表</small></h1></div>
			 <div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<table id="simple-table" class="table  table-bordered table-hover">
								<thead>
									<tr>
										<th class="detail-col">id</th>
										<th>标题</th>
										<th>发布作者</th>
										<th class="hidden-480">发布时间</th>
										<th>阅读次数</th>
										<th class="hidden-480">创建时间</th>
										<th>操作</th>
									</tr>
									</thead>
									<tbody>
									@if(count($data)!=0)
									@foreach($data as $key => $value)
									<tr>
										<td class="center">{{$value->id}}</td>
										<td >{{$value->title}}</td>
										<td class="hidden-480">{{$value->author}}</td>
										<td>{{date('Y-m-d',$value->release_time)}}</td>
                                        <td class="hidden-480">{{$value->read_count}}</td>
                                        <td>{{date('Y-m-d',$value->create_at)}}</td>
                                        <td>
											<div class="hidden-sm hidden-xs btn-group">
											
											   <button class="btn btn-xs btn-success" onclick="release_detail({{$value->id}})" ><i class="ace-icon fa fa-check bigger-120"></i>查看</button>
												<button class="btn btn-xs btn-info" onclick="release_edit({{$value->id}})"><i class="ace-icon fa fa-pencil bigger-120"></i>编辑</button>
												<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i>删除</button>
											</div>
										</td>
									</tr>
	                               @endforeach
	                               @else
	                               <tr>
	                                 <td colspan="7">暂无数据</td>
	                               </tr>
	                               @endif
									</tbody>
								</table>
								  {{ $data->links() }}
							</div>
						</div>
					</div>
				</div>
		</div>
@endsection
