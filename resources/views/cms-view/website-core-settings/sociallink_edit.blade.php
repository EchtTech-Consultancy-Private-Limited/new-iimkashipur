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
<script src="{{ asset('public/form-js/websiteSocialLink-edit.js') }}"></script>
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
         @if(isset($sociallinkData) && $sociallinkData !='')
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_social_link_settings">
               <i class="ki-outline ki-abstract-39 fs-2 me-2"></i>  Social Link
            </a>
         </li>
         @endif
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent">
         <!--begin:::Tab pane-->
         @if(isset($sociallinkData) && $sociallinkData !='')
         <div class="tab-pane fade show active" id="kt_social_link_settings" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_social_link_update_form" class="form" method="POST" enctype="multipart/form-data">
               @csrf
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Google Link</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid google_link" name="google_link" id="google_link_error" value="{{ $sociallinkData->google_link ??'' }}" placeholder="https://..."  />
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Linked In</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid linkedin" name="linkedin" id="linkedin_error" value="{{ $sociallinkData->linkedin ??'' }}" placeholder="https://..."  />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Facebook</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid facebook" name="facebook" id="facebook_error" value="{{ $sociallinkData->facebook ??'' }}" placeholder="https://..."  />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="">Twitter</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid twitter" name="twitter" id="twitter_error" value="{{ $sociallinkData->twitter ??'' }}" placeholder="https://..."  />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="">Instagram</span>
                     <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                     <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                  </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid instagram" name="instagram" id="instagram_error" value="{{ $sociallinkData->instagram ??'' }}" placeholder="https://..." />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="">GitHub</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid github" name="github" id="github_error" value="{{ $sociallinkData->github ??'' }}" placeholder="https://..."   />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="">You Tube</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid youtube" name="youtube" id="youtube_error" value="{{ $sociallinkData->youtube ??'' }}" placeholder="https://..."   />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="">WhatsApp</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid whatsapp" name="whatsapp" id="whatsapp_error" value="{{ $sociallinkData->whatsapp ??'' }}" placeholder="https://..."   />
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">{{config('FormField.cancel_button')}}</button>
                        <button type="submit" data-kt-settings-type="submit" id="kt_coreWebsiteSetting_submit3" class="btn btn-primary submit-coreWebsiteSetting-btn3">
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
         @endif
      </div>
   </div>
@endsection