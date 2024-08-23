<!DOCTYPE html>
<html lang="en" >
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <title>New Password</title>
        <meta charset="utf-8"/>
        <meta name="description" content=" "/>
        <meta name="keywords" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>      
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="" />
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content="CMS | Echttech" />
        <link rel="canonical" href=""/>
        <link rel="shortcut icon" href="{{ asset('assets-cms/media/logos/favicon.ico') }}"/>
        <link href="{{ asset('assets-cms/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets-cms/cms_css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <script>
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>
    </head>
    <body  id="kt_body"  class="auth-bg bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat" >
<script>
	var defaultThemeMode = "light";
	var themeMode;
	if ( document.documentElement ) {
		if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
			themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
		} else {
			if ( localStorage.getItem("data-bs-theme") !== null ) {
				themeMode = localStorage.getItem("data-bs-theme");
			} else {
				themeMode = defaultThemeMode;
			}			
		}

		if (themeMode === "system") {
			themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
		}

		document.documentElement.setAttribute("data-bs-theme", themeMode);
	}            
</script>
	<div class="d-flex flex-column flex-root">
    <style>
    body {
    background-image: url('{{ asset("assets-cms/media/auth/bg10.jpg") }}');
    }
    [data-bs-theme="dark"] body {
    background-image: url('{{ asset("assets-cms/media/auth/bg10-dark.jpg") }}');
    }
    </style>
<div class="d-flex flex-column flex-column-fluid flex-lg-row">
    <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">              
        <div class="d-flex flex-center flex-lg-start flex-column">              
            <a href="#l" class="mb-7">
                <img alt="Logo" src="{{ asset(config('constants.default.logo_image')) }}"/>
            </a>    
            <h2 class="text-white fw-normal m-0"> 
                Branding tools designed for your business
            </h2>  
        </div>
    </div>
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                <form class="form w-100" novalidate="novalidate" id="kt_newSet_password_form" data-kt-redirect-url="{{ route('login') }}" action="{{ route('update_password') }}">
                    <div class="text-center mb-10">
                        <input type="hidden" name="token" value="{{ Request::segment(2) }}"> 
                        <h1 class="text-dark fw-bolder mb-3">
                            Setup New Password
                        </h1>
                        <div class="text-gray-500 fw-semibold fs-6">
                            Have you already reset the password ?

                            <a href="{{ route('login') }}" class="link-primary fw-bold">
                                Sign in
                            </a>
                        </div>
                    </div>
                    <div class="fv-row mb-8">    
                        <input type="text" placeholder="email" name="email" autocomplete="off" class="form-control bg-transparent"/>
                    </div>
                    <div class="fv-row mb-8" data-kt-password-meter="true">
                        <div class="mb-1">
                            <div class="position-relative mb-3">    
                                <input class="form-control bg-transparent password" type="password" placeholder="Password" name="password" autocomplete="off"/>
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="ki-outline ki-eye-slash fs-2"></i>                    
                                    <i class="ki-outline ki-eye fs-2 d-none"></i>                
                                </span>
                            </div>
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>
                        <!--begin::Hint-->
                        <!-- <div class="text-muted">
                            Use 8 or more characters with a mix of letters, numbers & symbols.
                        </div> -->
                        <!--end::Hint-->
                    </div>
                    <div class="fv-row mb-8">    
                        <input type="password" placeholder="Repeat Password" name="passwordconfirmation" autocomplete="off" class="form-control bg-transparent passwordconfirmation"/>
                    </div>
                    <div class="fv-row mb-8">
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1"/>
                            <span class="form-check-label fw-semibold text-gray-700 fs-6 ms-1">
                                I Agree &                 
                                <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                            </span>
                        </label>
                    </div>
                    <div class="d-grid mb-10">
                        <button type="button" id="kt_update_password_submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    <script src="{{ asset('assets-cms/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets-cms/cms_js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets-cms/cms_js/custom/authentication/reset-password/new-password.js') }}"></script>
    </body>
</html>