@extends('admin.layouts.app')

@section('panel')
<div class="container-fluid">
    
    <form action="{{route('admin.coupon.update',$coupon->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card b-radius--10 p-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Coupon Name') <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="@lang('Coupon Name')" name="name" required value="{{$coupon->name}}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Short details') <span class="text-danger">*</span></label>
                            <textarea class="form-control" placeholder="@lang('Short Details')" name="details" required>{{$coupon->details}}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Select an Exam') <span class="text-danger">*</span></label>
                            <select name="course_id" class="form-control" required id="exam_id">
                                <option value="">@lang('--Select Option--')</option>
                                <option value="0" {{$coupon->exam_id == 0 ? 'selected':''}}>@lang('For All Exam')</option>
                                @foreach ($courses as $course)
                                  <option value="{{$course->id}}" {{$coupon->course_id == $course->id ? 'selected':''}}>{{$course->title}}</option>
                                @endforeach
                                
                            </select>
                        </div>
           
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Amount Type') <span class="text-danger">*</span></label>
                            <select name="amount_type" class="form-control" required id="amount_type">
                                <option value="1" {{$coupon->amount_type == 1 ? 'selected':''}}>@lang('Percentage')</option>
                                <option value="2" {{$coupon->amount_type == 2 ? 'selected':''}}>@lang('Fixed')</option>
                            </select>
                        </div>
           
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Discount Amount') <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" type="number" min="1" placeholder="@lang('Discount Amount')" name="coupon_amount" required value="{{getAmount($coupon->coupon_amount)}}">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="suffix">%</span>
                                </div>
                            </div>
                        </div>

                      

                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Minmum Order Amount (optional)')</label>
                            <div class="input-group">
                                <input class="form-control" type="number" min="0" placeholder="@lang('Minmum Order Amount (optional)')" name="min_order_amount" value="{{getAmount($coupon->min_order_amount)}}">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="suffix">{{$general->cur_text}}</span>
                                </div>
                            </div>
                        </div>
           
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Coupon Code') <span class="text-danger">*</span></label>
                            <input class="form-control" type="text"  placeholder="@lang('Coupon Code')" name="coupon_code" required value="{{$coupon->coupon_code}}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Total Usage limit (optional)')</label>
                            <input class="form-control" type="number" min="0"  placeholder="@lang('Total Usage limit')" name="use_limit"  value="{{$coupon->use_limit}}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('User usage limit (optional)')</label>
                            <input class="form-control" type="number" min="0"  placeholder="@lang('User usage limit (optional)')" name="usage_per_user"  value="{{$coupon->usage_per_user}}">
                        </div>

                        

                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Start date') <span class="text-danger">*</span></label>
                    
                            <input type="text" name="start_date" class="datepicker-here form-control" data-language='en' data-date-format="yyyy-mm-dd" data-position='top left' placeholder="@lang('Start Date')" required value="{{$coupon->start_date}}">

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('End date') <span class="text-danger">*</span></label>
                    
                            <input type="text" name="end_date" class="datepicker-here form-control" data-language='en' data-date-format="yyyy-mm-dd" data-position='top left' placeholder="@lang('End Date')" required value="{{$coupon->end_date}}">

                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">@lang('Status') </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('active')" data-off="@lang('inactive')" name="status" @if($coupon->status == 1) checked @endif>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        
                        <button type="submit" class="btn btn--primary btn-block">@lang('Submit')</button>
        
                    </div>
                </div>
            </div>

             </div>
         </div>

    </form>
</div>
   <!-- card end -->
    
@endsection
              
                      
@push('breadcrumb-plugins')
    <a class="btn btn--primary" href="{{route('admin.coupon.all')}}"><i class="las la-backward"></i> @lang('Go Back')</a>
@endpush     
                    

@push('script-lib')
<script src="{{asset('assets/admin/js/datepicker.min.js')}}"></script>
<script src="{{asset('assets/admin/js/datepicker.en.js')}}"></script>
@endpush

@push('script')

<script>
    'use strict'
    $('#amount_type').on('change',function(){
        var cur = "{{$general->cur_text}}"
        if($(this).val() == 1){
            $('#suffix').text('%')
        } else if($(this).val() == 2){
            $('#suffix').text(cur)
        }
    })
</script>

@endpush