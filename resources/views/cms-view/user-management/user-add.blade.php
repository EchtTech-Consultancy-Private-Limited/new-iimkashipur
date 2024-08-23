<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
   <!--begin::Modal dialog-->
   <div class="modal-dialog modal-dialog-centered mw-850px">
      <!--begin::Modal content-->
      <div class="modal-content">
         <!--begin::Modal header-->
         <div class="modal-header" id="kt_modal_add_user_header">
            <!--begin::Modal title-->
            <h2 class="fw-bold">Add User</h2>
            <!--end::Modal title-->
            <!--begin::Close-->
            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
               <i class="ki-outline ki-cross fs-1"></i>                
            </div>
            <!--end::Close-->
         </div>
         <!--end::Modal header-->
         <!--begin::Modal body-->
         <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form id="kt_modal_add_user_form" class="form">
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
                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('assets-cms/media/avatars/300-6.jpg') }});"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change">
                           <i class="ki-outline ki-pencil fs-7"></i>
                           <!--begin::Inputs-->
                           <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                           <input type="hidden" name="avatar_remove" />
                           <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel">
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
                     <div class="fw-semibold fs-6 mt-2">Allowed file types: png, jpg, jpeg.</div>
                     <!--end::Hint-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-7 px-2">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12 ">
                        <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0 user_name" id="user_name" placeholder="Full name" value="" />
                     </div>
                     <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-7 px-2">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Email</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0 user_email" placeholder="example@domain.com" id="user_email" value="" />
                     </div>
                     <!--end::Input-->
                  </div>
                  <div class="fv-row mb-7 px-2">
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
                                 <input class="form-check-input me-3" name="user_role" type="radio" value="{{ $roleTypes->uid }},{{ $roleTypes->role_type }}" id="kt_modal_update_role_option_{{ $roleTypes->uid }}" />
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
                  <button type="submit" id="kt_add_user_submit" class="btn btn-primary submit-user-btn" data-kt-users-modal-action="submit">
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
         <!--end::Modal body-->
      </div>
      <!--end::Modal content-->
   </div>
   <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->        