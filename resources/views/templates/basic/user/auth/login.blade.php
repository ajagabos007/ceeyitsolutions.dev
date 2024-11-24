@extends($activeTemplate.'layouts.auth')

@php
$content = getContent('login.content',true)->data_values;
@endphp
@section('style')
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
<div class="container-fluid w-100">
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