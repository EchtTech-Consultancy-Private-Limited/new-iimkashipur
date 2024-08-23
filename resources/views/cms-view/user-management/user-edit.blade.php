@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('User')}}
@endsection
@section('pageTitle')
{{ __('User') }}
@endsection
@section('breadcrumbs')
{{ __('User Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/user-edit.js') }}"></script>
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
         <form id="kt_modal_edit_user_form" class="form" method="post">
               <!--begin::Scroll-->
               <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                     <!--end::Label-->
                     <!--begin::Image placeholder-->
                     <style>
                        .image-input-placeholder {
                        background-image: url('{{ asset("assets-cms/media/svg/files/blank-image.svg") }}');
                        }
                        [data-bs-theme="dark"] .image-input-placeholder {
                        background-image: url('{{ asset("assets-cms/media/svg/files/blank-image-dark.svg") }}');
                        }               
                     </style>
                     <!--end::Image placeholder-->
                     <!--begin::Image input-->
                     <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('resources/uploads/userImage/'.$data->avatar) }});"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                           <i class="ki-outline ki-pencil fs-7"></i>
                           <!--begin::Inputs-->
                           <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                           <input type="hidden" name="avatar_remove" />
                           <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                           <i class="ki-outline ki-cross fs-2"></i> 
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                           <i class="ki-outline ki-cross fs-2"></i>                                
                        </span>
                        <!--end::Remove-->
                     </div>
                     <!--end::Image input-->
                     <!--begin::Hint-->
                     <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                     <!--end::Hint-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0 user_name" id="user_name" placeholder="Full name" value="{{ $data->name }}" />
                     </div>
                     <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Email</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0 user_email" placeholder="example@domain.com" id="user_email" value="{{ $data->email }}" />
                     </div>
                     <!--end::Input-->
                  </div>
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Password</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0 password" placeholder="Password" id="password" value="" />
                     </div>
                     <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-5">Please Select Role</label>
                     <!--end::Label-->
                     <!--begin::Roles-->
                     <!--begin::Input row-->
                     @foreach($roleType as $roleTypes)
                     <div class="col-md-12">
                        <div class="d-flex fv-row">
                           <!--begin::Radio-->
                              <div class="form-check form-check-custom form-check-solid">
                                 <!--begin::Input-->
                                 @if($data->role_id == $roleTypes->uid)
                                    <input class="form-check-input me-3" name="user_role" type="radio" value="{{ $data->role_id }},{{ $data->role_name }}" id="kt_modal_update_role_option_{{ $roleTypes->uid }}" checked />
                                 @else
                                    <input class="form-check-input me-3" name="user_role" type="radio" value="{{ $roleTypes->uid }},{{ $roleTypes->role_type }}" id="kt_modal_update_role_option_{{ $roleTypes->uid }}" />
                                 @endif
                                 <!--end::Input-->
                                 <!--begin::Label-->
                                 <label class="form-check-label" for="kt_modal_update_role_option_{{ $roleTypes->uid }}">
                                    <div class="fw-bold text-gray-800">{{ $roleTypes->role_type }}</div>
                                    <div class="text-gray-600">Best for business owners and company administrators</div>
                                 </label>
                                 <!--end::Label-->
                              </div>
                           <!--end::Radio-->
                        </div>
                     </div>
                     <div class='separator separator-dashed my-5'></div>
                     @endforeach
                     <!--end::Input row-->
                     <!--end::Roles-->
                  </div>
                  <!--end::Input group-->
               </div>
               <!--end::Scroll-->
               <!--begin::Actions-->
               <div class="text-center pt-15">
                  <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                  {{config('FormField.cancel_button')}}
                  </button>
                  <button type="submit" id="kt_edit_user_submit" class="btn btn-primary submit-edit-btn" data-kt-users-modal-action="submit">
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