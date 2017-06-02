		<div class="form-group">
		  		<label class="col-sm-2 control-label">{{ trans('labels.permission.url') }}：</label>
		  		<div class="col-sm-6">
		  			<input type="text" class="form-control" name="name" value="@if(isset($find->name)){{ $find->name }}@endif">
		  		</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
		  		<label class="col-sm-2 control-label">{{ trans('labels.permission.name') }}：</label>
		  		<div class="col-sm-6">
		  			<input type="text" class="form-control" name="display_name" value="@if(isset($find->display_name)){{ $find->display_name }}@endif">
		  		</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
		  		<label class="col-sm-2 control-label">{{ trans('labels.permission.desc') }}：</label>
		  		<div class="col-sm-6">
		  			<textarea class="form-control" name="description">@if(isset($find->description)){{ $find->description }}@endif</textarea>
		  		</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
		  		<label class="col-sm-2 control-label">{{ trans('labels.permission.status') }}：</label>
		  		<div class="col-sm-6">
		  			<input type="checkbox" name="status" class="js-switch" @if(isset($find->status)) checked @else checked @endif value="1" />
		  		</div>
		</div>
		<div class="hr-line-dashed"></div>
		<div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <a href="javascript:;" onclick="FormSubmit('#forms')" class="btn btn-info">{{ trans('crud.submit') }}</a>
                </div>
        </div>