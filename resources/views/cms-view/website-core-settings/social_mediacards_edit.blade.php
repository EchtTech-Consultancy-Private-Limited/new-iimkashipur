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
<script src="{{ asset('public/form-js/websiteSocialMediaCards-edit.js') }}"></script>
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
         @if(isset($socialmediacard) && $socialmediacard !='')
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_social_link_settings">
               <i class="ki-outline ki-abstract-39 fs-2 me-2"></i>  Social Media 
            </a>
         </li>
         @endif
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent">
         <!--begin:::Tab pane-->
         @if(isset($socialmediacard) && $socialmediacard !='')
         <div class="tab-pane fade show active" id="kt_social_media_settings" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_social_media_update_form" class="form" method="POST" enctype="multipart/form-data">
               @csrf
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
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid linkedin_enbed" name="linkedin_enbed" id="linkedin_error" value="{{ $socialmediacard->linkedin ??'' }}" placeholder="https://..."  />
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
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid facebook_enbed" name="facebook_enbed" id="facebook_error" value="{{ $socialmediacard->facebook ??'' }}" placeholder="https://..."  />
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
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid twitter_enbed" name="twitter_enbed" id="twitter_error" value="{{ $socialmediacard->twitter ??'' }}" placeholder="https://..."  />
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
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid instagram_enbed" name="instagram_enbed" id="instagram_error" value="{{ $socialmediacard->instagram ??'' }}" placeholder="https://..." />
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
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid youtube_enbed" name="youtube_enbed" id="youtube_error" value="{{ $socialmediacard->youtube ??'' }}" placeholder="https://..."   />
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
                        <button type="submit" data-kt-settings-type="submit" id="kt_coreWebsiteSetting_submit4" class="btn btn-primary submit-coreWebsiteSetting-btn4">
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