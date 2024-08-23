@extends('cms-view.layouts.main')
@section('title')
    {{__('Form Builder')}}
@endsection
@section('pageTitle')
 {{ __('Form Builder') }}
@endsection
@section('breadcrumbs')
 {{ __('Form Builder Create') }}
@endsection
@push('post-scripts')
<script src="{{ asset('assets-cms/cms_js/form-builder/form-builder.min.js') }}"></script>
<script src="{{ asset('public/form-js/form-builder-js.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<!--begin::Container-->
<div id="kt_content_container" class=" container-xxl ">
   <!--begin::Layout-->
   <div class="d-flex flex-column flex-lg-row">
      <!--begin::Content-->
      <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
         <!--begin::Card-->
         <div class="card card-flush pt-3 mb-5 mb-xl-10">
                <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Form Name</span>
                     <span class="ms-1" data-bs-toggle="tooltip" title="Set the Form name of the Unique." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                  </div>
                  <div class="col-md-7">
                     <input type="text" class="form-control form-control-solid form_name" name="form_name" id="form_name" value="" required/>
                  </div>
                </div>
            <!--begin::Card body-->
            <div class="card-body pt-1">
               <!--begin::Section-->
               <div class="mb-12">
                  <!--begin::Details-->
                  <div class="d-flex flex-wrap py-5">
                     <!--begin::Row-->
                     <div class="flex-equal me-5">
                        <div id="fb-editor"></div>
                     </div>
                     <!--end::Row-->
                  </div>
                  <!--end::Row-->
               </div>
               <!--end::Section-->
            </div>
            <!--end::Card body-->
         </div>
         <!--end::Card-->
      </div>
      <!--end::Content-->
   </div>
   <!--end::Layout-->
@endsection
