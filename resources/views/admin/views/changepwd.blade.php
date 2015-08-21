@extends('admin.layouts.admin')
@section('header_scripts')
	{!! HTML::script('admin_files/js/jquery.validate.js') !!}
	{!! HTML::script('admin_files/js/validate.js') !!}
@stop
@section('content')
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('message.ChangePassword') }}</div>
				<div class="panel-body">
					<div id="morris-area-chart">
						{!! Form::open(array( 'url' => 'admin/changepwd', 'id' => 'changepass', 'method'=>'post' )) !!}
							<fieldset>
								<div class="form-group">
									{!! Form::password( 'newpassword', array( 'id' => 'newpassword', 'class' => "form-control", 'placeholder' => trans('message.NewPassword') )) !!}
								</div>
								<div class="form-group">
									{!! Form::password( 'conpassword', array( 'class' => "form-control", 'placeholder' => trans('message.Confirmpassword') )) !!}
								</div>
								<button type="submit" class="btn btn-lg btn-success btn-block">{{ trans('message.Save') }}</button>
							</fieldset>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-2"></div>
	</div>
@stop
@section('script')
	{!! HTML::script("admin_files/js/bootstrap.min.js") !!}
	{!! HTML::script("admin_files/js/jquery-ui.min.js") !!}
	{!! HTML::script("admin_files/js/plugins/daterangepicker/daterangepicker.js") !!}
	{!! HTML::script("admin_files/js/plugins/datepicker/bootstrap-datepicker.js") !!}
	{!! HTML::script("admin_files/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") !!}
	{!! HTML::script("admin_files/js/plugins/iCheck/icheck.min.js") !!}
	{!! HTML::script("admin_files/js/AdminLTE/app.js") !!}
@stop