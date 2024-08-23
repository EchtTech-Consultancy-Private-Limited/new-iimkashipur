@extends('cms-view.layouts.main')
@section('title')
    {{__('File Upload')}}
@endsection
@section('pageTitle')
 {{ __('File Upload') }}
@endsection
@section('breadcrumbs')
 {{ __('File Path Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/file-upload-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
   <div class="card card-flush">
   @if($textMessage =='')
   <div class="card-body">
   <!--begin::Form-->
   <form id="kt_fileupload_update_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
      <!--begin::Main column-->
      <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
         <!--end:::Tabs-->
         <!--begin::Tab content-->
         <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
               <div class="d-flex flex-column gap-7 gap-lg-10">
                  <!--begin::General options-->
                  <div class="card card-flush py-4">
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                           <!--begin::Label-->
                           <div class="col-md-12">
                              <label class="required form-label">Title Name (In English)</label>
                           </div>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <div class="col-md-12">
                              <input type="text" name="title_name" id="title_name" class="form-control mb-2 title_name" id="title_name" placeholder="{{config('FormField.placeholder_title_en')}}" value="{{ $data->title_name}}" />
                           </div>
                           <!--end::Input-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">A title name is required and recommended to be unique.</div>
                           <!--end::Description-->
                        </div>
                        <div class="mb-10 fv-row">
                           <!--begin::Label-->
                           <div class="col-md-6">
                              <label class="required fw-semibold fs-6 mb-2">File Upload (PDFs OR Images)</label>
                           </div>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <div class="col-md-6">
                              <input type="file" name="file_path" class="form-control form-control-solid mb-3 mb-lg-0 file_path" id="file_path" placeholder="" />
                           </div>
                           <!--end::Input-->
                        </div>
                        <div class="mb-10 fv-row">
                           <!--begin::Label-->
                           <div class="col-md-6">
                              <label class="fw-semibold fs-6 mb-2">Old File (Download Here!)</label>
                           </div>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <div class="col-md-6">
                              <a href="{{ asset('resources/uploads/uploadManualfile/'.$data->file_path) }}" target="_blank" download>
                                 <i class="ki-outline ki-file fs-1"></i>
                              </a>
                           </div>
                           <!--end::Input-->
                        </div>
                     </div>
                     <!--end::Card header-->
                  </div>
                  <!--end::General options-->
               </div>
            </div>
            <!--end::Tab pane-->
         </div>
         <!--end::Tab content-->
         <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
            {{config('FormField.cancel_button')}}
            </a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_update_fileupload_submit" class="btn btn-primary submit-fileupload-btn">
            <span class="indicator-label">
            {{config('FormField.save_button')}}
            </span>
            <span class="indicator-progress">
               Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
            </button>
            <!--end::Button-->
         </div>
      </div>
      <!--end::Main column-->
   </form>
   <!--end::Form-->
   </div>
   @else
      {!! $textMessage !!}
     <div class="symbol symbol-100px text-center"> <img class="" src='{{ asset(config("constants.error.error_image")) }}' /></div>
   @endif
   </div>
@endsection