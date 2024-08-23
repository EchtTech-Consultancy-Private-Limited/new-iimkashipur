<html lang="en" >
   <head>
      <title>CMS | Login</title>
      <meta charset="utf-8"/>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
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
      <link href="{{ asset('assets-cms/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('assets-cms/cms_css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
      <!-- <link href="{{ asset('assets-cms/cms_css/clock_md5.css') }}" rel="stylesheet" type="text/css"/> -->
      <link href="{{ asset('assets-cms/cms_css/cms-css.css') }}" rel="stylesheet" type="text/css"/>
   <style>
      </style>
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
                  <!-- <div class="clock">
                     <div class="hour-hand"></div>
                     <div class="minute-hand"></div>
                     <div class="second-hand"></div>

                     <div class="number number-3">3</div>
                     <div class="number number-6">6</div>
                     <div class="number number-9">9</div>
                     <div class="number number-12">12</div>
                  </div> -->
                  <img class="theme-light-show mx-auto mw-100 w-150px w-lg-500px mb-10 mb-lg-20" src="{{ asset(config('constants.default.logo_image')) }}" alt=""/>    
                  <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-500px mb-10 mb-lg-20" src="{{ asset(config('constants.default.logo_image')) }}" alt=""/>                 
                  <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7"> 
                     CMS (Content Management System) Login
                  </h1>
                  <div class="text-gray-600 fs-base text-center fw-semibold">
                     <p>Version 1.0</p>
                    Your IP: {{ Request::header('CF-Connecting-IP', Request::ip()) }}
                  </div>
               </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
               <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                  <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                     <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{ $crudUrlTemplate['dashboard']}}" action="{{ $crudUrlTemplate['login']}}">
                        @csrf
                        <div class="text-center mb-11">
                              <h1 class="text-dark fw-bolder mb-3">
                                 Sign In
                              </h1>
                           </div>
                           <!-- <div class="separator separator-content my-14">
                              <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                           </div> -->
                           <div class="fv-row mb-8">
                              <input type="text" placeholder="Email" name="email" value="" autocomplete="off" class="form-control bg-transparent email"/> 
                           </div>
                           <div class="fv-row mb-3" data-kt-password-meter="true">
                              <input class="form-control bg-transparent password" type="password" placeholder="Password" name="password" autocomplete="off"/>
                              <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                 <i class="ki-outline ki-eye-slash fs-2"></i>                    
                                 <i class="ki-outline ki-eye fs-2 d-none"></i>                
                              </span>
                           </div>
                           
                           <div class="form-group mt-4 mb-4">
                           <div class="form-group mt-4 mb-4">
                              <div class="captcha-box d-flex align-item-center">
                                 <label for="captcha" class="security-code">Security Code : <?php echo $CustomCaptch['expression']; ?> </label> <span class="equalto">=</span>
                                 <input id="SecurityCode" type="text" class="form-control SecurityCode" placeholder="Enter Security Code" name="SecurityCode" required>
                              </div>
                           </div>
                           <div class="d-grid mb-7">
                              <button type="submit" id="kt_sign_in_submit" class="btn btn-primary submit-login-btn">
                                 <span class="indicator-label">Sign In</span>
                                 <span class="indicator-progress">
                                 Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                 </span>
                              </button>
                           </div>
                           <div class="d-flex flex-stack flex-wrap gap-6 fs-base fw-semibold mb-8">
                              <div></div>
                              <a href="{{ route('forget-user') }}" class="link-primary"> Forgot Password ?</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('assets-cms/cms_js/jquery_3.7.1_jquery.min.js') }}"></script>
      <script src="{{ asset('assets-cms/plugins/global/plugins.bundle.js') }}"></script>
      <script src="{{ asset('assets-cms/cms_js/scripts.bundle.js') }}"></script>
      <script src="{{ asset('assets-cms/cms_js/src_md5.js') }}"></script>
      <script src="{{ asset('assets-cms/cms_js/clock_md5.js') }}"></script>
      <script src="{{ asset('public/authentication/sign-in/general.js') }}"></script>
      <script src="{{ asset('assets-cms/cms_js/cms-js.js') }}"></script>
   </body>
</html>