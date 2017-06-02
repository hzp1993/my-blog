@extends('admin._layout.base')

@section('body')

 <div class="row J_mainContent" id="content-main">
    <div class="col-sm-12">
   		<div class="row row-sm text-center">
   			<div class="col-xs-3">
   				<div class="panel padder-v item">
   					<a href="{{ url('admin/article') }}">
   					<div class="h1 text-info font-thin h1">521</div>
   					<div class=" text-xs text-info"><strong>文章量</strong></div>
   					</a>
   				</div>
   			</div>
   			<div class="col-xs-3">
   				<div class="panel padder-v item bg-info">
   					<a href="{{ url('admin/article') }}">
   					<div class="h1 text-fff font-thin h1">521</div>
   					<div class=" text-xs text-fff"><strong>评论</strong></div>
   					</a>
   				</div>
   			</div>
   			<div class="col-xs-3">
   				<div class="panel padder-v item">
   					<a href="{{ url('admin/article') }}">
   					<div class="h1 text-info font-thin h1">521</div>
   					<div class=" text-xs text-info"><strong>评论</strong></div>
   					</a>
   				</div>
   			</div>
   			<div class="col-xs-3">
   				<div class="panel padder-v item bg-info">
   					<a href="{{ url('admin/article') }}">
   					<div class="h1 text-fff font-thin h1">521</div>
   					<div class=" text-xs text-fff"><strong>评论</strong></div>
   					</a>
   				</div>
   			</div>
   		</div>
    </div>
    <div class="col-sm-12 col-xs-12">
    	<div class="row">
    		<div class="col-xs-12">
	    		<div class="ibox float-e-margins">
	    			<div class="ibox-title">
	    				<h5><i class="fa fa-cog"></i> 系统信息 </h5>
	    			</div>
	    			<div class="col-xs-12">
	    				<div class="row ibox-content">
	    					<div class="col-xs-6">
	    						<ul class="list-group">
			    					<li class="list-group-item">
			    						操作系统：
			    						<span style="float:right"><?php echo PHP_OS?></span>
			    					</li>
			    					<li class="list-group-item ">
			    						PHP 版本：
			    						<span style="float:right"><?php echo PHP_VERSION?></span>
			    					</li>
			    					<li class="list-group-item ">
			    						GD 版本：
			    						<span style="float:right"><?php echo $data["gd_version"];?></span>
			    					</li>
			    					<li class="list-group-item ">
			    						最大占用内存：
			    						<span style="float:right"><?php echo $data["memory_limit"];?></span>
			    					</li>
			    					<li class="list-group-item ">
			    						安全模式：
			    						<span style="float:right"><?php echo $data["safe_mode"];?></span>
			    					</li>
			    					
			    				</ul>
	    					</div>
	    					<div class="col-xs-6">
	    						<ul class="list-group">
			    					<li class="list-group-item">
			    						服务器环境：
			    						<span style="float:right"><?php echo $_SERVER ["SERVER_SOFTWARE"];?></span>
			    					</li>
			    					<li class="list-group-item ">
			    						MYSQL 版本：
			    						<span style="float:right"></span>
			    					</li>
			    					<li class="list-group-item ">
			    						文件上传限制：
			    						<span style="float:right"><?php echo $data["upload_max_size"];?></span>
			    					</li>
			    					<li class="list-group-item ">
			    						最大执行时间：
			    						<span style="float:right"><?php echo $data["max_execution_time"];?>s</span>
			    					</li>
			    					<li class="list-group-item ">
			    						MySQL数据库持续连接：
			    						<span style="float:right"><?php echo $data["mysql_allow_persistent"];?></span>
			    					</li>
			    				</ul>
	    					</div>
	    				</div>
	    			</div>
	    			
	    		</div>
	    	</div>
    	</div>
    </div>
 </div>

@endsection