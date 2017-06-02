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
	  				<div class="ibox-title"><a class="fa fa-chevron-left" title="返回上一步"></a> 新增权限</div>
	  				<div class="ibox-content">
		  				<form action="javascript:;" id="forms" class="form-horizontal" data-url="{{ url('admin/role/create') }}">
		  					{{ method_field('PUT') }}
		  					<input type="hidden" name="return_url" value="{{ url('admin/role/index') }}">
		  					@include('admin/role._form')
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