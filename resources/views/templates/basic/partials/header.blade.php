<style>
  .btn-signup {
    width: 129px;
    background: linear-gradient(6.43deg, #00E8DB -18.08%, #095450 121.1%);
    box-shadow: 0px 4px 55px 0px #0000001F;
    border-radius: 20px;

  }

  .nav-link {
   font-family: 'AtypDisplay',sans-serif;
   font-weight: 400;
   font-size: 15px;
   line-height: 22px;
   opacity: 70%;
  }

  .nav-link .active{
    font-weight: 600;
    color: #2B2A31;
  }

  @media (min-width: 768px) {
    .nav-item-list {
    padding-right:54px;
  }
  }

</style>
<!-- <header class="header">
  <div class="header__bottom">
    <div class="container">
      <nav class="navbar navbar-expand-xl p-0 align-items-center">
        <a class="site-logo site-title" href="{{url('/')}}"><img src="{{ getImage(imagePath()['logoIcon']['path'] .'/logo.png') }}" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="menu-toggle"></span>
        </button>
        <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
          <ul class="navbar-nav main-menu m-auto">
            <li><a href="{{url('/')}}">@lang('Home')</a></li>

            <li><a href=" {{route("courses")}}">@lang('Courses')</a></li>



            {{-- <li class="menu_has_children"><a href="javascript:void(0)">@lang('Category')</a>
              <ul class="sub-menu">
                @foreach ($categories as $category)
                @if ( $category->subcategories->count() > 0)
                <li class="menu_has_children"><a href="javascript:void(0)">{{__($category->name)}}</a>
            <ul class="sub-menu">
              @foreach ($category->subcategories as $subcat)
              <li><a href="{{route('courses.category',$subcat->slug)}}">{{__($subcat->name)}}</a></li>
              @endforeach
            </ul>
            </li>
            @endif
            @endforeach
          </ul>
          </li> --}}


          <li><a href="{{route("blog")}}">@lang('Blog')</a></li>

          @auth
          <li><a href="{{route('ticket')}}">@lang('Support')</a></li>
          @else
          {{-- {{route('contact')}} --}}
          {{-- <li><a href="#">@lang('Contact')</a></li> --}}
          @endauth
          @foreach($pages as $k => $data)
          <li><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li>
          @endforeach


          </ul>
          <div class="nav-right align-items-center">
            {{-- <select class="language-select me-3 langSel mt-sm-0 mt-2">
                @foreach($language as $item)
                    <option value="{{$item->code}}" @if(session('lang') == $item->code) selected @endif>{{ __($item->name)}}</option>
            @endforeach
            </select> --}}
            @guest

            <a href="{{route('user.login')}}" class="btn btn-sm btn--base d-flex align-items-center me-2 mt-sm-0 mt-2">
              {{-- <i class="las la-user fs--18px me-2"></i> --}}
              @lang('Login')</a>

            <a href="{{route('user.register')}}" class="btn btn-sm btn-outline--base d-flex align-items-center mt-sm-0 mt-2">
              {{-- <i class="las la-user fs--18px me-2"></i> --}}
              @lang('Sign Up')</a>
            @endguest

            @auth
            <a href="{{route('user.home')}}" class="btn btn-sm btn-outline--base d-flex align-items-center me-2 mt-sm-0 mt-2"><i class="las la-home fs--18px me-2"></i>@lang('Dashboard')</a>

            <a href="{{route('user.logout')}}" class="btn btn-sm btn--base d-flex align-items-center mt-sm-0 mt-2"><i class="las la-sign-out-alt fs--18px me-2"></i>@lang('Logout')</a>
            @endauth
          </div>
        </div>
      </nav>
    </div>
  </div>
</header> -->

<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
  <img src="{{asset('assets/images/ceeyit_logo.svg')}}" alt="Logo Image" style="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon" style="" ></span> 
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item nav-item-list">
          <a class="nav-link active" href="{{url('/')}}">@lang('Home')</a>
        </li>
        <li class="nav-item nav-item-list">
          <a class="nav-link" href="{{ route('courses') }}">@lang('Courses')</a>
        </li>
        @auth
        <li class="nav-item nav-item-list">
          <a class="nav-link" href="{{route('ticket')}}">@lang('Support')</a>
        </li>
        @endauth

        <li class="nav-item nav-item-list">
          <a class="nav-link" href="{{route('foundation')}}">Foundation</a>
        </li>

        @foreach($pages as $k => $data)
        <li class="nav-item  mx-3">
          <a class="nav-link" href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a>
        </li>
        @endforeach

        @guest
        <li class="nav-item ms-lg-3">
          <a href="{{route('user.register')}}"><button class="btn btn-signup">Sign up</button></a>
        </li>
        @endguest

        @auth
        <!-- <a href="{{route('user.home')}}" class="btn btn-sm btn-outline--base d-flex align-items-center me-2 mt-sm-0 mt-2"><i class="las la-home fs--18px me-2"></i>@lang('Dashboard')</a>

        <a href="{{route('user.logout')}}" class="btn btn-sm btn--base d-flex align-items-center mt-sm-0 mt-2"><i class="las la-sign-out-alt fs--18px me-2"></i>@lang('Logout')</a> -->
        <li class="nav-item ms-lg-3">
          <a href="{{route('user.home')}}" class="profile-button">
            <img src="{{ getImage('assets/images/user/profile/'.auth()->user()->image,'350x350') }}" width="20px" alt="Profile" class="profile-image">
            <span class="profile-span">{{auth()->user()->firstname .' '. auth()->user()->lastname}}</span>
          </a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>