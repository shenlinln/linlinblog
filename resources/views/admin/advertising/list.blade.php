@extends('admin.layouts.header')
@section('title', '林林博客后台管理')
@section('sidebar')
    @parent
@endsection
@section('content')
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li><i class="ace-icon fa fa-home home-icon"></i><a href="#">首页</a></li>
		<li><a href="#">广告管理</a></li>
		<li class="active">列表</li>
	 </ul>
       <button class="btn btn-primary" id="advertising_add">添加广告</button>
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
			<div class="page-header"><h1>广告<small><i class="ace-icon fa fa-angle-double-right"></i>列表</small></h1></div>
			 <div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<table id="simple-table" class="table  table-bordered table-hover">
								<thead>
									<tr>
										<th class="detail-col">id</th>
										<th>标题</th>
										<th>广告分布</th>
										<th>广告图</th>
										<th>点击数</th>
										<th class="hidden-480">创建时间</th>
										<th>操作</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="center"></td>
										<td ></td>
										<td class="hidden-480"></td>
										<td></td>
                                        <td class="hidden-480"></td>
                                        <td></td>
                                        <td>
											<div class="hidden-sm hidden-xs btn-group">
												<button class="btn btn-xs btn-info" onclick=""><i class="ace-icon fa fa-pencil bigger-120"></i>编辑</button>
												<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i>删除</button>
											</div>
										</td>
									</tr>
									</tbody>
								</table>
								 
							</div>
						</div>
					</div>
				</div>
		</div>
@endsection

