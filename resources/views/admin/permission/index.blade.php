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
	    		<div class="ibox-title">{{ trans('labels.permission.list') }}</div>
	    		<div class="ibox-content">
		    		<div class="row">
		    			<div class="col-sm-12">
				    		<div class="oper-action">
				    			<a href="{{ url('admin/permission/create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> {{ trans('crud.create') }}</a>
				    			<a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> {{ trans('crud.destory') }}</a>
				    		</div>
				    		<div class="table-responsive">
					    		<table class="table table-striped">
					    			<thead>
					    				<tr>
					    					<th><input type="checkbox" class="i-checks" name="checkAll"></th>
					    					<th>ID</th>
					    					<th>{{ trans('labels.permission.name') }}</th>
					    					<th>{{ trans('labels.permission.url') }}</th>
					    					<th>{{ trans('labels.permission.sort') }}</th>
					    					<th>{{ trans('labels.permission.status') }}</th>
					    					<th>{{ trans('labels.operation') }}</th>
					    				</tr>
					    			</thead>
					    			<tbody>
					    				@if(count($data) == false)
						    				<tr>
						    					<td colspan="8" align="center">
						    						{{ trans('tips.No data') }}
						    					</td>
						    				</tr>
					    				@else
											@foreach($data as $key => $val)
												<tr>
													<td><input type="checkbox" class="i-checks" name="check" value="{{ $val->id }}" ></td>
													<td>{{ $val->id }}</td>
													<td>{{ $val->display_name }}</td>
													<td>{{ $val->name }}</td>
													<td><input type="text" value="{{ $val->sort }}" class="form-control" style="width:50px;"></td>
													<td><input type="checkbox" name="status" class="js-switch" @if($val->status == 1)checked @endif /></td>
													<td><a href="/admin/permission/{{ $val->id }}/edit"><i class="fa fa-edit"></i> {{trans('crud.edit')}}</a></td>
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