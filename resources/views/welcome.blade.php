@extends('templates.main')

@section('content')
    <div class="header py-7 py-lg-8" style="margin-top: 240px;">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-black">{{ __('Welcome!') }}</h1>
                        <h3 class="text-lead text-dark">
                            {{-- {{ __('This is the CMU Library Monitoring System') }} --}}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header py-7 py-lg-8" style="border: 1px solid; padding: 3px 3px; margin-top: 250px;">
        <div class="container" style="padding: 3px; margin: 5px .2px; width: auto; background-color: #D3D3D3;">
            <div class="header-body text-center mb-7" style="border: 1px solid;">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h4 class="text-danger">{{ __('PRIVACY NOTICE') }}</h4>
                        <p class="text-lead text-dark">
                            {{ __('CMU is commited in complying the mandates of National Privacy Commision and implementing the Rules and Regulations of Data Privacy Act of 2012. Personal information being collected through this attendance sheet will be used to monitor attendance of the participants of the said event. Information you provide will be kept for record purpose only.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header py-7 py-lg-8" style="margin-top: 50px;">
        <div class="container" style="">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <p class="text-lead text-dark">
                            <a href="https://www.facebook.com/wolfie.didi" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
