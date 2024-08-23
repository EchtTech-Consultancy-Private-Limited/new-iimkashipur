@extends('cms-view.layouts.main')
@section('title')
    @parent
     {{__('Gallery')}}
@endsection
@section('pageTitle')
 {{ __('Gallery') }}
@endsection
@section('breadcrumbs')
 {{ __('Gallery Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/gallery-management-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
   @if($textMessage =='')
   <!--begin::Card body-->
   <div class="card-body">
      <!--begin:::Tabs-->
      <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pagePhotoGallery">
            <i class="ki-outline ki-picture fs-2 me-2"></i> Photo Gallery
            </a>
         </li>
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent">
         <!--begin:::Tab pane-->
         <div class="tab-pane fade show active" id="kt_settings_pagePhotoGallery" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_photo_information_form" class="form check-file-mime">
               <!--begin::Input group-->
               <div class="card card-flush py-4">
                  <div class="card-body pt-0">
                     <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                              <!--begin::Label-->
                              <label class="required form-label required">Title Name (In English)</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <div class="col-md-12">
                              <input type="text" name="title_name_en" class="form-control mb-2 title_name_en" id="title_name_en" placeholder="Title name" value="{{$data->title_name_en??'' }}" />
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
                              <input type="text" name="title_name_hi" class="form-control mb-2 title_name_hi" id="title_name_hi" placeholder="Title name" value="{{$data->title_name_hi??'' }}" />
                              <!--end::Input-->
                              <!--begin::Description-->
                              <div class="text-muted fs-7">A title name is required and recommended to be unique.</div>
                              <!--end::Description-->
                           </div>
                           <div class="mb-10 fv-row mt-2">
                              <!--begin::Label-->
                              <label class="form-label">Select Year</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <select class="form-select form-select-solid gallery_year" name="gallery_year" id="gallery_year" data-control="select2" data-placeholder="Select an option">
                                 <option></option>
                                    @foreach($years as $v)
                                    @if($v == $data->year)
                                       <option value="{{$v}}" selected>{{$v}}</option>
                                    @else
                                       <option value="{{$v}}">{{$v}}</option>
                                    @endif
                                    @endforeach
                              </select>
                              <!--end::Input-->
                           </div>
                     </div>
                  </div>
               </div>
                <!--begin::Pricing-->
                  <div class="card card-flush py-4">
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                     <!--begin::Input group-->
                     <!--begin::News-->
                     <div class="card-header">
                        <div class="card-title">
                           <h2>Add Page Photo Gallery</h2>
                        </div>
                     </div>
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                           <!--begin::Repeater-->
                           <div id="kt_photo_add_multiple_options">
                              <!--begin::Form group-->
                              <div class="form-group">
                                 
                                 <div data-repeater-list="kt_photo_add_multiple_options" class="d-flex flex-column gap-3">
                                 @if(isset($pdfData))
                                    @foreach($pdfData as $pdfDatas)
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                       <div>
                                          <input type="hidden" class="form-control mw-100 w-175px" name="uid" value="{{$pdfDatas->uid }}" />
                                          <label class="required form-label mw-100 w-200px">Image Title</label>
                                          <input type="text" class="form-control mw-100 w-200px" name="imagetitle" value="{{$pdfDatas->title}}" placeholder="image title Name" />
                                       </div>
                                       <div>
                                          <label class="required form-label mw-100 w-200px">Start Date</label>
                                          <input type="date" class="form-control mw-100 w-200px" name="startdate" value="{{$pdfDatas->start_date}}" placeholder="" />
                                       </div>
                                       <div>
                                          <label class="required form-label mw-100 w-200px" style="margin-left: 12px;">End Date</label>
                                          <input type="date" class="form-control mw-100 w-200px" name="enddate" value="{{$pdfDatas->end_date}}" placeholder="" />
                                       </div>
                                       <div>
                                          <label class="required form-label mw-100 w-200px">Image Format</label>
                                          <input type="file" id="image" data-id="1" name="image" class="form-control mw-100 w-200px checkmime" accept="image/*"  />
                                       </div>
                                       <div class="mt-8">
                                          <span class="ms-1" data-bs-toggle="tooltip" aria-label="on selected position" data-bs-original-title="selected position" data-kt-initialized="1">
                                             <i class="ki-outline ki-information fs-7"></i>                            
                                          </span>
                                          <input type="checkbox" name="showhomepage" value="1" class="form-check-input showhomepage" @php if($pdfDatas->img_show_home == 1){ echo "checked"; } else { echo ''; } @endphp>
                                       </div>
                                       <!--end::Input-->
                                       <button type="button" id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                             <i class="ki-outline ki-cross fs-1"></i> 
                                          </button>
                                          <a href="{{ asset('resources/uploads/GalleryManagement/'.$pdfDatas->public_url) }}" target="_blank" download>
                                             <i class="ki-outline ki-file fs-1"></i>
                                          </a>
                                        <button type="button" data-id="{{ $pdfDatas->uid }}" class="btn btn-sm btn-icon btn-light-danger delete-galleryImg-record" title="Data Delete">
                                          <i class="ki-outline ki-trash fs-1"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                       @else
                                       <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                          <!--begin::Input-->
                                          <input type="text" class="form-control mw-100 w-200px" name="imagetitle" placeholder="image title Name" />
                                          <input type="date" class="form-control mw-100 w-200px" name="startdate" placeholder="" />
                                          <input type="date" class="form-control mw-100 w-200px" name="enddate" placeholder="" />
                                          <input type="file" id="image" data-id="1" name="image" class="form-control mw-100 w-200px checkmime" accept="image/*"  />
                                          <div class="mt-8">
                                          <span class="ms-1" data-bs-toggle="tooltip" aria-label="on selected position" data-bs-original-title="selected position" data-kt-initialized="1">
                                             <i class="ki-outline ki-information fs-7"></i>                            
                                             </span>
                                             <input type="checkbox" name="showhomepage" value="1" class="form-check-input showhomepage">
                                          </div>
                                          <!--end::Input-->
                                          <button type="button" id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                             <i class="ki-outline ki-cross fs-1"></i>
                                          </button>
                                       </div>
                                       @endif
                                 </div>
                              </div>
                              <!--end::Form group-->
                              <!--begin::Form group-->
                              <div class="form-group mt-5">
                                 <button type="button" data-repeater-create class="btn btn-sm btn-light-primary">
                                    <i class="ki-outline ki-plus fs-2"></i> Add More
                                 </button>
                              </div>
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
               <!--end::Input group-->
               <!--begin::Action buttons-->
               <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                     <button type="reset" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                        {{config('FormField.cancel_button')}}
                     </button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_edit_photo_submit" class="btn btn-primary submit-photo-btn">
                    <span class="indicator-label">
                    {{config('FormField.save_button')}}
                    </span>
                    <span class="indicator-progress">
                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    </button>
                    <!--end::Button-->
                </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
      </div>
      <!--end:::Tab content-->
      </div>
   @else
      {!! $textMessage !!}
     <div class="symbol symbol-100px text-center"> <img class="" src='{{ asset(config("constants.error.error_image")) }}' /></div>
   @endif
   </div>
@endsection