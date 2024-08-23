@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('Menu')}}
@endsection
@section('pageTitle')
{{ __('Menu') }}
@endsection
@section('breadcrumbs')
{{ __('Menu Create') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/menu-add.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
   @if($textMessage =='')
   <div class="card-body">
      <!--begin:::Tabs-->
      <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15" role="tablist">
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab" href="#Create_Menu" id="edit">
            <i class="ki-outline ki-home fs-2 me-2"></i> Create Menu
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
               href="#Create_Sub_Menu"> <i class="ki-outline ki-shop fs-2 me-2"></i> Create Sub Menu
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" 
               href="#Create_Sub_Sub_Menu"><i class="ki-outline ki-compass fs-2 me-2"></i> Create Sub Sub Menu
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" 
               href="#Create_Sub_Sub_Sub_Menu"><i class="ki-outline ki-compass fs-2 me-2"></i> Create Sub Sub Sub Menu
            </a>
         </li>
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent" data-select2-id="select2-data-myTabContent">
         <!--begin:::Tab pane-->
         <div class="tab-pane fade active show" id="Create_Menu" role="tabpanel" data-select2-id="select2-data-kt_ecommerce_settings_general">
            <!--begin::Form-->
            <!--begin::Form-->
            <form id="kt_settings_menu_form" class="form" method="post">
               @csrf
               <!-- <div class="row mb-7">
                  <div class="col-md-9 offset-md-3">
                     <h2>Create Menu</h2>
                  </div>
               </div> -->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Menu Name (In English)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid menuName_en" name="menuName_en" id="menuName_en" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">मेनू का नाम (हिन्दी में)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid menuName_hi" name="menuName_hi" id="menuName_hi" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Menu URL</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid url" name="url" id="url" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Short Order</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for Listing." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="number" class="form-control form-control-solid shortorder" name="shortorder" id="shortorder" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Footer URL</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for Listing." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid footer_url" name="footer_url" id="footer_url" value="" />
                  </div>
               </div>
                  <!-- /**** */ -->
                  <div class="fv-row mb-7 d-flex flex-wrap align-items-center text-gray-600 gap-5 mb-7">
                     <div class="col-md-3 text-md-end">
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Menu Place</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                        </label>
                     </div>
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="0" id="menu_place" checked="checked" />
                        <label class="form-check-label" for="menu_place">
                              {{ config('menucreatetext.header') }}
                        </label>
                     </div>
                     <!--end::Radio-->

                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="1" id="menu_place" />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.footer') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="5" id="menu_place" />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.footer_bottom') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="2" id="menu_place" />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.rightMenuToggle') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="4" id="menu_place" />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.quick') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="3" id="menu_place" />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.allPlaces') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="6" id="menu_place" />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.none') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                  </div>
                  <!-- /**** */ -->
                  <div class="fv-row mb-7 d-flex flex-wrap align-items-center text-gray-600 gap-5 mb-7">
                     <div class="col-md-3 text-md-end">
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tab Type</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                        </label>
                     </div>
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input tab_type" type="radio" name="tab_type" value="0" id="tab_type" checked="checked" />
                        <label class="form-check-label" for="tab_type">
                              Internal (Open Will Be Same Tab)
                        </label>
                     </div>
                     <!--end::Radio-->

                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input tab_type" type="radio" name="tab_type" value="1" id="tab_type" />
                        <label class="form-check-label" for="any_conditions">
                           External (Open Will Be New Tab)
                        </label>
                     </div>
                     <!--end::Radio-->
                  </div>
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">{{config('FormField.cancel_button')}}</button>
                        <button type="submit" data-kt-settings-type="submit" id="kt_menu_submit" class="btn btn-primary submit-add-menu-btn">
                        <span class="indicator-label">{{config('FormField.save_button')}}</span>
                        <span class="indicator-progress">
                           Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->            
         </div>
         <div class="tab-pane fade" id="Create_Sub_Menu" role="tabpanel">
            <!--begin::Form-->
            <!--begin::Form-->
            <form  id="kt_settings_menu_form2" method="post" class="form">
               @csrf
               <!-- <div class="row mb-7">
                  <div class="col-md-9 offset-md-3">
                     <h2>Create Sub Menu</h2>
                  </div>
               </div> -->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3"><span>Menu Name</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set theme style for the store." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span></label>
                  </div>
                  <div class="col-md-6">
                     <div class="w-100">
                        <select class="form-select form-select-solid menu_id" name="menu_id" id="menu_id" data-control="select2" data-placeholder="Select an option">
                           <option></option>
                           @foreach($menuList as $menus)
                               <option value="{{ $menus->uid }}">{{ $menus->name_en  }} ({{ $menus->name_hi }})</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Sub Menu Name (In English)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span></label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid submenuName_en" name="submenuName_en" id="submenuName_en" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">उप मेनू नाम (हिन्दी में)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span></label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid submenuName_hi" name="submenuName_hi" id="submenuName_hi" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Sub Menu URL</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid url1" name="url" id="url" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Short Order</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for Listing." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="number" class="form-control form-control-solid shortorder1" name="shortorder" id="shortorder" value="" />
                  </div>
               </div>
               <!-- /**** */ -->
               <div class="fv-row mb-7 d-flex flex-wrap align-items-center text-gray-600 gap-5 mb-7">
                     <div class="col-md-3 text-md-end">
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tab Type</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                        </label>
                     </div>
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input tab_type1" type="radio" name="tab_type1" value="0" id="tab_type1" checked="checked" />
                        <label class="form-check-label" for="tab_type">
                              Internal (Open Will Be Same Tab)
                        </label>
                     </div>
                     <!--end::Radio-->

                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input tab_type1" type="radio" name="tab_type1" value="1" id="tab_type1" />
                        <label class="form-check-label" for="any_conditions">
                           External (Open Will Be New Tab)
                        </label>
                     </div>
                     <!--end::Radio-->
                  </div>
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                     <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">{{config('FormField.cancel_button')}}</button>
                        <button type="submit" data-kt-settings-type="submit" id="kt_menu_submit2" class="btn btn-primary submit-add-menu-btn2">
                        <span class="indicator-label">{{config('FormField.save_button')}}</span>
                        <span class="indicator-progress">
                           Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form--> 
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
         <!--begin:::Tab pane-->
         <div class="tab-pane fade" id="Create_Sub_Sub_Menu" role="tabpanel">
            <!--begin::Form-->
            <!--begin::Form-->
            <form id="kt_settings_menu_form3" method="post" class="form">
               @csrf
               <!--begin::Heading-->
               <!-- <div class="row mb-7">
                  <div class="col-md-9 offset-md-3">
                     <h2>Create Sub Sub Menu</h2>
                  </div>
               </div> -->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span>Sub Menu Name</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set theme style for the store." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span></label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-6">
                     <div class="w-100">
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid submenu_id" name="submenu_id" data-control="select2" data-placeholder="Select an option">
                           <option></option>
                           @foreach($Submenu as $submenus)
                               <option value="{{ $submenus->uid }}">{{ $submenus->name_en  }} ({{ $submenus->name_hi }})</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Sub Sub Menu Name (In English)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." ><i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span></label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid sub_sub_menu_en" name="sub_sub_menu_en" id="sub_sub_menu_en" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">उप उप मेनू नाम (हिन्दी में)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." ><i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span></label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid sub_sub_menu_hi" name="sub_sub_menu_hi" id="sub_sub_menu_hi" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Sub Sub Menu URL</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid url2" name="url" id="url" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Short Order</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for Listing." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="number" class="form-control form-control-solid shortorder2" name="shortorder" id="shortorder" value="" />
                  </div>
               </div>
               <!-- /**** */ -->
               <div class="fv-row mb-7 d-flex flex-wrap align-items-center text-gray-600 gap-5 mb-7">
                     <div class="col-md-3 text-md-end">
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tab Type</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                        </label>
                     </div>
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input tab_type2" type="radio" name="tab_type2" value="0" id="tab_type2" checked="checked" />
                        <label class="form-check-label" for="tab_type">
                              Internal (Open Will Be Same Tab)
                        </label>
                     </div>
                     <!--end::Radio-->

                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input tab_type2" type="radio" name="tab_type2" value="1" id="tab_type2" />
                        <label class="form-check-label" for="any_conditions">
                           External (Open Will Be New Tab)
                        </label>
                     </div>
                     <!--end::Radio-->
                  </div>
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                     <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">{{config('FormField.cancel_button')}}</button>
                        <button type="submit" data-kt-settings-type="submit" id="kt_menu_submit3" class="btn btn-primary submit-add-menu-btn3">
                        <span class="indicator-label">{{config('FormField.save_button')}}</span>
                        <span class="indicator-progress">
                           Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form--> 
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
         <!--begin:::Tab pane-->
         <div class="tab-pane fade" id="Create_Sub_Sub_Sub_Menu" role="tabpanel">
            <!--begin::Form-->
            <!--begin::Form-->
            <form id="kt_settings_menu_form4" method="post" class="form">
               @csrf
               <!--begin::Heading-->
               <!-- <div class="row mb-7">
                  <div class="col-md-9 offset-md-3">
                     <h2>Create Sub Sub Sub Menu</h2>
                  </div>
               </div> -->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span>Sub Sub Menu Name</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set theme style for the store." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span></label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-6">
                     <div class="w-100">
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid subsubmenu_id" name="subsubmenu_id" data-control="select2" data-placeholder="Select an option">
                           <option></option>
                           @foreach($Submenu as $submenus)
                               <option value="{{ $submenus->uid }}">{{ $submenus->name_en  }} ({{ $submenus->name_hi }})</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Sub Sub Sub Menu Name (In English)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." ><i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span></label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid sub_sub_sub_menu_en" name="sub_sub_sub_menu_en" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">उप उप उप मेनू नाम (हिन्दी में)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." ><i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span></label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid sub_sub_sub_menu_hi" name="sub_sub_sub_menu_hi" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Sub SUb Sub Menu URL</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="text" class="form-control form-control-solid url3" name="url" id="url" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Short Order</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for Listing." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-6">
                     <input type="number" class="form-control form-control-solid shortorder3" name="shortorder" id="shortorder" value="" />
                  </div>
               </div>
               
               <!-- /**** */ -->
               <div class="fv-row mb-7 d-flex flex-wrap align-items-center text-gray-600 gap-5 mb-7">
                     <div class="col-md-3 text-md-end">
                        <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tab Type</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                        </label>
                     </div>
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input tab_type3" type="radio" name="tab_type3" value="0" id="tab_type3" checked="checked" />
                        <label class="form-check-label" for="tab_type">
                              Internal (Open Will Be Same Tab)
                        </label>
                     </div>
                     <!--end::Radio-->

                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input tab_type3" type="radio" name="tab_type3" value="1" id="tab_type3" />
                        <label class="form-check-label" for="any_conditions">
                           External (Open Will Be New Tab)
                        </label>
                     </div>
                     <!--end::Radio-->
                  </div>
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                     <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">{{config('FormField.cancel_button')}}</button>
                        <button type="submit" data-kt-settings-type="submit" id="kt_menu_submit4" class="btn btn-primary submit-add-menu-btn4">
                        <span class="indicator-label">{{config('FormField.save_button')}}</span>
                        <span class="indicator-progress">
                           Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form--> 
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
      </div>
      <!--end:::Tab content-->
   </div>
   @else
      {!! $textMessage !!}
     <div class="symbol symbol-100px text-center"> <img class="" src='{{ asset(config("constants.error.error_image")) }}' /></div>
   @endif
</div>
@endsection