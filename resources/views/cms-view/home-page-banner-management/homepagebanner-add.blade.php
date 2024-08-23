@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Home Banner Create')}}
@endsection
@section('pageTitle')
 {{ __('Home Page Banner') }}
@endsection
@section('breadcrumbs')
 {{ __('Home Page Banner Create') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/homepagebanner-add.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
   @if($textMessage =='')
   <!--begin::Card body-->
   <div class="card-body">
      <!--begin::Form-->
      <form id="kt_banner_add_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
         <!--begin::Main column-->
         <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <!--end:::Tabs-->
            <!--begin::Tab content-->
            <div class="tab-content">
               <!--begin::Tab pane-->
               <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                  <div class="d-flex flex-column gap-7 gap-lg-10">
                     <!--begin::General options-->
                     <div class="card card-flush py-4">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                        <div class="fv-row mb-10">
                              <!--begin::Label-->
                              <label class="fs-6 fw-semibold mb-2">
                                 Tab Type
                                 <span class="ms-1"  data-bs-toggle="tooltip" title="Select a discount type that will be applied to this product" >
                                 <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                              </label>
                              <!--End::Label-->
                              <!--begin::Row-->
                              <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                 <!--begin::Col-->
                                 <div class="col">
                                    <!--begin::Option-->
                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                                       <!--begin::Radio-->
                                       <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                       <input class="form-check-input" type="radio" name="tabtype" value="0" checked="checked" />
                                       </span>
                                       <!--end::Radio-->
                                       <!--begin::Info-->
                                       <span class="ms-5">
                                       <span class="fs-4 fw-bold text-gray-800 d-block">Open Internal Tab
                                       <div class="text-muted fs-7">Page Will Be Open Same Tab.</div>
                                       </span>
                                       </span>
                                       <!--end::Info-->
                                    </label>
                                    <!--end::Option-->
                                 </div>
                                 <!--end::Col-->
                                 <!--begin::Col-->
                                 <div class="col">
                                    <!--begin::Option-->
                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                       <!--begin::Radio-->
                                       <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                       <input class="form-check-input" type="radio" name="tabtype" value="1" />
                                       </span>
                                       <!--end::Radio-->
                                       <!--begin::Info-->
                                       <span class="ms-5">
                                          <span class="fs-4 fw-bold text-gray-800 d-block">Open External Tab
                                             <div class="text-muted fs-7">Page Will Be Open Next Tab.</div>
                                          </span>
                                       </span>
                                       <!--end::Info-->
                                    </label>
                                    <!--end::Option-->
                                 </div>
                                 <!--end::Col-->
                              </div>
                              <!--end::Row-->
                           </div>
                           <!--begin::Input group-->
                           <div class="mb-10 fv-row">
                              <!--begin::Label-->
                              <label class="required form-label required">Title Name (In English)</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <div class="col-md-12">
                                 <input type="text" name="title_name_en" class="form-control mb-2 title_name_en" id="title_name_en" placeholder="Title name" value="" />
                              </div>
                                 <!--end::Input-->
                              <!--begin::Description-->
                              <div class="text-muted fs-7">A title name is required and recommended to be unique.</div>
                              <!--end::Description-->
                           </div>
                           <div class="mb-10 fv-row mt-2">
                              <!--begin::Label-->
                              <label class="required form-label">शीर्षक नाम (हिन्दी में)</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <div class="col-md-12">
                              <input type="text" name="title_name_hi" class="form-control mb-2 title_name_hi" id="title_name_hi" placeholder="Title name" value="" />
                           </div>
                              <!--end::Input-->
                              <!--begin::Description-->
                              <div class="text-muted fs-7">A title name is required and recommended to be unique.</div>
                              <!--end::Description-->
                           </div>
                           <!--end::Input group-->
                           <!--begin::Input group-->
                           <div>
                              <!--begin::Label-->
                              <label class="form-label required">Description (English)</label>
                              <!--end::Label-->
                              <!--begin::Editor-->
                                 <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en"></div>
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
                                 <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi"></div>
                              <!--end::Editor-->
                              <!--begin::Description-->
                              <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                              <!--end::Description-->
                           </div>
                           <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                     </div>
                     <!--end::General options-->
                     <!--begin::Pricing-->
                     <div class="card card-flush py-4">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                           <!--begin::Input group-->
                        <!--begin::News-->
                        <div class="card-header">
                           <div class="card-title">
                              <h2>Add New Banner</h2>
                           </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                           <!--begin::Input group-->
                           <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                              <!--begin::Repeater-->
                              <div id="kt_tender_add_multiple_options">
                                 <!--begin::Form group-->
                                 <div class="form-group">
                                    <div data-repeater-list="kt_tender_add_multiple_options" class="d-flex flex-column gap-3">
                                       <div data-repeater-item class="form-group row">
                                          <!--begin::Input-->
                                          <div class="col-md-4">
                                          <label class="required form-label mw-100 w-100">Banner Title</label>
                                             <input type="text" class="form-control mw-100 w-100" name="bannertitle" placeholder="banner title Name" />
                                          </div>
                                          <div class="col-md-4">
                                          <label class="required form-label mw-100 w-100">Sort Order</label>
                                             <input type="number" class="form-control mw-100 w-100" name="sort_order" placeholder="sort order" />
                                          </div>
                                          <div class="col-md-4">
                                          <label class="required form-label mw-100 w-100">Image Format ({{ env('BANNER_WIDTH').'px'??'1900px' }} * {{ env('BANNER_HEIGHT').'px'??'500px' }})</label>
                                          <input type="file" class="form-control mw-100 w-100 image" id="image" name="image" accept="image/*" />
                                          <!--end::Input-->
                                          <!-- <button type="button" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                             <i class="ki-outline ki-cross fs-1"></i> </button> -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!--end::Form group-->
                                 <!--begin::Form group-->
                                 <!-- <div class="form-group mt-5">
                                    <button type="button" data-repeater-create class="btn btn-sm btn-light-primary">
                                    <i class="ki-outline ki-plus fs-2"></i> Add Another Tender
                                    </button>
                                 </div> -->
                                 <!--end::Form group-->
                              </div>
                              <!--end::Repeater-->
                           </div>
                           <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                     
                        <!--end::Variations-->
                        </div>
                        <!--end::Card header-->
                     </div>
                     <!--end::Pricing-->
                  </div>
               </div>
               <!--end::Tab pane-->
            
            </div>
            <!--end::Tab content-->
            <div class="d-flex justify-content-end">
               <!--begin::Button-->
               <button type="reset" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                  {{config('FormField.cancel_button')}}
               </button>
               <!--end::Button-->
               <!--begin::Button-->
               <button type="submit" id="kt_add_banner_submit" class="btn btn-primary submit-banner-btn">
               <span class="indicator-label">
               {{config('FormField.save_button')}}
               </span>
               <span class="indicator-progress">
               Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
               </span>
               </button>
               <!--end::Button-->
            </div>
         </div>
         <!--end::Main column-->
      </form>
      <!--end::Form-->
   </div>
   @else
      {!! $textMessage !!}
     <div class="symbol symbol-100px text-center"> <img class="" src='{{ asset(config("constants.error.error_image")) }}' /></div>
   @endif
</div>
@endsection