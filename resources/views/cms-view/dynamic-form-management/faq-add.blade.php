<div class="modal fade" id="kt_modal_add_faq" tabindex="-1" aria-hidden="true">
   <!--begin::Modal dialog-->
   <div class="modal-dialog modal-dialog-centered mw-650px">
      <!--begin::Modal content-->
      <div class="modal-content">
         <!--begin::Modal header-->
         <div class="modal-header" id="kt_modal_add_user_header">
            <!--begin::Modal title-->
            <h2 class="fw-bold">Add FAQ</h2>
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
            <form id="kt_faq_add_form" class="form">
               <!--begin::Scroll-->
               <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">Question (English)</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="text" name="question_en" class="form-control form-control-solid mb-3 mb-lg-0 question_en" id="question_en" placeholder="Question name" value="" />
                    </div>
                     <!--end::Input-->
                  </div>
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="required fw-semibold fs-6 mb-2">सवाल (हिन्दी में)</label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <div class="col-md-12">
                        <input type="text" name="question_hi" class="form-control form-control-solid mb-3 mb-lg-0 question_hi" id="question_hi" placeholder="सवाल नाम" value="" />
                     </div>
                     <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <div>
                        <!--begin::Label-->
                        <label class="form-label required">Answer (English)</label>
                        <!--end::Label-->
                        <!--begin::Editor-->
                            <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en"></div>
                        <!--end::Editor-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Set a Answer to the news for better visibility.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                        <!--begin::Input group-->
                        <div>
                        <!--begin::Label-->
                        <label class="form-label mt-8">उत्तर (हिन्दी में)</label>
                        <!--end::Label-->
                        <!--begin::Editor-->
                            <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi"></div>
                        <!--end::Editor-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Set a Answer to the Answer for better visibility.</div>
                        <!--end::Description-->
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
                  <button type="submit" id="kt_add_faq_submit" class="btn btn-primary submit-faq-btn" data-kt-users-modal-action="submit">
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