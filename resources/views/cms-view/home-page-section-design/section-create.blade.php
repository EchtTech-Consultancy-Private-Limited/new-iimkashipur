<div class="modal fade" id="kt_modal_add_newsectionAdd" tabindex="-1" aria-hidden="true">
   <!--begin::Modal dialog-->
   <div class="modal-dialog modal-dialog-centered mw-650px">
      <!--begin::Modal content-->
      <div class="modal-content">
         <!--begin::Modal header-->
         <div class="modal-header" id="kt_modal_add_user_header">
            <!--begin::Modal title-->
            <h2 class="fw-bold">Add</h2>
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
            <form id="kt_newSection_add_form" class="form" enctype="multipart/form-data">
               <!--begin::Scroll-->
               <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Section Name (In English)</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="text" name="section_name_en" class="form-control form-control-solid mb-3 mb-lg-0 section_name_en" id="section_name_en" placeholder="section name english.." value="" />
                    </div>
                     <!--end::Input-->
                  </div>
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Section Name (In Hindi)</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="text" name="section_name_hi" class="form-control form-control-solid mb-3 mb-lg-0 section_name_hi" id="section_name_hi" placeholder="section name hindi.." value="" />
                    </div>
                     <!--end::Input-->
                  </div>
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Short Order</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="number" name="sort_order" class="form-control form-control-solid mb-3 mb-lg-0 sort_order" id="sort_order" placeholder="Sort Order" value="" />
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
                  <button type="submit" id="kt_add_newSection_submit" class="btn btn-primary submit-newSection-btn" data-kt-users-modal-action="submit">
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