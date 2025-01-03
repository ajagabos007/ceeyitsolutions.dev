@extends($activeTemplate.'layouts.master')
@section('content')
<section class="pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            @if(Auth::user()->ts)
            <div class="col-md-6">
                <div class="custom--card">
                    <div class="card-header">
                        <h5 class="card-title m-0 ">@lang('Google Authenticator')</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                        <h6 class="text-center">@lang('Your 2FA Verification is Enabled.')</h6>
                        </div>
                        <button type="button" class="btn w-100 btn--danger" data-bs-toggle="modal" data-bs-target="#disableModal">@lang('Disable 2FA Authenticator')</button>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-8">
                <div class="custom--card">
                    <div class="card-header">
                        <h5 class="card-title m-0 ">@lang('Google Authenticator')</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mx-auto text-center">
                            <img class="mx-auto" src="{{$qrCodeUrl}}">
                            <p class="fs--14px mt-2">@lang('Use Google Authentication App to scan the QR code.') <a class="text--base" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank">@lang('App Link')</a></p>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="key" value="{{$secret}}" class="form--control form-control-lg" id="referralURL" readonly>
                                <button class="input-group-text border--base bg--base  copytext" id="copyBoard" onclick="myFunction()"> <i class="fa fa-copy"></i> </button>
                            </div>
                        </div>

                        <button type="button" class="btn btn--base w-100" data-bs-toggle="modal" data-bs-target="#enableModal">
                            @lang('Enable 2FA Authenticator')
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>


<!--Enable Modal -->
<div id="enableModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">@lang('Verify Your Otp')</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.twofactor.enable')}}" method="POST" class="transparent-form">
                @csrf
                <div class="modal-body ">
                    <div class="form-group">
                        <input type="hidden" name="key" value="{{$secret}}">
                        <input type="text" class="form--control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--danger btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success btn-sm">@lang('Verify')</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!--Disable Modal -->
<div id="disableModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('Verify Your Otp Disable')</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.twofactor.disable')}}" method="POST" class="transparent-form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form--control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--danger btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success btn-sm">@lang('Verify')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        (function($){
            "use strict";

            $('.copytext').on('click',function(){
                var copyText = document.getElementById("referralURL");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
                iziToast.success({message: "Copied: " + copyText.value, position: "topRight"});
            });
        })(jQuery);
    </script>
@endpush


