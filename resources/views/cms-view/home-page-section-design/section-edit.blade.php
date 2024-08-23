@extends('cms-view.layouts.main')
@section('title')
    {{__('New Section')}}
@endsection
@section('pageTitle')
 {{ __('New Section') }}
@endsection
@section('breadcrumbs')
 {{ __('Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/newsections-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
   <div class="card card-flush">
   @if($textMessage =='')
   <div class="card-body">
   <!--begin::Form-->
   <form id="kt_newSection_update_form" class="form" enctype="multipart/form-data">
               <!--begin::Scroll-->
               <div class="d-flex flex-column me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Section Name (In English)</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-7">
                        <input type="text" name="section_name_en" class="form-control form-control-solid mb-3 mb-lg-0 section_name_en" id="section_name_en" placeholder="section name english.." value="{{ $data->title_en??'' }}" />
                    </div>
                     <!--end::Input-->
                  </div>
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Section Name (In Hindi)</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-7">
                        <input type="text" name="section_name_hi" class="form-control form-control-solid mb-3 mb-lg-0 section_name_hi" id="section_name_hi" placeholder="section name hindi.." value="{{ $data->title_hi??'' }}" />
                    </div>
                     <!--end::Input-->
                  </div>
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Short Order</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-7">
                        <input type="number" name="sort_order" class="form-control form-control-solid mb-3 mb-lg-0 sort_order" id="sort_order" placeholder="Sort Order" value="{{ $data->sort_order??'' }}" />
                     </div>
                     <!--end::Input-->
                  </div>
                  <!--end::Input group-->
               </div>
               <!--end::Scroll-->
               <!--begin::Actions-->
               <div class="text-center pt-15">
                  <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                  {{config('FormField.cancel_button')}}
                  </button>
                  <button type="submit" id="kt_update_newSection_submit" class="btn btn-primary submit-newSection-btn" data-kt-users-modal-action="submit">
                  <span class="indicator-label">
                  {{config('FormField.save_button')}}
                  </span>
                  <span class="indicator-progress">
                  Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                  </span>
                  </button>
               </div>
               <!--end::Actions-->
            </form>
   <!--end::Form-->
   </div>
   @else
      {!! $textMessage !!}
     <div class="symbol symbol-100px text-center"> <img class="" src='{{ asset(config("constants.error.error_image")) }}' /></div>
   @endif
   </div>
@endsection