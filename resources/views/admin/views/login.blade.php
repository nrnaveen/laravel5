<!DOCTYPE html>
<html lang="en" class="bg-black">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Admin Login</title>
		{!! HTML::style("admin_files/css/bootstrap.min.css") !!}
		{!! HTML::style("admin_files/css/font-awesome.min.css") !!}
		{!! HTML::style("admin_files/css/AdminLTE.css") !!}
	</head>
	<body class="bg-black">
		<div class="form-box" id="login-box">
			@if(Session::has('message'))
				<div class="alert alert-success alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<b>Success</b> {{ Session::get('message') }}
				</div>
			@endif
                           	@if(Session::has('error'))
                           		<div class="alert alert-danger alert-dismissable">
                           			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                           			<b>Error</b> {{ Session::get('error') }}
                           		</div>
                           	@endif
			<div class="header">Sign In</div>
			{!! Form::open(array('action' =>'Admin\AuthController@postIndex', 'id'=>'admin', 'method'=>'post')) !!}
				<div class="body bg-gray">
					<div class="form-group">
						{!! Form::email('email',Session::get('email'),array( 'id'=>'email', 'required'=>'', 'class'=>"form-control", 'placeholder'=>'Email')) !!}
					</div>
					<div class="form-group">
						{!! Form::password('password', array('class' => "form-control", 'placeholder' => "Password", 'required' => '')) !!}
					</div>
				</div>
				<div class="footer">
					{!! Form::submit('Log In', array( 'class' => "btn bg-olive btn-block")) !!}
				</div>
			{!! Form::close() !!}
		</div>
		{!! HTML::script("admin_files/js/jquery.min.js") !!}
		{!! HTML::script("admin_files/js/bootstrap.min.js") !!}
		{!! HTML::script("admin_files/js/jquery.validate.min.js") !!}
		{!! HTML::script("admin_files/js/validate.js") !!}
	</body>
</html>
