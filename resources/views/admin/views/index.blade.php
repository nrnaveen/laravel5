@extends('admin.layouts.admin')
@section('header_scripts')
	{!! HTML::script("admin_files/js/main.js") !!}
@stop
@section('content')
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">{{ trans('message.ManageUsers') }}</div>
			<div class="panel-body">
				<div id="morris-area-chart">
					
				</div>
			</div>
		</div>
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