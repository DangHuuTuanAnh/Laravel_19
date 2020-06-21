<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng Nhập | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{URL::asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('asset/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('{{URL::asset('asset/dist/img/background/1.jpg')}}'); ">
  <div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg"><h2 style="color: #17a2b8; text-align: center;">{{ __('LOGIN') }}</h2></p>

      {{-- <form method="POST" action="{{ route('login') }}" id="quickForm">

        <div  class="input-group mb-3 form-group">
          <input type="email" class="form-control" placeholder="Email" name="email" id="exampleInputEmail1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
          </div>
      </div>
  </div>
  <div  class="input-group mb-3 form-group">
      <input type="password" class="form-control" placeholder="Password" name="password" id="exampleInputPassword1">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
      </div>
  </div>
</div>
<div class="row">
</div>
<div class="social-auth-links text-center mb-3">
  <a href="#" class="btn btn-block btn-primary">
    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
</a>
<a href="index.php?mod=home&act=index" class="btn btn-block btn-danger">
    <i class="fab fa-google-plus mr-2"></i> Back
</a>
</div>
<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div>
</div>
</form> --}}
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            
        </div>
        <div>
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>

    </div>
</form>

{{-- <p class="mb-1">
    <a href="forgot-password.html">I forgot my password</a>
</p> --}}
<p class="mb-0">
    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
</p>
</div>
</div>
</div>

<!-- jQuery -->
<script src="{{URL::asset('asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('asset/dist/js/adminlte.min.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- jquery-validation -->
<script src="{{URL::asset('asset/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('asset/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('asset/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('asset/dist/js/demo.js')}}"></script>

</body>
</html>
