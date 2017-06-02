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
	    		<div class="ibox-title">角色授权</div>
	    		<div class="ibox-content">
		    		<div class="row">
		    			<div class="col-sm-12 form-horizontal">
							<div class="form-group">
							  	<label class="col-sm-1 control-label">角色名称：</label>
							  	<div class="col-sm-11">
							  		<input type="text" class="form-control" value="@if(isset($find->display_name)){{ $find->display_name }}@endif">
							  	</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
							  	<label class="col-sm-1 control-label">角色描述：</label>
							  	<div class="col-sm-11">
							  		<textarea class="form-control" row="2">{{ $find->description }}</textarea>
							  	</div>
							</div>
							<div class="hr-line-dashed"></div>

							<div class="alert alert-info">权限分配 [权限分配为四级，同时控制左侧导航以及用户权限]</div>
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td class="col-sm-2">模块</td>
                                                <td class="col-sm-10">权限</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($data as $permission)
                                            @foreach($permission as $k => $v)
                                            <tr>
                                                <td class="col-sm-2">{{ $k }}</td>
                                                <td class="col-sm-10">
                                                    @if(isDoubleArray($v))
                                                    @foreach($v as $val)
                                                        <div class="col-md-3">
                                                            <input type="checkbox" class="i-checks" name="permission" id="{{ $val['key'] }}" value="{{ $val['id'] }}">
                                                            <label for="{{ $val['key'] }}">
                                                                {{ $val['display_name'] }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    @else
                                                        <div class="col-md-2">
                                                            <input type="checkbox" name="permission[]" id="{{$v['key']}}" value="{{$v['id']}}" class="md-check">
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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