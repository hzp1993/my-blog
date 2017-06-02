@extends('admin._layout.base')

@section('style')
    <link href="{{ URL::asset(__CSS__ . 'plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'plugins/switchery/switchery.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <style>
        .switchery{
            height: 22px;
        }
        .switchery small{
            height: 25px;
            top: -2px;
            left: 26px;
            transition: left 0.2s;
            width: 24px;
        }
   </style>
@endsection

@section('body')

	<div class="row J_mainContent" id="content-main">
	  
	    	<div class="ibox float-e-margins">
	    		<div class="ibox-title">后台菜单</div>
	    		<div class="ibox-content">
		    		<div class="row">
		    			<div class="col-sm-12">
				    		<div class="oper-action">
				    			<a href="{{ url('admin/menu/create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> 新增菜单</a>
				    			<a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> 删除菜单</a>
				    		</div>
				    		<div class="table-responsive">
					    		<table class="table table-striped">
					    			<thead>
					    				<tr>
					    					<th><input type="checkbox" class="i-checks" name="checkAll"></th>
					    					<th>ID</th>
					    					<th>菜单名称</th>
					    					<th>模块名称</th>
					    					<th>URL链接地址</th>
					    					<th>类名</th>
					    					<th>菜单排序</th>
					    					<th>菜单状态</th>
					    					<th>菜单操作</th>
					    				</tr>
					    			</thead>
					    			<tbody>
					    				@if(count($data) == false)
						    				<tr>
						    					<td colspan="8" align="center">
						    						暂无数据！
						    					</td>
						    				</tr>
					    				@else
											@foreach($data['data'] as $key => $val)
												<tr>
													<td><input type="checkbox" class="i-checks" name="check" value="{{ $val['id'] }}" ></td>
													<td>{{ $val['id'] }}</td>
													<td style="padding-left:{{ $val['left'] }}">{{ $val['lefthtml'] }}{{ $val['name'] }}</td>
													<td>{{ $val['mode'] }}</td>
													<td>{{ $val['url'] }}</td>
													<td>{{ $val['class'] }}</td>
													<td><input type="text" value="{{ $val['sort'] }}" class="form-control" style="width:50px;"></td>
													<td><input type="checkbox" name="status" class="js-switch" @if($val['status'] ==1)checked @endif /></td>
													<td><a href="{{ url('admin/menu/edit/id') }}"><i class="fa fa-edit"></i> 编辑</a></td>
												</tr>
											@endforeach

										@endif

					    			</tbody>
					    		</table>
				    		</div>
				    	</div>
			    	</div>
		    	</div>
	    	</div>
	</div>

@endsection
@section('script')
        <script src="{{ URL::asset(__JS__ . 'plugins/iCheck/icheck.min.js') }}"></script>
        <script src="{{ URL::asset(__JS__ . 'plugins/switchery/switchery.js') }}"></script>
        <script src="{{ URL::asset(__JS__ . 'plugins/sweetalert/sweetalert.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });

                var elem = document.querySelectorAll('.js-switch');
                for(var i = 0; i < elem.length ; i++){
                    var switchery = new Switchery(elem[i], {
                        color: '#1AB394'
                    });
                }

            });
        </script>
@endsection