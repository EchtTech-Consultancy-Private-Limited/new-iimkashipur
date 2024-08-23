@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('Menu')}}
@endsection
@section('pageTitle')
{{ __('Menu') }}
@endsection
@section('breadcrumbs')
{{ __('Menu Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/menu-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
   <div class="card-body">
      <!--begin:::Tabs-->
      <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15" role="tablist">
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab" href="#Create_Menu" id="edit">
            <i class="ki-outline ki-home fs-2 me-2"></i> Update Menu
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
               @if(isset($types) && $types == 1)
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Menu Name Select</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-7">
                  <select class="form-select form-select-solid menu_id" name="menu_id" id="menu_id" data-control="select2" data-placeholder="Select an option">
                        <option></option>
                        @foreach($menulist as $menus)
                           @if($Editmenu->parent_id == $menus->uid)
                                 <option value="{{ $menus->uid }}" selected>{{ $menus->name_en  }} ({{ $menus->name_hi }})</option>
                           @else
                                 <option value="{{ $menus->uid }}">{{ $menus->name_en  }} ({{ $menus->name_hi }})</option>
                           @endif
                        @endforeach
                     </select>
                  </div>
               </div>
               @endif
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Menu Name (In English)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-7">
                     <input type="text" class="form-control form-control-solid menuName_en" name="menuName_en" id="menuName_en" value="{{$Editmenu->name_en}}" />
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
                  <div class="col-md-7">
                     <input type="text" class="form-control form-control-solid menuName_hi" name="menuName_hi" id="menuName_hi" value="{{$Editmenu->name_hi}}" />
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
                  <div class="col-md-7">
                     <input type="text" class="form-control form-control-solid url" name="url" id="url" value="{{$Editmenu->url}}" />
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
                  <div class="col-md-7">
                     <input type="number" class="form-control form-control-solid shortorder" name="shortorder" id="shortorder" value="{{$Editmenu->sort_order}}" />
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
                  <div class="col-md-7">
                     <input type="text" class="form-control form-control-solid footer_url" name="footer_url" id="footer_url" value="{{$Editmenu->footer_url}}" />
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
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="0" id="menu_place"  <?php if($Editmenu->menu_place =='0'){ echo 'checked'; }else{ echo ''; } ?> />
                        <label class="form-check-label" for="menu_place">
                        {{ config('menucreatetext.header') }}
                        </label>
                     </div>
                     <!--end::Radio-->

                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="1" id="menu_place" <?php if($Editmenu->menu_place =='1'){ echo 'checked'; }else{ echo ''; } ?> />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.footer') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="5" id="menu_place" <?php if($Editmenu->menu_place =='5'){ echo 'checked'; }else{ echo ''; } ?> />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.footer_bottom') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="2" id="menu_place" <?php if($Editmenu->menu_place =='2'){ echo 'checked'; }else{ echo ''; } ?> />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.rightMenuToggle') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="4" id="menu_place" <?php if($Editmenu->menu_place =='4'){ echo 'checked'; }else{ echo ''; } ?> />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.quick') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="3" id="menu_place" <?php if($Editmenu->menu_place =='3'){ echo 'checked'; }else{ echo ''; } ?> />
                        <label class="form-check-label" for="any_conditions">
                        {{ config('menucreatetext.allPlaces') }}
                        </label>
                     </div>
                     <!--end::Radio-->
                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input menu_place" type="radio" name="menu_place" value="6" id="menu_place" <?php if($Editmenu->menu_place =='6'){ echo 'checked'; }else{ echo ''; } ?> />
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
                        <input class="form-check-input tab_type" type="radio" name="tab_type" value="0" id="tab_type"  <?php if($Editmenu->tab_type =='0'){ echo 'checked'; }else{ echo ''; } ?> />
                        <label class="form-check-label" for="tab_type">
                              Internal (Open Will Be Same Tab)
                        </label>
                     </div>
                     <!--end::Radio-->

                     <!--begin::Radio-->
                     <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input tab_type" type="radio" name="tab_type" value="1" id="tab_type" <?php if($Editmenu->tab_type =='1'){ echo 'checked'; }else{ echo ''; } ?> />
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
      </div>
      <!--end:::Tab content-->
   </div>
</div>
@endsection