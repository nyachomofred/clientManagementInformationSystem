@extends('layouts.user')

@section('content')

            <div class="col-xs-12 text-center login-box-msg">
              <img src="{{asset('resources/assets/logo/padlock.jpg')}}" height="100" alt="Logo" class="rounded-circle">
            </div>
            <h4 class="login-box-msg">Client Management Information System</h4><br/>
        <div class="row">
        <div class="col-md-6 login-left">


            <form method="POST" action="{{ route('login') }}" id="login-form">
                 @csrf
                 @if(count($errors)>0)
                 @foreach($errors->all() as $error)
                 <div class="alert alert-danger">{{$error}}</div>
                  @endforeach
                  @endif
                  @if(session('response'))
                  <div class="alert alert-success">{{session('response')}}</div>
                     @endif

                     @if(session('reject'))
                     <div class="alert alert-warning">{{session('reject')}}</div>
                        @endif


                <div class="form-group has-feedback ">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email address" />

                </div>
                <div class="form-group has-feedback ">
                    <input tid="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password" />
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn bg-purple btn-block">
                            Login                        </button>
                    </div>
                </div>
                <br/>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                     {{ __('Remember Me') }}
                    </label>
                </div>

            </form>
        </div>
        <div class="col-md-6 login-right">
            <a href="#"
               class="btn bg-olive btn-social btn-block">
                Register a new account            </a>
            <a href="#"
               class="btn bg-yellow btn-social btn-block">
                Forgot your password            </a>
            <div class="or-separator">Or</div>
            <div class="socials-buttons">
                                                                            </div>
        </div>
    </div>

    
    

    </div>
</div>
<!-- /.content -->

@endsection