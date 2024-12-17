@extends($activeTemplate.'layouts.auth')
@section('style')
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

    .register-form label {
        font-family: "Nunito",sans-serif;
        font-weight: 700;
        /* font-size: 10px;
        line-height: 13.64px; */
        font-size: 18px;
        line-height: 24.55px;
        color: #000000;
        margin-bottom: 8px;
    }

    .register-form input::placeholder {
        font-family: "Nunito",sans-serif;
        font-weight: 500;
        /* font-size: 6.87px;
        line-height: 9.37px; */
        font-size: 14px;
        line-height: 19.1px;
        color: #000000;
        opacity: 30%;
    }

    .register-form .text-input {
      padding-top: 15.25px ;
      padding-bottom: 15.25px ;
      padding-left: 23px ;
    }


    .register-form input , .register-form select {
        border: 2 solid #0000001A;
        border-radius: 10px;
    }

    .register-form .form-check .form-check-input {
    background-color: #15BAB1;
    border-radius: 2px;
    width: 23px !important;
    height: 23px !important;
    border-color: #15BAB1;
    margin-right: 8px;
    }
    .register-form .form-check .form-check-label {
        padding-top: 3px;
    }
    .register-form .form-check .form-check-input:checked {
        background-color: #15BAB1;
        width: 23px;
        height: 23px;
    }
    .register-form .form-check .form-check-input:checked:focus {
        border: none;
    }
    
    .register-form .btn-register {
        background: linear-gradient(180deg, #03BAAF -47.54%, #06807A 154.92%);
        color: #ffffff;
        font-family: "Nunito",sans-serif;
        font-size: 18px;
        line-height: 24.55px;
        font-weight: 700;
        padding-top:15.25px;
        padding-bottom:15.25px;
        border-radius: 50px;
        border: none;
    }

    .register-form .bottom-text span {
        font-family: "Nunito",sans-serif;
        font-weight: 600;
        line-height: 12.92px;
        line-height: 17.63px;
        text-transform:capitalize;
        color:#0000004D;
    
    }
    .register-form .bottom-text a {
        font-family: "Nunito",sans-serif;
        font-weight: 600;
        line-height: 12.92px;
        line-height: 17.63px;
        color: #15BAB1;
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
    .register-img {
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
      /* margin-top: 65.26px;
      margin-bottom: 89px; */
    }

    .logo{
      /* padding-top: 4.2rem; */
    }
   
    }
    @media (min-width:992px) {
     
    
	}
    @media (min-width:1200px) {
    .register-img {
      width: 690px !important;
      min-height: 100vh;
    }
    }
    @media (min-width:1400px) {
      
    }
    /* MEDIA QUERY */

</style>
@endsection
@push('style')
<style>
   
</style>

@endpush
@section('content')

@php
$content = getContent('login.content',true)->data_values;
@endphp

{{-- <section class="account-section style--two">
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
            <form class="account-form mt-5" action="{{ route('user.register') }}" method="POST" onsubmit="return submitUserForm();">
                <div class="row">
                    @csrf
                    @if(session()->get('reference') != null)
                        <div class="form-group col-12">
                            <label for="referenceBy" class="">@lang('Reference By')</label>
                            <input type="text" name="referBy" id="referenceBy" class="form--control" value="{{session()->get('reference')}}" readonly>
                        
                        </div>
                    @endif

                    <div class="form-group col-sm-6">
                        <label for="firstname" class="">@lang('First Name')</label>
                        <input id="firstname" type="text" class="form--control" placeholder="@lang('First Name')" name="firstname" value="{{ old('firstname') }}" required>
                    
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="lastname" class="">@lang('Last Name')</label>
                        <input id="lastname" type="text" class="form--control" placeholder="@lang('Last Name')" name="lastname" value="{{ old('lastname') }}" required>
                        
                    </div>
                   
                    <div class="form-group col-sm-6">
                        <label class="" for="country">{{ __('Country') }}</label>
                        <select name="country" id="country" class="form--control">
                            @foreach($countries as $key => $country)
                                <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="mobile" class="">@lang('Mobile')</label>
                            <div class="input-group ">
                                    <span class="input-group-text mobile-code">  
                                    </span>
                                    <input type="hidden" name="mobile_code" id="mobile_code">
                                    <input type="hidden" name="country_code">
                                <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" class="form--control checkUser" placeholder="@lang('Your Phone Number')">
                            </div>
                        <small class="text-danger mobileExist"></small>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="username" class="">{{ __('Username') }}</label>
                    <input id="username" type="text" class="form--control checkUser" placeholder="@lang('User Name')" name="username" value="{{ old('username') }}" required>
                        <small class="text-danger usernameExist"></small>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="email" class="">@lang('E-Mail Address')</label>
                        <input id="email" type="email" class="form--control checkUser" name="email" placeholder="@lang('Email Address')" value="{{ old('email') }}" required>
                    
                    </div>

                    <div class="form-group  hover-input-popup col-sm-6">
                        <label for="password" class="">@lang('Password')</label>
                        <input id="password" type="password" class="form--control" placeholder="@lang('Password')" name="password" required>
                        @if($general->secure_password)
                            <div class="input-popup">
                                <p class="error lower">@lang('1 small letter minimum')</p>
                                <p class="error capital">@lang('1 capital letter minimum')</p>
                                <p class="error number">@lang('1 number minimum')</p>
                                <p class="error special">@lang('1 special character minimum')</p>
                                <p class="error minimum">@lang('6 character password')</p>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="password-confirm" class="">@lang('Confirm Password')</label>
                        <input id="password-confirm" type="password" class="form--control" placeholder="@lang('Confirm Password')" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group col-sm-6">
                        @php echo loadReCaptcha() @endphp
                    </div>
                    @include($activeTemplate.'partials.custom_captcha')

                    @if($general->agree)
                    <div class="form-group col-sm-6 row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8">
                            <input type="checkbox" id="agree" name="agree">
                            <label for="agree">@lang('I agree with *****')</label>
                        </div>
                    </div>
                    @endif
                    
                    <div class="form-group  mb-0">
                        <button type="submit" id="recaptcha" class="btn btn--base w-100">
                            @lang('Register')
                        </button>
                    </div>
                
                    <div class="col-sm-12 mt-2 text-end">
                        <p>@lang('Have an account?') <a href="{{route('user.login')}}" class="text--base">@lang('Login')</a></p>
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
      </section>  
--}}


<!-- //new implementation// -->

<div class="container-fluid top-padding px-md-4 pb-5">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div>
            <a href="{{URL('/')}}">
                <img class="logo-img" src="{{asset('assets/images/ceeyit_logo.svg')}}" alt="">
            </a>
            </div>
            <h1 class="title-header">Create an Account.</h1>
            <form class="row g-3 register-form" action="{{ route('user.register') }}" method="POST" onsubmit="return submitUserForm();">
                @csrf
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control text-input" id="firstName" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control text-input" id="lastName" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select text-input" id="country" name="country" required>
                        <option>Please select a country</option>
                            @foreach($countries as $key => $country)
                        <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="mobile">Phone Number</label>
                    <input type="hidden"  id="mobile_code" name="mobile_code">
                    <input type="hidden" name="country_code">
                    <div class="input-group">
                    <div class="input-group-text mobile-code">+234</div>
                    <input type="text" class="form-control text-input" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" class="form-control text-input" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail Address</label>
                    <input type="text" class="form-control text-input" id="email" name="email" placeholder="E-mail Address" value="{{ old('email') }}" required>
                </div>
                
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control text-input" id="password" placeholder="Password" name="password" required>
                    @if($general->secure_password)
                        <div class="input-popup">
                            <p class="error lower">@lang('1 small letter minimum')</p>
                            <p class="error capital">@lang('1 capital letter minimum')</p>
                            <p class="error number">@lang('1 number minimum')</p>
                            <p class="error special">@lang('1 special character minimum')</p>
                            <p class="error minimum">@lang('6 character password')</p>
                        </div>
                        @endif
                </div>
                <div class="col-md-6">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control text-input" id="password-confirm" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        Remember me
                    </label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    @php echo loadReCaptcha() @endphp
                </div>
                @include($activeTemplate.'partials.custom_captcha')

                @if($general->agree)
                <div class="form-group col-sm-6 row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <input type="checkbox" id="agree" name="agree">
                        <label for="agree">@lang('I agree with *****')</label>
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <button type="submit" class="btn btn-register w-100">Register</button>
                </div>

                <div class="text-center bottom-text">
                    <span>Have an Account? </span>
                    <a href="{{route('user.login')}}" class="login-link">Login</a>
                </div>
               <div class="text-center">
               <a href="foundation.html" class="finance-aid-link">Financial Aid Available</a>
               </div>
            </form>
        </div>
       <div class="d-none d-lg-block col-md-6">
        <img class="img-fluid register-img" src="{{asset('assets/images/register_img.png')}}" alt="Register Image">
       </div>
    </div>
</div>


@endsection
@push('script-lib')
<script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endpush
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

    (function($) {
        @if(!empty($mobile_code))
            $(`option[data-code={{ $mobile_code }}]`).attr('selected', '').change();
        @endif

        $('select[name=country]').on('change', function() {
            let mobile_code = $('select[name=country] :selected').data('mobile_code');
            let country_code = $('select[name=country] :selected').data('code');
            
            $('input[name=country_code]').val(typeof(country_code) == 'undefined' ? '' : country_code);
            $('input[name=mobile_code]').val(typeof(mobile_code) == 'undefined' ? '' : mobile_code);
            $('.mobile-code').text('+' + (typeof(mobile_code) == 'undefined' ? '' : mobile_code));
        });
       

        @if($general->secure_password)
        $('input[name=password]').on('input', function() {
            secure_password($(this));
        });
        @endif

        $('.checkUser').on('focusout', function(e) {
            var url = "{{ route('user.checkUser') }}";
            var value = $(this).val();
            var token = '{{ csrf_token() }}';
            if ($(this).attr('name') == 'mobile') {
                var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                var data = {
                    mobile: mobile,
                    _token: token
                }
            }
            if ($(this).attr('name') == 'email') {
                var data = {
                    email: value,
                    _token: token
                }
            }
            if ($(this).attr('name') == 'username') {
                var data = {
                    username: value,
                    _token: token
                }
            }
            $.post(url, data, function(response) {
                if (response['data'] && response['type'] == 'email') {
                    $('#existModalCenter').modal('show');
                } else if (response['data'] != null) {
                    $(`.${response['type']}Exist`).text(`${response['type']} already exist`);
                } else {
                    $(`.${response['type']}Exist`).text('');
                }
            });
        });

    })(jQuery);
</script>
@endpush