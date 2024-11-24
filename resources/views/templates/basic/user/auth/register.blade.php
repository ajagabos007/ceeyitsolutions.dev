@extends($activeTemplate.'layouts.auth')
@section('style')

@endsection
@section('content')

@php
$content = getContent('login.content',true)->data_values;
@endphp

<!-- <section class="account-section style--two">
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
                                    <input type="hidden" name="mobile_code">
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
      </section>  -->

<!-- //new implementation// -->
<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-6 p-5">
            <h1 class="mb-5">Create an Account.</h1>
            <form class="account-form mt-5" action="{{ route('user.register') }}" method="POST" onsubmit="return submitUserForm();">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required>
                    </div>
                    <div class="col">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" id="country" name="country" required>
                            <option>Please select a country</option>
                            @foreach($countries as $key => $country)
                            <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="hidden" name="mobile_code">
                        <input type="hidden" name="country_code">
                        <div class="input-group">
                            <span class="input-group-text mobile-code">+234</span>
                            <input type="text" class="form-control checkUser" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Phone Number" required>
                        </div>
                    </div>
                </div>
                <!-- Username and Email Row -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" class="form-control checkUser" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail Address" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>

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
                    <div class="col">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        Remember me
                    </label>
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
                <div class="d-grid mb-3">
                    <button type="submit" id="recaptcha" class="btn btn-primary btn-register">Register</button>
                </div>
                <div class="text-center">
                    <span>Have an Account? </span>
                    <a href="{{route('user.login')}}" class="login-link">Login</a>
                </div>
                <a href="foundation.html" class="finance-aid-link">Financial Aid Available</a>

            </form>
        </div>
        <div class="col-md-6">
            <img src="assets/images/signup_image.jpg" class="img-fluid" alt="Create Account">
        </div>
    </div>
</div>


<div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-center">@lang('You already have an account please Sign in ')</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                <a href="{{ route('user.login') }}" class="btn btn--base">@lang('Login')</a>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
<style>
    .country-code .input-group-prepend .input-group-text {
        background: #fff !important;
    }

    .country-code select {
        border: none;
    }

    .country-code select:focus {
        border: none;
        outline: none;
    }

    .hover-input-popup {
        position: relative;
    }

    .hover-input-popup:hover .input-popup {
        opacity: 1;
        visibility: visible;
    }

    .input-popup {
        position: absolute;
        bottom: 130%;
        left: 50%;
        width: 280px;
        background-color: #1a1a1a;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    .input-popup::after {
        position: absolute;
        content: '';
        bottom: -19px;
        left: 50%;
        margin-left: -5px;
        border-width: 10px 10px 10px 10px;
        border-style: solid;
        border-color: transparent transparent #1a1a1a transparent;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .input-popup p {
        padding-left: 20px;
        position: relative;
    }

    .input-popup p::before {
        position: absolute;
        content: '';
        font-family: 'Line Awesome Free';
        font-weight: 900;
        left: 0;
        top: 4px;
        line-height: 1;
        font-size: 18px;
    }

    .input-popup p.error {
        text-decoration: line-through;
    }

    .input-popup p.error::before {
        content: "\f057";
        color: #ea5455;
    }

    .input-popup p.success::before {
        content: "\f058";
        color: #28c76f;
    }
</style>

@endpush
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
        @if($mobile_code)
        $(`option[data-code={{ $mobile_code }}]`).attr('selected', '');
        @endif

        $('select[name=country]').on('change', function() {
            console.log('k');
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
        });
        $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
        $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
        $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));

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