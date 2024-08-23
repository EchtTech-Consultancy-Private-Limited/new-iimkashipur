<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      @include('cms-view.partials.head-css')
   </head>
   <body  id="kt_body"  class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"  style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px" >
      <div class="d-flex flex-column flex-root">
         <div class="page d-flex flex-row flex-column-fluid">
            <div
               id="kt_aside"
               class="aside  aside-dark aside-hoverable "
               data-kt-drawer="true"
               data-kt-drawer-name="aside"
               data-kt-drawer-activate="{default: true, lg: false}"
               data-kt-drawer-overlay="true"
               data-kt-drawer-width="{default:'200px', '300px': '250px'}"
               data-kt-drawer-direction="start"
               data-kt-drawer-toggle="#kt_aside_mobile_toggle"
               >
               <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                  <!--begin::Logo-->
                  <a href="{{ route('dashboard') }}">
                  <img alt="Logo" src="{{ asset('assets-cms/logo-light.png') }}" class="h-35px logo"/>
                  </a>
                  <!--end::Logo-->
                  <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle me-n2" 
                     data-kt-toggle="true" 
                     data-kt-toggle-state="active" 
                     data-kt-toggle-target="body" 
                     data-kt-toggle-name="aside-minimize"
                     >
                     <i class="ki-outline ki-double-left fs-1 rotate-180"></i>           
                  </div>
                  <!--end::Aside toggler-->
               </div>
               <div
                  class="hover-scroll-overlay-y py-2"
                  id="kt_aside_menu_wrapper"
                  data-kt-scroll="true"
                  data-kt-scroll-activate="{default: false, lg: true}"
                  data-kt-scroll-height="auto"     
                  data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                  data-kt-scroll-wrappers="#kt_aside_menu" 
                  data-kt-scroll-offset="0"
                  >
                  <!--begin::Menu-->
                  @include('cms-view.partials.aside')
                  <!--end::Menu-->
               </div>
            </div>
            <!--end::Aside menu-->
            @include('cms-view.partials.header')
            <div class="content d-flex flex-column flex-column-fluid " id="kt_content">
               <!--begin::Toolbar-->
               <div class="toolbar" id="kt_toolbar">
                  <!--begin::Container-->
                  <div id="kt_toolbar_container" class=" container-fluid  d-flex flex-stack">
                     <div  data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"  class="page-title d-flex align-items-center me-3 flex-wrap lh-1">
                        <!--begin::Title-->
                        <h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">
                           @section('pageTitle')
                           {{ config('app.name') }}
                           @show
                        </h1>
                        <!--end::Title-->
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start mx-4"></span> 
                        <!--end::Separator-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                           <!--begin::Item-->
                           <li class="breadcrumb-item text-muted">
                              <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">
                              Home                           
                              </a>
                           </li>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <li class="breadcrumb-item">
                              <span class="bullet bg-gray-300 w-5px h-2px"></span>
                           </li>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <li class="breadcrumb-item text-muted">
                              @section('breadcrumbs')
                              {{ config('app.name') }}
                              @show                                            
                           </li>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <li class="breadcrumb-item">
                              <span class="bullet bg-gray-300 w-5px h-2px"></span>
                           </li>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <li class="breadcrumb-item text-dark">
                              @section('pageTitle')
                              {{ config('app.name') }}
                              @show                    
                           </li>
                           <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                     </div>
                     <div class="d-flex align-items-center py-1">
                        <!--begin::Wrapper-->
                        <div class="me-4">
                           <!--begin::Menu-->
                           <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bold" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                           <i class="ki-outline ki-filter fs-5 text-gray-500 me-1"></i>               
                           Filter
                           </a>
                           <!--begin::Menu 1-->
                           <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64afb1fdcc422">
                              <!--begin::Header-->
                              <div class="px-7 py-5">
                                 <div class="fs-5 text-dark fw-bold">Filter Options</div>
                              </div>
                              <!--end::Header-->
                              <!--begin::Menu separator-->
                              <div class="separator border-gray-200"></div>
                              <!--end::Menu separator-->
                              <!--begin::Form-->
                              <div class="px-7 py-5">
                                 <!--begin::Input group-->
                                 <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Status:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div>
                                       <select class="form-select form-select-solid" multiple data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64afb1fdcc422" data-allow-clear="true">
                                          <option></option>
                                          <option value="1">Approved</option>
                                          <option value="2">Pending</option>
                                          <option value="2">In Process</option>
                                          <option value="2">Rejected</option>
                                       </select>
                                    </div>
                                    <!--end::Input-->
                                 </div>
                                 <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Member Type:</label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    <div class="d-flex">
                                       <!--begin::Options-->    
                                       <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                       <input class="form-check-input" type="checkbox" value="1"/>
                                       <span class="form-check-label">
                                       Author
                                       </span>
                                       </label>
                                       <!--end::Options-->    
                                       <!--begin::Options-->    
                                       <label class="form-check form-check-sm form-check-custom form-check-solid">
                                       <input class="form-check-input" type="checkbox" value="2" checked="checked"/>
                                       <span class="form-check-label">
                                       Customer
                                       </span>
                                       </label>
                                       <!--end::Options-->    
                                    </div>
                                    <!--end::Options-->    
                                 </div>
                                 <!--end::Input group-->
                                 <!--begin::Input group-->
                                 <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Notifications:</label>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                       <input class="form-check-input" type="checkbox" value="" name="notifications" checked />
                                       <label class="form-check-label">
                                       Enabled
                                       </label>
                                    </div>
                                    <!--end::Switch-->
                                 </div>
                                 <!--end::Input group-->
                                 <!--begin::Actions-->
                                 <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                    <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                 </div>
                                 <!--end::Actions-->
                              </div>
                              <!--end::Form-->
                           </div>
                           <!--end::Menu 1-->                <!--end::Menu-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Button-->
                        <a href="#" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
                        Create </a>
                        <!--end::Button-->
                     </div>
                     <!--end::Actions-->
                  </div>
                  <!--end::Container-->
               </div>
               <div class="post d-flex flex-column-fluid" id="kt_post">
                  <div id="kt_content_container" class="container-xxl">
                     @yield('content')
                  </div>
               </div>
             </div>
            <!--end::Container-->  
            </div>  
         <!--end::Post-->
         </div> 
         <!--end::Content-->
         </div> 
         <!--begin::Footer-->
            @include('cms-view.partials.footer')
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Footer-->
      @include('cms-view.partials.footer-scripts')
   </body>
   <!--end::Body-->
</html>