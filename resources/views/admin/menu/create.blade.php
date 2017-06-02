@extends('admin._layout.base')

@section('style')
 	<link href="{{ URL::asset(__CSS__ . 'plugins/switchery/switchery.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'plugins/select/select.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
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
	  	<div class="row">
	  		<div class="col-sm-12">
	  			<div class="ibox float-e-margins">
	  				<div class="ibox-title"><a class="fa fa-chevron-left" title="返回上一步"></a> 新增菜单</div>
	  				<div class="ibox-content">
		  				<form action="javascript:;" id="forms" class="form-horizontal" data-url="{{ url('admin/menu/create') }}">
		  					{{ method_field('PUT') }}
		  					<input type="hidden" name="return_url" value="{{ url('admin/menu') }}">
		  					<div class="form-group">
		  						<label class="col-sm-2 control-label">亲子关系：</label>
		  						<div class="col-sm-6">
		  							<select name="pid" class="chosen-select" style="width:100%;" tabindex="2">
		  								<option value="0">顶级角色</option>
		  								@foreach($data as $key => $val)
											
											<option value="{{ $val['id'] }}"><b style="padding-left:{{ $val['left'] }}">{{ $val['lefthtml'] }}</b>{{ $val['name'] }}</option>

		  								@endforeach
		  							</select>
		  						</div>
		  					</div>
		  					<div class="hr-line-dashed"></div>
		  					<div class="form-group">
		  						<label class="col-sm-2 control-label">菜单名称：</label>
		  						<div class="col-sm-6">
		  							<input type="text" class="form-control" name="name">
		  						</div>
		  					</div>
		  					<div class="hr-line-dashed"></div>
		  					<div class="form-group">
		  						<label class="col-sm-2 control-label">模块名称：</label>
		  						<div class="col-sm-6">
		  							<select name="mode" class="chosen-select" style="width:100%;" tabindex="2">
		  								<option value="0">admin</option>
		  								<option value="1">home</option>
		  							</select>
		  						</div>
		  					</div>
		  					<div class="hr-line-dashed"></div>
		  					<div class="form-group">
		  						<label class="col-sm-2 control-label">URL链接地址：</label>
		  						<div class="col-sm-6">
		  							<input type="text" class="form-control" name="url">
		  						</div>
		  					</div>
		  					<div class="hr-line-dashed"></div>
		  					<div class="form-group">
		  						<label class="col-sm-2 control-label">类名：</label>
		  						<div class="col-sm-6">
		  							<input type="text" class="form-control" name="class">
		  						</div>
		  					</div>
		  					<div class="hr-line-dashed"></div>
		  					<div class="form-group">
		  						<label class="col-sm-2 control-label">菜单排序：</label>
		  						<div class="col-sm-6">
		  							<input type="text" class="form-control" name="sort" value="100">
		  						</div>
		  					</div>
		  					<div class="hr-line-dashed"></div>
		  					<div class="form-group">
		  						<label class="col-sm-2 control-label">状态：</label>
		  						<div class="col-sm-6">
		  							<input type="checkbox" name="status" class="js-switch"  checked  value="1" />
		  						</div>
		  					</div>
		  					<div class="hr-line-dashed"></div>
		  					<div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="javascript:;" onclick="FormSubmit('#forms')" class="btn btn-info" >保存内容</a>
                                </div>
                            </div>
		  				</form>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	</div>

@endsection

@section('script')
        <script src="{{ URL::asset(__JS__ . 'plugins/switchery/switchery.js') }}"></script>
        <script src="{{ URL::asset(__JS__ . 'plugins/chosen/chosen.jquery.js') }}"></script>
        <script>
            $(document).ready(function () {

                var config = {
                    '.chosen-select': {},
                    '.chosen-select-deselect': {
                        allow_single_deselect: true
                    },
                    '.chosen-select-no-single': {
                        disable_search_threshold: 10
                    },
                    '.chosen-select-no-results': {
                        no_results_text: 'Oops, nothing found!'
                    },
                    '.chosen-select-width': {
                        width: "95%"
                    }
                }
                for (var selector in config) {
                    $(selector).chosen(config[selector]);
                }

                var elem = document.querySelectorAll('.js-switch');
                for(var i = 0; i < elem.length ; i++){
                    var switchery = new Switchery(elem[i], {
                        color: '#1AB394'
                    });
                }

            });
        </script>
@endsection