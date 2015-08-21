@extends('layouts/app')

{{-- Web site Title --}}
@section('title') Reset Password @stop

@section('content')
  <div class="row">
    <div class="page-header">
      <h2>Login</h2>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      @include('errors.messages')
      <div class="col-md-8 col-md-offset-2">
        @include('errors.list')
        <div class="panel panel-default">
          <div class="panel-heading">Reset Password</div>
          <div class="panel-body">
            @if (session('status'))
             <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/password/email') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                 <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection