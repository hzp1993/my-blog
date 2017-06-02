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
	    		<div class="ibox-title">{{ trans('labels.role.list') }}</div>
	    		<div class="ibox-content">
		    		<div class="row">
		    			<div class="col-sm-12">
				    		<div class="oper-action">
				    			<a href="{{ url('admin/role/create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> {{ trans('crud.create') }}</a>
				    		</div>
				    		<div class="table-responsive">
					    		<table class="table table-striped">
					    			<thead>
					    				<tr>
					    					<th>ID</th>
					    					<th>{{ trans('labels.role.name') }}</th>
					    					<th>{{ trans('labels.role.display') }}</th>
					    					<th>{{ trans('labels.role.desc') }}</th>
					    					<th>{{ trans('labels.role.operation') }}</th>
					    				</tr>
					    			</thead>
					    			<tbody>
					    				@if(count($data) == false)
											<tr>
						    					<td colspan="5" align="center">
						    						{{ trans('tips.No data') }}
						    					</td>
						    				</tr>
					    				@else
					    				@foreach($data as $key => $val)
						    				<tr>
						    					<td>{{ $val->id }}</td>
						    					<td>{{ $val->name }}</td>
						    					<td>{{ $val->display_name }}</td>
						    					<td>{{ $val->description }}</td>
						    					<td class="table_buttom">
						    						<a href="/admin/role/{{ $val['id'] }}/auth"><i class="fa fa-shield"></i> {{ trans('crud.auth') }}</a>
							    					<a href="/admin/role/{{ $val['id'] }}/edit"><i class="fa fa-edit"></i>  {{ trans('crud.edit') }}</a>
							    					<a href=""><i class="fa fa-remove"></i> {{ trans('crud.destory') }}</a>
						    					</td>
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