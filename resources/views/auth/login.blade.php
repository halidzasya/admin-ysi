<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>YSI - LOGIN</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/puse-icons-feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{asset('../css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('favicon.ico')  }}" />
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link href="/css/style.css" type="text/css" rel="stylesheet">

</head>

<body style=" background: #008888;">
<form method="POST" action="{{ route('login') }}">
{{ csrf_field() }}
  <div class="container fluid align-item-center " >
    <div class="card align-item-center center mx-auto" style="margin-top: 100px; width:400px;  border-radius: 10px;"  >

    <div class="card-header" >

    <h3 style="text-align: center; ">LOG IN YSI</h3>
    </div>

        <div class="col-md-8 mx-auto" style="margin-top: 20px;" >
            <div class="auto-form-wrapper">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" s >
                      <!-- <label class="label">Username</label> -->
                      <div class="input-group" >
                      <div class="input-group-append">
                          <span class="input-group-text" style="background-color:#008888; ">
                            <i class="fas fa-user" style="color:white;"></i>
                          </span>
                        </div>
                        <input id="email" placeholder="Email/Username" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                      </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <!-- <label class="label">Password</label> -->
                      <div class="input-group">
                      <div class="input-group-append" >
                          <span class="input-group-text iconify" style="background-color:#008888;">
                          <i class="fas fa-key" style="color:white;"></i>
                            <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                          </span>
                        </div>
                        <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn  submit-btn btn-block" style="background:#008888; color:white;" type="submit">Login</button>
                    </div>
            </div>
            <p class=" footer-text text-center" style="margin-top: 20px;color: black;">Copyright © {{date('Y')}} Sistem Manajemen YSI</p>
          </div>
        </div>
      </div>

  </form>

  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
</body>


</html>
