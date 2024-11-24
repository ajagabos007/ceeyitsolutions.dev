@extends($activeTemplate.'layouts.frontend')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #FAFAFA;
  }

  /* Navbar Styles */
  .navbar {
    padding: 1rem 2rem;
    background-color: white;
  }

  .nav-link {
    color: #333;
    font-size: 14px;
    font-weight: 500;
    padding: 0.5rem 1.5rem;
  }

  .navbar-nav {
    align-items: center;
  }

  .profile-button {
    background-color: #E6F7F5;
    border-radius: 50px;
    padding: 0.5rem 1rem;
    border: none;
    white-space: nowrap;
  }

  .profile-image {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    margin-right: 8px;
  }

  /* Mobile navbar styles */
  @media (max-width: 991px) {
    .navbar-collapse {
      background-color: white;
      padding: 1rem;
      border-radius: 8px;
      margin-top: 1rem;
    }

    .nav-link {
      padding: 0.75rem 1rem;
    }

    .profile-button {
      /* margin-top: 1rem; */
      width: 126px;
      height: 43px;
      border: 1.37 solid #0000000D;
      border-radius: 162px;
      justify-content: center;
      /* display: flex; */
      align-items: center;
    }
  }

  /* Search Section Styles */
  .search-section {
    margin: 2rem auto;
    max-width: 1200px;
  }

  .search-container {
    position: relative;
    margin-bottom: 2rem;
  }

  .search-input {
    border: 1px solid #E0E0E0;
    border-radius: 50px;
    padding: 1rem 1rem 1rem 3rem;
    width: 100%;
    font-size: 14px;
  }

  .search-icon {
    position: absolute;
    left: 1rem;
    top: 45%;
    transform: translateY(-50%);
    color: #666;
  }

  .hero-search-form__btn {
    position: absolute;
    left: 68rem;
    top: 47%;
    transform: translateY(-50%);
    border-radius: 50px;
  }

  .filter-button {
    background-color: #E6F7F5;
    border: none;
    border-radius: 50px;
    padding: 0.75rem 1.5rem;
    color: #059B93;
    font-size: 17.94px;
    font-weight: 500;
  }

  /* Course Card Styles */
  .course-card {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 2rem;

  }

  .course-icon {
    height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .course-icon i {
    font-size: 48px;
    color: white;
  }

  .card-body {
    background-color: white;
    padding: 1.5rem;
    height: 230px;
  }

  .course-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 1rem;
  }

  .course-stats {
    font-size: 12px;
    color: #666;
    margin-bottom: 1rem;
  }

  .course-rating i {
    color: #FFB800;
    font-size: 12px;
    margin-bottom: 1rem;
  }

  .failed {
    color: #9b98ad !important;
    font-size: 12px;
    margin-bottom: 1rem;
  }

  .view-course-btn {
    background-color: #00A896;
    border: none;
    border-radius: 8px;
    padding: 0.5rem 1rem;
    font-size: 12px;
    color: white;
  }

  .nav-link.active {
    font-weight: 600;
    /* Makes current page link bold */
  }

  .view-course-btn {
    float: right;
    /* Aligns button to the right */
    width: 103px;
    height: 29.14;
    font-size: 10.16px;
    border-radius: 13.55px;
    background: linear-gradient(180deg, #00E8DB 0%, #095450 100%);
  }

  .rate {
    color: #302F35;
    font-size: 9px;
    font-weight: bolder
  }

  ::placeholder {
    color: #2C2A31;
    font-size: 18px;
    font-weight: 400;
    opacity: 30%;
    width: 235px;
    /* height: 13px; */
  }

  .profile-span {
    width: 64px;
    height: 18px;
    font-size: 13.74px;
    size: 6.39px;
    color: #2C2A31;
    text-wrap: wrap;
  }

  .profile-i {
    font-size: 6.39px;
    font-weight: 400;
    line-height: 7.99px;
  }

  .profile-text {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .student-label {
    font-size: 12px;
    color: #666;
  }

  /* Course Card Colors */
  .bg-python {
    background-color: #17A2B8;
  }

  .bg-data-analysis {
    background-color: #8C6FF0;
  }

  .bg-data-engineering {
    background-color: #FF6B9C;
  }

  .bg-site-reliability {
    background-color: #FF9F43;
  }

  .bg-cloud {
    background-color: #FF9F43;
  }

  .bg-project {
    background-color: #FF6B9C;
  }

  .bg-devops {
    background-color: #8C6FF0;
  }
</style>
@endsection
@section('content')
<!-- <section>
  <div class="container-fluid" style="padding-top:80px;padding-bottom: 50px;background: #00000080; background-image: url('{{getImage('assets/images/frontend/banner/bg.svg','1920x640')}}')">
    <div class="container" style="padding-left:7%; padding-right:7%">
      <div class="row">
        <div class="col-md-12 mb-4">
          <form class="hero-search-form category-search-form mb-0" action="" method="GET">
            <i class="las la-search"></i>
            <input type="text" name="search" autocomplete="on" class="form--control" placeholder="@lang('title, tags eg. web design, art, skill development')...">
            <button type="submit" class="hero-search-form__btn">@lang('Search')</button>
          </form>
        </div>
      </div>
      <div class="row" style="margin-top:-30px; margin-bottom: 30px">
        <div class="col-md-3 col-sm-6">
          <div class="action-widget__body">
            <select class="select select-md" onChange="window.location.href=this.value">
              <option value="{{queryBuild('type','')}}" {{request('type') == '' ? 'selected':''}}>@lang('Select type')</option>
              <option value="{{queryBuild('type',1)}}" {{request('type') == 1 ? 'selected':''}}>@lang('Top Courses')</option>
              <option value="{{queryBuild('type',2)}}" {{request('type') == 2 ? 'selected':''}}>@lang('Latest Courses')</option>
            </select>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="action-widget__body">
            <select class="select select-md" onChange="window.location.href=this.value">
              <option value="{{queryBuild('value','')}}" {{request('value') == '' ? 'selected':''}}>@lang('All')</option>
              <option value="{{queryBuild('value','free')}}" {{request('value') == 'free' ? 'selected':''}}>@lang('Free')</option>
              <option value="{{queryBuild('value','premium')}}" {{request('value') == 'premium' ? 'selected':''}}>@lang('Premium')</option>
            </select>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="action-widget__body">
            <select class="select select-md cat" onChange="window.location.href=this.value">
              <option value="{{queryBuild('category','')}}" {{request('category') == '' ? 'selected':''}}>@lang('All')</option>
              @foreach ($categories as $category)
              <option value="{{queryBuild('category',$category->slug)}}" {{request('category') == $category->slug ? 'selected':''}}>{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="action-widget__body">
            <select class="select select-md" onChange="window.location.href=this.value">
              <option value="{{queryBuild('level','')}}" {{request('level') == '' ? 'selected':''}}>@lang('All')</option>
              @foreach ($levels as $level)
              <option value="{{queryBuild('level',$level->slug)}}" {{request('level') == $level->slug ? 'selected':''}}>{{$level->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        {{-- <div class="col-lg-3 pe-4">
          <button class="action-sidebar-open mb-4"><i class="las la-sliders-h"></i> @lang('Filter')</button>
          <div class="action-sidebar">
            <button class="action-sidebar-close"><i class="las la-times"></i></button>
            <div class="action-widget pt-0">
              <h4 class="action-widget__title">@lang('Course filter by')</h4>
            
        </div>
            <div class="action-widget">
              <h4 class="action-widget__title">@lang('Filter by price')</h4>
              <div class="action-widget__body">
               
             
              </div>
            </div>
            <div class="action-widget">
                <h6 class="action-widget__title">@lang('Category')</h6>
                <div class="action-widget__body">
                 
               
                </div>
              </div>

            <div class="action-widget">
              <h6 class="action-widget__title">@lang('Level')</h6>
              <div class="action-widget__body">
               
             
              </div>
            </div>
          </div> --}}
        {{-- <div class="show-img mt-3 rounded-3 overflow-hidden d-lg-block d-none">
            @php
              echo advertisements('300x250');
            @endphp
          </div>
          <div class="show-img mt-3 rounded-3 overflow-hidden d-lg-block d-none">
            @php
               echo advertisements('300x250');
            @endphp
          </div>
          <div class="show-img mt-3 rounded-3 overflow-hidden d-lg-block d-none">
            @php
              echo advertisements('300x600');
             @endphp
          </div> --}}
      </div>
    </div>
  </div>

  <div class="container pt-100">
    <div class="row ">

      @forelse ($courses as $course)
      <div class="col-md-3 col-sm-6">
        <div class="course-card mb-5" style="height: 510px">
          <div class="course-card__thumb">
            <img src="{{getImage(imagePath()['course']['path'].'/thumb_'.$course->thumbnail,imagePath()['course']['preview_size'])}}" alt="image">
            <div class="course-type"><i class="las la-file-video"></i></div>
          </div>
          <div class="course-card__content">
            <div class="mb-3">
              <span class="course-tag fs--12px">{{@$course->subcategory->name}}</span>
              <div style="float: right">
                <span style="float: right" class="badge bg--primary font-weight-normal mt-2">{{$course->level->name}}</span>

              </div>
            </div>
            <a style="margin-top:-15px" href="{{route('course.details',[$course->id,$course->slug])}}">
              <h6 class="course-title mt-0"><a href="{{route('course.details',[$course->id,$course->slug])}}">{{$course->title}}</a></h6>
            </a>
            <div style="margin-top:10px" class="mb-3">
              <p class="mt-3" style="font-size: 14px">{{Str::limit(strip_tags(@$course->description,120))}}</p>

              {{-- <p style="font-size:13px">Lorem ipsum dolor sit amet, consectetur adipising elit, sed do eiusmod tempor</p> --}}
              {{-- <p> {!!substr($course->description,0,200)!!}</p> --}}
              {{-- {!!strlen($course->description) > 200 ? substr($course->description,0,200) : $course->description!!} --}}
              {{-- @php
                echo  Illuminate\Support\Str::words($course->description, 20, '');
                    
                      // echo ratings($course->avgRating());
                  @endphp --}}
              {{-- <span class="ms-2">({{$course->avgRating()}})</span> --}}
            </div>
            <div class="course-mentor mt-2">
              <div class="left">
                <div class="teacher">
                  <div class="thumb"><img src="{{getImage(imagePath()['profile']['user']['path'].'/'.$course->author->image,'350x350')}}" alt="image"></div>
                  <p style="font-size: 12px" class="name">{{$course->author->fullname}}</p>
                </div>
              </div>
              <div class="right">
                @if ($course->discount)
                <del style="font-size: 12px" class="text-muted fs--10px">{{$general->cur_sym}}{{getAmount($course->price)}}</del>
                <div style="font-size: 14px" class="course-price">{{$general->cur_sym}}{{getAmount($course->discountPrice())}}</div>
                @else
                <div style="font-size: 14px" class="course-price">@if(getAmount($course->price)) {{$general->cur_sym}}{{getAmount($course->price)}} @else @lang('Free') @endif</div>
                @endif
                {{-- <span class="fs--14px">{{number_format_short($course->courseUsers->count())}} @lang('enrolled')</span> --}}
              </div>
            </div>
          </div>
          {{-- <div class="course-footer">
                      <div class="w-100 text-center">
                      
                        <a href="{{route('course.details',[$course->id,$course->slug])}}" class="btn btn-sm btn--base w-100 mt-4">@lang('View Details')</a>
        </div>
      </div> --}}
    </div>
  </div>


  @empty
  <div class="course-card list-view">
    <div class="course-card__thumb text-md-start text-center not__found">
      <img src="{{getImage('assets/images/not_found.jpg')}}" width="60%" alt="image">
    </div>
    <div class="course-card__content d-flex align-items-center justify-content-center">
      <h5>@lang('No courses found !')</h5>
    </div>
  </div>
  @endforelse
  <div class="text-end mt-4 pagination-md">
    <ul class="pagination d-inline-flex">
      {{paginateLinks($courses,'')}}
      </li>
    </ul>
  </div>
  </div>
  </div>

  </div>


</section> -->

<!-- //// NEW IMPLEMENTATION /// -->
<!-- Search Section -->
<div class="container search-section">
  <div class="search-container">
    <form class="hero-search-form category-search-form mb-0" action="" method="GET">
      <i class="fas fa-search search-icon"></i>
      <input type="text" class="search-input" placeholder="Browse courses, tags, titles">
      <button type="submit" class="hero-search-form__btn btn btn-success">@lang('Search')</button>
    </form>
  </div>
  <div class="mb-4">
    <!-- <button class="filter-button">
      <img src="assets/images/book_image.png" alt="" ms-5>
      Courses
      <img src="assets/images/dropdown_image.png" alt="" mx-5>
    </button> -->
    <select class="select cat filter-button" onChange="window.location.href=this.value" mx-5>
      <option value="{{queryBuild('category','')}}" {{request('category') == '' ? 'selected':''}} ms-5>
        <img src="assets/images/book_image.png" alt="" ms-5>
        Courses
      </option>
      @foreach ($categories as $category)
      <option value="{{queryBuild('category',$category->slug)}}" {{request('category') == $category->slug ? 'selected':''}}>{{$category->name}}</option>
      @endforeach
    </select>
  </div>

  <!-- Course Grid -->
  <div class="row g-4">
    @forelse ($courses as $course)

    <!-- Python Course -->
    <div class="col-md-3">
      <div class="course-card">
        <div class="course-icon bg-python">
          <img src="{{getImage(imagePath()['course']['path'].'/thumb_'.$course->thumbnail,imagePath()['course']['preview_size'])}}" width=100% alt="Python">
        </div>
        <div class="card-body">
          <h5 class="course-title"><a style="text-decoration: none;color:#302F35;font-family: Atyp Text;
font-size: 21.77px;
line-height: 31.33px;
text-align: left;
" href="{{route('course.details',[$course->id,$course->slug])}}">{{$course->title}}</a></h5>
          <div class="course-stats">
            <!-- <img src="assets/images/time.png" alt="time icon">
            <span class="mx-2">•</span>
            <img src="assets/images/modules.png" alt="modules icon"> -->
          </div>
          <div class="course-rating">

            @php
            $rating = intval(abs($course->avgRating())); // Get the rating
            $fullStars = floor($rating); // Number of full stars
            $halfStar = ($rating - $fullStars) >= 0.5; // Check if there's a half star
            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Remaining empty stars
            @endphp

            <!-- Display full stars -->
            @for ($i = 0; $i < $fullStars; $i++)
              <i class="fas fa-star"></i>
              @endfor

              <!-- Display half star if necessary -->
              @if ($halfStar)
              <i class="fas fa-star-half"></i>
              @endif

              <!-- Display empty stars -->
              @for ($i = 0; $i < $emptyStars; $i++)
                <i class="fas fa-star failed"></i>
                @endfor
                <span class="rate">({{$course->avgRating()}})</span>
          </div>
          <a href="{{route('course.details',[$course->id,$course->slug])}}" style="text-decoration: none;" class="view-course-btn">View course</a>
          <div style="clear: both;"></div>
        </div>
      </div>
    </div>
    @empty

    <div class="card mb-3">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="{{getImage('assets/images/not_found.jpg')}}" class="img-fluid" alt="image">
        </div>
        <div class="col-md-8">
          <div class="card-body d-flex align-items-center justify-content-center">
            <h5 class="card-title">@lang('No courses found !')</h5>
          </div>
        </div>
      </div>
    </div>
    @endforelse
  </div>
  @endsection

  @push('script')
  <script>
    'use strict';
    (function($) {
      $('.advert').on('click', function() {
        var ad_id = $(this).data('advertid')
        var data = {
          ad_id: ad_id,
          _token: '{{csrf_token()}}'
        }
        var route = "{{route('ad.click')}}"
        $.post(route, data).then(function(res) {})
      })
    })(jQuery);
  </script>
  @endpush