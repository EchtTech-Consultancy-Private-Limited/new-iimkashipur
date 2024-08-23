@extends('cms-view.layouts.main')
@section('title')
    {{__('Employee Directory Create')}}
@endsection
@section('pageTitle')
 {{ __('Employee Directory') }}
@endsection
@section('breadcrumbs')
 {{ __('Employee Directory Create') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/employee-directory-add.js') }}"></script>
<script src="{{ asset('public/filter-js/depart-designation.js') }}"></script>
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
      <form id="kt_EmployeeDirectory_add_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
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
                           </div>
                           <div class="fv-row mb-10">
                                <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Select Department</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control mb-2 deprt_id" name="deprt_id" id="deprt_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach($department as $departments)
                                                <option value="{{ $departments->uid }}">{{ $departments->name_en  }}</option>
                                            @endforeach
                                        </select><!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Select Designation</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control mb-2 designation_id" name="designation_id" id="designation_id" data-control="select2" data-placeholder="Select an option">
                                            <option></option>
                                            @foreach($designation as $departments)
                                                <option value="{{ $departments->uid }}">{{ $departments->name_en  }}</option>
                                            @endforeach
                                        </select><!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">First Name (English)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 fename" type="text" placeholder="Enter The First Name" name="fename" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Middle Name (English)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 mename" type="text" placeholder="Enter Middle Name" name="mename" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Last Name (English)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 lename" type="text" placeholder="Enter the last name" name="lename" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">प्रथम नाम (हिन्दी)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 fhname" type="text" placeholder="" name="fhname" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">मध्य नाम (हिन्दी)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 mhname" type="text" placeholder="" name="mhname" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">अंतिम नाम (हिन्दी)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 lhname" type="text" placeholder="" name="lhname" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Mobile Number</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 mobileno" type="text" placeholder="" name="mobileno" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Landline Number (Optional)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 landlineNo" type="text" placeholder="" name="landlineNo" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Extention Number (Optional)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 extentionNo" type="text" placeholder="" name="extentionNo" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Email</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 email" type="text" placeholder="" name="email" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Description (English)</label>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                            <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en"></div>
                                        <!--end::Editor-->
                                        <!--begin::Input-->
                                        <!-- <textarea class="form-control mb-2 description_e" type="text" placeholder="" name="description_e" value="" ></textarea> -->
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">विवरण (हिन्दी)</label>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                            <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi"></div>
                                        <!--end::Editor-->
                                        <!--begin::Input-->
                                        <!-- <textarea class="form-control mb-2 description_h" type="text" placeholder="" name="description_h" value="" ></textarea> -->
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row g-9 mb-7">
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Linked In</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 linkedin" type="url" placeholder="https?://.*" pattern="https?://.*" name="linkedin" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Facebook</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 facebook" type="url" placeholder="https?://.*" pattern="https?://.*" name="facebook" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Twitter</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 twitter" type="url" placeholder="https?://.*" pattern="https?://.*" name="twitter" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Instagram</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 instagram" type="url" placeholder="https?://.*" pattern="https?://.*" name="instagram" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-12 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Address/Place</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 short_order" type="text" placeholder="address..." name="address" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Date of Birth</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 short_order" type="date" placeholder="Number..." name="dob" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Date of Death</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 short_order" type="date" placeholder="Number..." name="dod" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Sort Order</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control mb-2 short_order" type="number" placeholder="Number..." name="short_order" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="d-block fw-semibold fs-6 mb-5">Profile</label>
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
                                    <!--end::Col-->
                                </div>
                            </div>
                        </div>
                        <!--end::Card header-->
                     </div>
                     <!--end::General options-->
                  </div>
               </div>
               <!--end::Tab pane-->
            </div>
            <!--end::Tab content-->
            <div class="d-flex justify-content-end">
               <!--begin::Button-->
               <a id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
               {{config('FormField.cancel_button')}}
               </a>
               <!--end::Button-->
               <!--begin::Button-->
               <button type="submit" id="kt_add_EmployeeDirectory_submit" class="btn btn-primary submit-EmployeeDirectory-btn">
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