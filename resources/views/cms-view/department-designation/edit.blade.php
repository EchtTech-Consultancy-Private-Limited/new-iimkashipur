@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('Department & Designation')}}
@endsection
@section('pageTitle')
{{ __('Department & Designation') }}
@endsection
@section('breadcrumbs')
{{ __('Department & Designation Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/department-designation-page-edit.js') }}"></script>
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
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab" href="#kt_department_settings_general_btn" id="edit">
            <i class="ki-outline ki-home fs-2 me-2"></i> Update Department/Designation
            </a>
         </li>
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent">
         <!--begin:::Tab pane-->
         <div class="tab-pane fade show active" id="kt_department_settings_general_btn" role="tabpanel">
            <!--begin::Form-->
            <form class="forms-sample row col-md-12" id="kt_departmentEdit_settings_general" enctype="multipart/form-data">
               @csrf
               @if(isset($type) && $type == 'designation')
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Select Department</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Require Department .." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <select class="form-select form-select-solid deprt_id" name="deprt_id" id="deprt_id" data-control="select2" data-placeholder="Select an option">
                        <option></option>
                        @foreach($department as $departments)
                           @if($departments->uid == $data->parent_id)
                              <option value="{{ $departments->uid }}" selected>{{ $departments->name_en  }}</option>
                           @else
                              <option value="{{ $departments->uid }}">{{ $departments->name_en  }}</option>
                           @endif
                        @endforeach
                     </select>
                  </div>
               </div>
               <!--end::Input group-->
               @endif
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Department OR Designation Name (In English)</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Require Department Name." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid departmentName" value="{{ $data->name_en }}" name="departmentName" id="departmentName" />
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Department OR Designation Name (In Hindi)</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Require Department Name." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid departmentName_hi" value="{{ $data->name_hi }}" name="departmentName_hi" id="departmentName_hi" />
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">{{config('FormField.cancel_button')}}</button>
                        <button type="submit" data-kt-settings-type="submit" id="kt_departmentEdit_submit" class="btn btn-primary submit-departmentEdit-btn">
                        <span class="indicator-label">{{config('FormField.save_button')}}</span>
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
         <!--end:::Tab pane-->
      </div>
      <!--end:::Tab content-->
   </div>
   <!--end::Card body-->
</div>
@endsection