@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('Website Core Setting')}}
@endsection
@section('pageTitle')
{{ __('Website Core Setting') }}
@endsection
@section('breadcrumbs')
{{ __('Advertising Popup Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/websitepopupadvertising-edit.js') }}"></script>
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
         @if(isset($popupAdvertising) && $popupAdvertising !='')
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab" href="#kt_popupadvertising_settings">
               <i class="ki-outline ki-abstract-39 fs-2 me-2"></i> Advertising Popup Edit
            </a>
         </li>
         @endif
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent">
         <!--begin:::Tab pane-->
         @if(isset($popupAdvertising) && $popupAdvertising !='')
         <div class="tab-pane fade show active" id="kt_popupadvertising_settings" role="tabpanel">
            <!--begin::Form-->
            <form class="forms-sample row col-md-12" id="kt_popupadvertising_update_form" enctype="multipart/form-data">
               @csrf
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Title</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid popupadvertising_title" name="popupadvertising_title" id="popupadvertising_title" value="{{$popupAdvertising->title_name_en }}" />
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Image (jpg/jpeg/png/gif)</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set keywords for the store separated by a comma." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>           
                      </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="file" class="form-control form-control-solid popupadvertising_file" name="popupadvertising_file" id="popupadvertising_file" accept="image/*" />
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Select From Date & TO Date</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set keywords for the store separated by a comma." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>           
                      </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-3">
                     <!--begin::Input-->
                     <input type="date" class="form-control form-control-solid popupadvertising_from" name="popupadvertising_from" id="popupadvertising_from" value="{{$popupAdvertising->start_date}}" />
                     <!--end::Input-->
                  </div>
                  <div class="col-md-3">
                     <!--begin::Input-->
                     <input type="date" class="form-control form-control-solid popupadvertising_to" name="popupadvertising_to" id="popupadvertising_to" value="{{$popupAdvertising->end_date}}" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Old Logo</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set keywords for the store separated by a comma." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>           
                      </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                              <!--begin::Preview existing avatar-->
                              <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('resources/uploads/popupadvertising/') }}/<?php echo $popupAdvertising->images ?>);"></div>
                              <!--end::Preview existing avatar-->
                              <!--begin::Label-->
                              <!-- <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar"> -->
                              <!-- <i class="ki-outline ki-pencil fs-7"></i> -->
                              <!--begin::Inputs-->
                              <!-- <input type="file" name="avatar" accept=".png, .jpg, .jpeg" /> -->
                              <input type="hidden" name="avatar_remove" />
                              <!--end::Inputs-->
                              </label>
                              <!--end::Label-->
                              <!--begin::Cancel-->
                              <!-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar"> -->
                              <!-- <i class="ki-outline ki-cross fs-2"></i>  -->
                              </span>
                              <!--end::Cancel-->
                              <!--begin::Remove-->
                              <!-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar"> -->
                              <!-- <i class="ki-outline ki-cross fs-2"></i>                                 -->
                              </span>
                              <!--end::Remove-->
                           </div>
                           <!--end::Image input-->
                           <!--begin::Hint-->
                           <!-- <div class="form-text">Allowed file types: png, jpg, jpeg.</div> -->
                           <!--end::Hint-->
                     </div>
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        {{config('FormField.cancel_button')}}</button>
                        <button type="submit" data-kt-settings-type="submit" id="kt_popupadvertising_update" class="btn btn-primary update-popupadvertising-btn">
                        <span class="indicator-label">
                        {{config('FormField.save_button')}}</span>
                        <span class="indicator-progress">
                           Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
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