@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('Module')}}
@endsection
@section('pageTitle')
{{ __('Module') }}
@endsection
@section('breadcrumbs')
{{ __('Module Create') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/module-add.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
   @if($textMessage =='')
   <div class="card-body">
      <!--begin:::Tabs-->
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent" data-select2-id="select2-data-myTabContent">
         <!--begin:::Tab pane-->
         <div class="tab-pane fade active show" id="Create_Menu" role="tabpanel" data-select2-id="select2-data-kt_ecommerce_settings_general">
            <!--begin::Form-->
            <!--begin::Form-->
            <form id="kt_settings_module_form" class="form" method="post">
               @csrf
               <div class="row mb-7">
                  <div class="col-md-9 offset-md-3">
                     <h2>Create New Module</h2>
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Module Name (In English)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-7">
                     <input type="text" class="form-control form-control-solid menuName_en" name="menuName_en" id="menuName_en" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">मोड्यूल का नाम (हिन्दी में)</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-7">
                     <input type="text" class="form-control form-control-solid menuName_hi" name="menuName_hi" id="menuName_hi" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Module URL</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-7">
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
                  <div class="col-md-7">
                     <input type="number" class="form-control form-control-solid shortorder" name="shortorder" id="shortorder" value="" />
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Prefix Set</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for Listing." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-7">
                     <input type="text" class="form-control form-control-solid prefix" name="prefix" id="prefix" value="" />
                  </div>
               </div>
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">{{config('FormField.cancel_button')}}</button>
                        <button type="submit" data-kt-settings-type="submit" id="kt_module_submit" class="btn btn-primary submit-add-module-btn">
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
   @else
      {!! $textMessage !!}
     <div class="symbol symbol-100px text-center"> <img class="" src='{{ asset(config("constants.error.error_image")) }}' /></div>
   @endif
</div>
@endsection