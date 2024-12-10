@extends($activeTemplate.'layouts.auth')

@php
$content = getContent('login.content',true)->data_values;
@endphp
@section('style')
{{-- 
<style>
  h1 {
    font-family: 'Nunito', sans-serif;
    width: 294px;
    height: 27px;
    color: #000000;
    font-weight: 600;
    font-size: 38.69px;
    line-height: 52.77px;
  }

  .flname {
    font-family: 'Nunito', sans-serif;
    width: 159px;
    height: 13px;
    color: #000000;
    font-weight: 700;
    font-size: 18px;
    line-height: 24.55px;
  }

  .flpword {
    font-family: 'Nunito', sans-serif;
    width: 82px;
    height: 13px;
    color: #000000;
    font-size: 18px;
    font-weight: 700;
    line-height: 24.55px;
  }

  input[type="text"]::placeholder,
  input[type="email"]::placeholder,
  input[type="password"]::placeholder,
  select::placeholder {
    font-family: 'Nunito', sans-serif;
    width: 122px;
    /* height: 10px; */
    font-size: 14px;
    font-weight: 500;
    /* line-height: 19.1px; */
    color: #000000;
    opacity: 30%;
  }

  .sbutton {
    display: block;
    align-items: center;
    width: 575px !important;
    height: 61px;
    border-radius: 59px;
    border: none;
    background: linear-gradient(180deg, #00E8DB 0%, #095450 100%);
  }

  .forgot-password {
    text-align: right;
    justify-content: center;
    display: block;
    text-decoration: none;
  }

  .cal {
    color: #00E8DB;
    text-decoration: none;
  }

  span.register-prompt {
    font-family: 'Nunito', sans-serif !important;
    width: 224px !important;
    height: 9px !important;
    color: #00000080 !important;
    opacity: 60%;
  }

  a.forgot-pwd-link {
    font-family: 'Nunito', sans-serif !important;
    float: right;
    color: #000000 !important;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
    line-height: 24.55px;
  }

  label.form-check-label {
    font-family: 'Nunito', sans-serif !important;
    width: 119px !important;
    height: 13px !important;
    color: #000000 !important;
    font-size: 18px;
    font-weight: 500;
  }

  .form-check-input:checked {
    background-color: #4ECDC4;
    border-color: #4ECDC4;
  }

  .form-check-input:focus {
    border-color: #4ECDC4;
    box-shadow: 0 0 0 0.25rem rgba(78, 205, 196, 0.25);
  }
  
</style>
--}}
<style>
    /* container */
    .top-padding {
        margin-top: 2rem;
    }
    /* container */
    /* First Column */
    .title-header {
      font-family: "Nunito",sans-serif;
      font-weight: 600;
      font-size: 2rem;
      line-height:1.2;
      color:#000000;
      margin-top: 2rem;
      margin-bottom: 2rem;
    }

    .login-form label {
        font-family: "Nunito",sans-serif;
        font-weight: 700;
        font-size: 18px;
        line-height: 24.55px;
        color: #000000;
        margin-bottom: 8px;
    }

    .login-form input::placeholder {
        font-family: "Nunito",sans-serif;
        font-weight: 500;
        font-size: 14px;
        line-height: 19.1px;
        color: #000000;
        opacity: 30%;
    }
     
    .login-form .text-input {
      padding-top: 15.25px ;
      padding-bottom: 15.25px ;
      padding-left: 23px ;
    }

    .login-form input , .login-form select {
        border: 2px solid #0000001A;
        border-radius: 10px;
    }

    .login-form .input-group-text {
        font-family: "Nunito",sans-serif;
        font-weight: 500;
        line-height: 14.21px;
        color: #000000;
        opacity: 30%;
        background-color: #E3E3E3;
    }

    .login-form .form-check .form-check-input {
    background-color: #15BAB1;
    border-radius: 2px;
    width: 23px !important;
    height: 23px !important;
    border-color: #15BAB1;
    margin-right: 8px;
    }
    .login-form .form-check .form-check-label {
        padding-top: 3px;
    }
    .login-form .form-check .form-check-input:checked {
        background-color: #15BAB1;
        width: 23px;
        height: 23px;
    }
    .login-form .form-check .form-check-input:checked:focus {
        border: none;
    }
        
    .login-form .btn-login {
        background: linear-gradient(201.36deg, #00E8DB -15.01%, #095450 127.23%);
        color: #ffffff;
        font-family: "Nunito",sans-serif;
        font-weight: 700;
        font-size: 18px;
        line-height: 24.55px;
        padding-top:15.25px;
        padding-bottom:15.25px;
        border-radius: 59px;
        border: none;

    }

    .login-form .btn-google {
        color:#000000;
        font-family: "Nunito",sans-serif;
        font-weight: 600;
        font-size: 18px;
        line-height: 24.55px;
        padding-top:15.25px;
        padding-bottom:15.25px;
        border-radius: 59px;
        border: 2px solid #0000001A;
        background-color:#ffffff;
        display: flex;
        align-items:center;
        justify-content:center;
    }

    .login-form .bottom-text span {
        font-family: "Nunito",sans-serif;
        font-weight: 600;
        line-height: 12.92px;
        line-height: 17.63px;
        text-transform:capitalize;
        color:#0000004D;
    
    }
    .login-form .bottom-text a {
        font-family: "Nunito",sans-serif;
        font-weight: 600;
        line-height: 12.92px;
        line-height: 17.63px;
        color: #15BAB1;
        text-transform:capitalize;
        text-decoration: none;
    }

    .vstack{
      /* padding-top:3.625rem; */
      padding-top:1.8rem;
    }

    .forgot-password {
      font-family: "Nunito",sans-serif;
        font-weight: 500;
        line-height: 18px;
        line-height: 24.55px;
        color: #000000;
        text-transform:capitalize;
        text-decoration: none;
    }

    .finance-aid-link {
        font-family: "Nunito",sans-serif;
        font-weight: 600;
        line-height: 10px;
        line-height: 13.64px;
        text-transform:capitalize;
        color: #00000080;
    }
    
    /* END OF FIRST COLUMN */

    /* SECOND COLUMN */
    .login-img {
      border-radius: 10px;
    }
    /* END OF SECOND COLUMN */


    /* MEDIA QUERY */
    @media (min-width:576px) {
   
   
    }

    @media (min-width:768px) {
   
    .title-header {
      font-size: 38.69px;
      line-height: 52.77px;
      margin-top: 65.26px;
      margin-bottom: 89px;
    }

    .logo-img{
      /* padding-top: 4.2rem; */
    }
   
    }
    @media (min-width:992px) {
     
    
	}
    @media (min-width:1200px) {
    .login-img {
      width: 690px !important;
      min-height: 100vh;
    }
    }
    @media (min-width:1400px) {
      
    }
    /* MEDIA QUERY */

</style>
@endsection
@section('content')
<!-- <section class="account-section">
        <div class="left">
          <div class="top-el">
            <img src="{{getImage('assets/images/frontend/login/'.@$content->texture_image_up,'1595x645')}}" alt="image">
          </div>
          <div class="bottom-el">
            <img src="{{getImage('assets/images/frontend/login/'.@$content->texture_image_down,'1595x645')}}" alt="image">
          </div>
          <div class="account-form-area">
            <div class="text-center">
              <a href="{{url('/')}}" class="account-logo"><img src="{{ getImage(imagePath()['logoIcon']['path'] .'/logo.png') }}" alt="image"></a>
            </div>
            <form class="account-form mt-5" method="POST" action="{{ route('user.login')}}" onsubmit="return submitUserForm();">
                @csrf
              <div class="form-group">
                <label>@lang('Username Or Email')</label>
                <input type="text" name="username" placeholder="@lang('Username or email address')" class="form--control" required>
              </div>
              <div class="form-group">
                <label>@lang('Password')</label>
                <input type="password" name="password" placeholder="@lang('Password')" class="form--control" required>
              </div>

              <div class="form-group">
                  @php echo loadReCaptcha() @endphp
              </div>

              @include($activeTemplate.'partials.custom_captcha')
 
              <p class=""><a href="{{route('user.password.request')}}" class="text--dark">@lang('Forgot password?')</a></p>
              <div class="form-group mt-4">
                <button type="submit" class="btn btn--base w-100">@lang('Login Now')</button>
              </div>
              <div class="row gy-1">
                
                <div class="col-sm-12">
                  <p>@lang('Haven\'t an account?') <a href="{{route('user.register')}}" class="text--base">@lang('Sign Up')</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="right bg_img" style="background-image: url('{{getImage('assets/images/frontend/login/'.@$content->background_image,'1920x1280')}}');">
          <div class="content text-center">
            <h2 class="title text-white">{{__(@$content->heading)}}</h2>
            <p class="text-white mt-3">{{__(@$content->sub_heading)}}</p>
          </div>
        </div>
</section>  -->


<!--LOGIN NEW TEMPLATE  -->
<div class="container-fluid top-padding px-md-4 pb-5">
  <div class="row">
    <div class="col-md-6">
          <div>
            <a href="{{URL('/')}}">
            <img class="logo-img" src="{{asset('assets/images/ceeyit_logo.svg')}}" alt="">
            </a>
          </div>
        <h1 class="title-header">Login</h1>
      <form class="row g-3 login-form" method="POST" action="{{ route('user.login')}}" onsubmit="return submitUserForm();">
        @csrf
        <div class="col-md-12">
          <label for="username" class="form-label">Username or Email</label>
          <input type="email" class="form-control text-input" id="username" name="username" placeholder="chikeivor" required>
        </div>
        <div class="col-md-12">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control text-input" id="password" name="password" placeholder="at least 8 character" required>
        </div>

        <div class="col-12 hstack">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
            <label class="form-check-label" for="rememberMe">
             Remember me
            </label>
          </div>
          <div class="ms-auto">
            <a class="forgot-password" href="">Forgot Password?</a>
          </div>
        </div>
        <div class="col-12 vstack pb-2">
          <button type="submit" class="btn-login w-100 mb-3">Log in</button>
          <button type="submit" class="btn-google w-100">
            <img class="me-2" src="{{asset('assets/images/google_image.svg')}}" alt="Google Image" />
            Sign in with Google
          </button>
        </div>
           <div class="hstack d-flex justify-content-center">
           <div class="bottom-text">
              <span>Not registered yet?</span>
              <a href="{{route('user.register')}}" class="login-link">Create an Account</a>
            </div>
           </div>
      </form>
    </div>

    <div class="d-none d-md-block col-md-6">
      <img class="img-fluid login-img" src="{{asset('assets/images/login_img.png')}}" alt="">
    </div>
  </div>
</div>
<!--LOGIN NEW TEMPLATE  -->



{{-- <div class="container-fluid w-100">
  <div class="row align-items-center">
    <div class="col-md-6 p-5">

      <h1 class="mb-5">Welcome, Chike!</h1>
      <form class="account-form mt-5" method="POST" action="{{ route('user.login')}}" onsubmit="return submitUserForm();">
        @csrf
        <div class="mb-3">
          <label for="username" class="form-label flname mb-4">Username or Email</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label flpword mb-4">Password</label>
          <input type="password" class="form-control" id="password" placeholder="at least 8 character" name="password" required>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" value="" id="rememberMe">
          <label class="form-check-label" for="rememberMe">
            Remember me
          </label>
          <a href="{{route('user.password.request')}}" class="text-primary forgot-pwd-link mb-1">Forgot Password?</a>
        </div>
        <div class="d-flex justify-content-between mb-3">
          <button type="submit" class="btn sbutton text-white">@lang('Login Now')</button>
        </div>
        <!-- <div class="d-grid">
          <button class="btn btn-light" type="button">
            <img src="Frame 22.png" class="me-5" width="575px" height="61px">
          </button>
        </div> -->

        <div class="form-group">
          @php echo loadReCaptcha() @endphp
        </div>

        @include($activeTemplate.'partials.custom_captcha')


        <div class="mt-3 text-center">
          <span class="register-prompt cal">Not registered yet? </span>
          <a href="{{route('user.register')}}" class="cal">Create an Account</a>
        </div>
      </form>
    </div>
    <div class="col-md-6 mt-2">
      <img src="assets/images/Frame 23.png" class="img-fluid" alt="Chike">
    </div>
  </div>
</div>
--}}
@endsection

@push('script')
<script>
  "use strict";

  function submitUserForm() {
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
      document.getElementById('g-recaptcha-error').innerHTML = '<span class="text-danger">@lang("Captcha field is required.")</span>';
      return false;
    }
    return true;
  }
</script>
@endpush