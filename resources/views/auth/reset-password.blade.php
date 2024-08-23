<html lang="en" >
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <title>Forgot Password</title>
      <meta charset="utf-8"/>
      <meta name="description" content=""/>
      <meta name="keywords" content=""/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <meta property="og:locale" content="en_IN" />
      <meta property="og:type" content="CMS" />
      <meta property="og:title" content="" />
      <meta property="og:url" content=""/>
      <meta property="og:site_name" content="CMS | Login" />
      <link rel="canonical" href=""/>
      <link rel="shortcut icon" href="{{ asset('assets-cms/media/logos/favicon.ico') }}"/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
      <link href="{{ asset('assets-cms/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('assets-cms/cms_css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
   </head>
   <body  id="kt_body"  class="auth-bg bgi-size-cover bgi-attachment-fixed bgi-position-center" >
      <div class="d-flex flex-column flex-root">
         <style>
            body {
            background-image: url('{{ asset("assets-cms/media/auth/bg10.jpg") }}');
            }
            [data-bs-theme="dark"] body {
            background-image: url('{{ asset("assets-cms/media/auth/bg10-dark.jpg") }}');
            }
         </style>
         <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
               <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                  <img class="theme-light-show mx-auto mw-100 w-150px w-lg-200px mb-10 mb-lg-20" src="{{ asset(config('constants.default.logo_image')) }}" alt=""/>    
                  <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-200px mb-10 mb-lg-20" src="{{ asset(config('constants.default.logo_image')) }}" alt=""/>                 
                  <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7"> 
                     CMS (Content Management System) Login
                  </h1>
                  <div class="text-gray-600 fs-base text-center fw-semibold">
                     <p>Version 1.0</p>
                    Your IP: {{ \Request::ip(); }}
                  </div>
               </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
               <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                  <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                     <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                        <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url="{{ route('login') }}" action="{{ route('forgetuser') }}">
                            <div class="text-center mb-10">
                                <h1 class="text-dark fw-bolder mb-3">
                                    Forgot Password ?
                                </h1>
                                <div class="text-gray-500 fw-semibold fs-6">
                                    Enter your email to reset your password.
                                </div>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent"/> 
                            </div>
                           <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                              <div></div>
                              <a href="{{ route('login') }}" class="link-primary"> Login ?</a>
                           </div>
                           <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                                <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                                    <span class="indicator-label"> Submit</span>
                                    <span class="indicator-progress">
                                        Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                                    {{config('FormField.cancel_button')}}
                                 </button>
                                </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('assets-cms/plugins/global/plugins.bundle.js') }}"></script>
      <script src="{{ asset('assets-cms/cms_js/scripts.bundle.js') }}"></script>
      <script src="{{ asset('public/authentication/reset-password/reset-password.js') }}"></script>
   </body>
</html>