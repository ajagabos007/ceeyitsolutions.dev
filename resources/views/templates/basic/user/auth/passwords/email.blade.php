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
        <form class="account-form mt-5" method="POST" action="{{ route('user.password.email') }}">
            @csrf
          
          <div class="form-group">
            <label class="">@lang('Select One')</label>
            <select class="form--control" name="type">
                <option value="email">@lang('E-Mail Address')</option>
                <option value="username">@lang('Username')</option>
            </select>
          </div>
          <div class="form-group">
            <label class="my_value"></label>
            <input type="text" class="form--control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required autofocus="off">

            @error('value')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                          
          </div>

            <button type="submit" class="btn btn--base w-100">@lang('Send Reset Code')</button>
          </div>
        </form>
    </div>
    <div class="right bg_img" style="background-image: url('{{getImage('assets/images/frontend/login/'.@$content->background_image,'1920x1280')}}');">
      <div class="content text-center">
        <h2 class="title text-white">@lang('Reset Password')</h2>
       
      </div>
    </div>
</section> 
@endsection
@push('script')
<script>

    (function($){
        "use strict";
        
        myVal();
        $('select[name=type]').on('change',function(){
            myVal();
        });
        function myVal(){
            $('.my_value').text($('select[name=type] :selected').text());
        }
    })(jQuery)
</script>
@endpush