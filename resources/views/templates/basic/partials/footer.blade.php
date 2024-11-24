@php
$footer = getContent('footer.content',true)->data_values;
$social = getContent('social_icon.element',false,'',1);
$policies = getContent('policies.element',false,'',1);
@endphp
{{-- style="background-image: url('{{getImage('assets/images/frontend/footer/'.@$footer->background_image,'1920x1280')}}');" --}}
<!-- <footer class="footer bg_img">
  <div class="footer__top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <a href="{{url('/')}}" class="footer-logo"><img src="{{ getImage(imagePath()['logoIcon']['path'] .'/logo.png') }}" alt="image"></a>
          {{-- <ul class="footer-menu d-flex flex-wrap justify-content-center mt-4">
              @foreach($pages as $k => $data)
               <li><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li>
          @endforeach
          <li><a href="{{route('courses')}}">@lang('Courses')</a></li>
          <li><a href="{{route("blog")}}">@lang('Blog')</a></li>
          <li><a href="{{route('faq')}}">@lang('Faq')</a></li>
          @auth
          <li><a href="{{route('ticket')}}">@lang('Support')</a></li>
          @endauth
          @guest
          <li><a href="{{route('contact')}}">@lang('Contact')</a></li>
          @endguest
          </ul> --}}
          <ul class="social-links d-flex flex-wrap align-items-center mt-4 justify-content-center">
            @foreach ($social as $item)
            <li><a target="_blank" href="{{@$item->data_values->url}}" data-toggle="tooltip" title="{{__($item->data_values->title)}}">
                @php
                echo @$item->data_values->social_icon;
                @endphp
              </a></li>

            @endforeach

          </ul>

          <div class="col-lg-6 mx-auto mt-3">
            {{-- <p class="text-white">{{__(@$footer->short_details)}}</p> --}}
            <ul class="footer-menu d-flex flex-wrap justify-content-center">
              @foreach ($policies as $links)
              <li><a href="{{route('links',[slug(@$links->data_values->title),$links->id])}}">{{__(@$links->data_values->title)}}</a></li>
              @endforeach

            </ul>
          </div>

          <div style="margin-bottom:-20px;margin-top:10px" class="text-md-start text-center mt-3">
            <p class="text-white text-center">{{date('Y')}} © {{$general->sitename}} . @lang('All Right Reserved')</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="footer__bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-md-start text-center">
          <p class="text-white">{{date('Y')}} © {{$general->sitename}} . @lang('All Right Reserved')</p>
  </div>
  <div class="col-md-6">

  </div>
  </div>
  </div>
  </div> --}}
</footer> -->

<!-- Footer -->
<footer>
  <div class="container-fluid bg-dark text-white py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-auto mb-4">
          <img src="assets/images/ceeyit_footer_logo.png" alt="">
        </div>
      </div>
      <div class="row justify-content-center mt-4">
        <div class="col-auto">
          <a href="https://www.linkedin.com" target="_blank" class="text-white me-3"><img src="/assets/images/message_icon.png" alt=""></a>
          <a href="https://facebook.com" target="_blank" class="text-white me-3"><img src="/assets/images/facebook_icon.png" alt=""></a>
          <a href="https://x.com" target="_blank" class="text-white me-3"><img src="/assets/images/x_icon.png" alt=""></a>
          <a href="https://www.instagram.com" target="_blank" class="text-white"><img src="/assets/images/instagram_icon.png" alt=""></a>
        </div>

      </div>
      <div class="row justify-content-center mt-4">
        <div class="col-auto">

          <p class="mb-4">
            @foreach ($policies as $links)
            <a class="foot-text" style="text-decoration:none; color:white" href="{{route('links',[slug(@$links->data_values->title),$links->id])}}">{{__(@$links->data_values->title)}}</a>
            @endforeach
          </p>
        </div>




        <div class="row justify-content-center mt-0">
          <div class="col-auto">
            <p class="mb-0">{{date('Y')}} © {{$general->sitename}} <span class="foot-text"> @lang('All Right Reserved')</span></p>
          </div>
        </div>
      </div>
    </div>
</footer>