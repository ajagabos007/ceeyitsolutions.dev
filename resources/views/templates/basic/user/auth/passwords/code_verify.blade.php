@extends($activeTemplate.'layouts.auth')
@php
    $content = getContent('login.content',true)->data_values;
@endphp

@section('content')

    <section class="account-section">
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
            <form class="account-form mt-5" method="POST" action="{{ route('user.password.verify.code') }}">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
            
                    <div class="form-group">
                        <label>@lang('Verification Code')</label>
                        <input type="text" name="code" id="code" class="form--control">
                    </div>
                    <button type="submit" class="btn btn--base w-100">@lang('Verify Code')</button>
                    
                    <div class="form-group mt-2">
                        <small>@lang('Please check including your Junk/Spam Folder. if not found, you can')</small> <a href="{{ route('user.password.request') }}"><small>@lang('Try to send again')</small></a>
                    </div>
                    
              </div>
            </form>
        </div>
        <div class="right bg_img" style="background-image: url('{{getImage('assets/images/frontend/login/'.@$content->background_image,'1920x1280')}}');">
          <div class="content text-center">
            <h2 class="title text-white">@lang('Verify Code')</h2>
           
          </div>
        </div>
    </section> 
@endsection
@push('script')
<script>
    (function($){
        "use strict";
        $('#code').on('input change', function () {
          var xx = document.getElementById('code').value;
          $(this).val(function (index, value) {
             value = value.substr(0,7);
              return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
          });
      });
    })(jQuery)
</script>
@endpush