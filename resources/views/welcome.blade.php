@extends('templates.main')

@section('content')
<style>
    body {
        height: 100%;
        background-image: url("/images/edited.jpg");
        background-size: cover;
    }
</style>
    <div class="header py-3">
        <div class="container" style=" background-color: rgba(107, 142, 35, .9); border: 7px solid white;">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-6">
                            <img src="/images/CMU-LOGO.png" alt="CMUlogo" style="width: 200px; height:200px;">
                            <h1 class="text-white"
                            style="text-shadow: 6px 3px 4px black; font-size: 80px;

                            ">{{ __('Central Mindanao University') }}</h1>
                        </div>
                    <h2 class="text-lead text-warning display-4">
                        <span>
                            {{ __('Library Attendance System') }}
                        </span>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
            <h4 class="text-danger justify-content-center">{{ __('PRIVACY NOTICE') }}</h4>
        </div>
        <div class="modal-body">
            <p class="text-lead text-dark" style="text-align: center;">
                {{ __('CMU is commited in complying the mandates of National Privacy Commision and implementing the Rules and Regulations of Data Privacy Act of 2012. Personal information being collected through this attendance sheet will be used to monitor attendance of the participants of the said event. Information you provide will be kept for record purpose only.') }}
            </p>
        </div>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>


    <div class="header py-7 py-lg-8" style="margin-top: 350px;">
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
<script src="js/jq.js"></script>
<script>
$(window).on('load', function(){
    $('#exampleModal').modal('show');
});

//  window.setTimeout("closeHelpDiv();", 5000);

function closeHelpDiv(){
    $('#exampleModal').modal('hide');
}
</script>
@endsection
