@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('New Role')}}
@endsection
@section('pageTitle')
{{ __('New Role') }}
@endsection
@section('breadcrumbs')
{{ __('New Role Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/new-role-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
   <div class="card-body">
      <!--begin:::Tabs-->
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent" data-select2-id="select2-data-myTabContent">
         <!--begin:::Tab pane-->
         <div class="tab-pane fade active show" id="Create_Menu" role="tabpanel" data-select2-id="select2-data-kt_ecommerce_settings_general">
         <form id="kt_modal_edit_newrole_form" class="form" method="post">
               <!--begin::Scroll-->
               <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Role Name</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="text" name="role_type" class="form-control form-control-solid mb-3 mb-lg-0 role_type" id="role_type" placeholder="role name" value="{{ $data->role_type ??'' }}" />
                     </div>
                     <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Sort Order</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="number" name="sort_order" class="form-control form-control-solid mb-3 mb-lg-0 sort_order" placeholder="order no" id="sort_order" value="{{ $data->sort_order ??'' }}" />
                     </div>
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Scroll-->
               <!--begin::Actions-->
               <div class="text-center pt-15">
                  <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                  {{config('FormField.cancel_button')}}
                  </button>
                  <button type="submit" id="kt_edit_newrole_submit" class="btn btn-primary submit-newrole-btn" data-kt-users-modal-action="submit">
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

         </div>
      </div>
      <!--end:::Tab content-->
   </div>
</div>
@endsection