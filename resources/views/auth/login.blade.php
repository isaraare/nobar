@extends('layouts.app')

@section('login')
<div class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>NO</b>Bar</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"> ระบบจัดการร้านอาหารโนบาร์</p>

      {{ Form::open(['route' => 'login']) }}
      @csrf
      <div class="form-group has-feedback">
        {{ Form::text('username', NULL, ['class'=>'form-control', 'placeholder'=>'Username']) }}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @if ($errors->has('username'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
         @endif

      </div>
      <div class="form-group has-feedback">
        {{ Form::password('password', ['class' => 'form-control', 'placeholder'=>'Password']) }}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
        </div>
        <!-- /.col -->
      </div>
     {{ Form::close() }}
    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>
@endsection
