@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('Website Core Setting')}}
@endsection
@section('pageTitle')
{{ __('Website Core Setting') }}
@endsection
@section('breadcrumbs')
{{ __('Website Core Setting Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/websiteFooterContent-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
   <!--begin::Card body-->
   <div class="card-body">
      <!--begin:::Tabs-->
      <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">
         <!--begin:::Tab item-->
         @if(isset($footerdata) && $footerdata !='')
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab" href="#kt_header_settings_general" id="edit">
            <i class="ki-outline ki-home fs-2 me-2"></i> Footer Content
            </a>
         </li>
         @endif
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent">
         <!--begin:::Tab pane-->
         @if(isset($footerdata) && $footerdata !='')
         <div class="tab-pane fade show active" id="kt_footer_content_settings" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_footer_content_update_form" class="form" enctype="multipart/form-data">
               @csrf
               <!--begin::Heading-->
               <div class="row mb-7">
                  <div class="d-flex flex-column gap-7 gap-lg-8">
                           <div>
                              <!--begin::Label-->
                              <label class="form-label required">Description (English)</label>
                              <!--end::Label-->
                              <!--begin::Editor-->
                                 <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en">{!! $footerdata->content_html_en ??'' !!}</div>
                              <!--end::Editor-->
                              <!--begin::Description-->
                              <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                              <!--end::Description-->
                           </div>
                           <!--end::Input group-->
                           <!--begin::Input group-->
                           <div>
                              <!--begin::Label-->
                              <label class="form-label mt-8">विवरण (हिन्दी में)</label>
                              <!--end::Label-->
                              <!--begin::Editor-->
                                 <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi">{!! $footerdata->content_html_hi ??'' !!}</div>
                              <!--end::Editor-->
                              <!--begin::Description-->
                              <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                              <!--end::Description-->
                           </div>
                           <div class="row fv-row mb-7">
                           <div class="col-md-3 text-md-end">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3">
                              <span class="required">Locate Map Link</span>
                              <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                              <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            </label>
                              <!--end::Label-->
                           </div>
                           <div class="col-md-9">
                              <!--begin::Input-->
                              <input type="text" class="form-control form-control-solid locate_map_link" name="locate_map_link" id="locate_map_link" value="{{$footerdata->locate_map_link ??''}}" placeholder="https://..."  />
                              <!--end::Input-->
                           </div>
                        </div>
                     </div>
               </div>
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">{{config('FormField.cancel_button')}}</button>
                        <button type="submit" data-kt-settings-type="submit" id="kt_coreWebsiteSetting_submit2" class="btn btn-primary submit-coreWebsiteSetting-btn2">
                        <span class="indicator-label">{{config('FormField.save_button')}}</span>
                        <span class="indicator-progress">
                           Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                        <!--end::Button-->
                     </div>
                  </div>
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         @endif
         <!--end:::Tab pane-->
      </div>
      <!--end:::Tab content-->
   </div>
@endsection