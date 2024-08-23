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
<script src="{{ asset('public/form-js/gallery-management-video-edit.js') }}"></script>
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
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pageVideoGallery">
            <i class="ki-outline ki-youtube fs-2 me-2"></i>Video Gallery
            </a>
         </li>
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent">
         <!--begin:::Tab pane-->
         <div class="tab-pane fade show active" id="kt_settings_pageVideoGallery" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_video_edit_information_form" class="form check-file-mime">
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
                           <input type="text" name="title_name_en1" class="form-control mb-2 title_name_en1" id="title_name_en1" placeholder="Title name" value="{{$data->title_name_en}}" />
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
                           <input type="text" name="title_name_hi1" class="form-control mb-2 title_name_hi1" id="title_name_hi1" placeholder="Title name" value="{{$data->title_name_hi}}" />
                           <!--end::Input-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">A title name is required and recommended to be unique.</div>
                           <!--end::Description-->
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
                           <h2>Add Page Video Gallery</h2>
                        </div>
                     </div>
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                           <!--begin::Repeater-->
                           <div id="kt_video_add_multiple_options">
                              <!--begin::Form group-->
                              <div class="form-group">
                                 <div data-repeater-list="kt_video_add_multiple_options" class="d-flex flex-column gap-3">
                                 @if(isset($pdfData))
                                    @foreach($pdfData as $pdfDatas)
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                       <div>
                                          <input type="hidden" class="form-control mw-100 w-175px" name="uid" value="{{$pdfDatas->uid }}" />
                                          <label class="required form-label">Video Title</label>
                                          <input type="text" class="form-control mw-100 w-200px" name="videotitle" value="{{$pdfDatas->title}}" placeholder="video title Name" />
                                       </div>
                                       <div>
                                       <label class="required form-label">Start Date</label>
                                       <input type="date" class="form-control mw-100 w-200px" name="startdate" value="{{$pdfDatas->start_date}}" placeholder="" />
                                       </div>
                                       <div>
                                          <label class="required form-label">End Date</label>
                                          <input type="date" class="form-control mw-100 w-200px" name="enddate" value="{{$pdfDatas->end_date}}" placeholder="" />
                                       </div>
                                       <div>
                                          <label class="required form-label">Video Link</label>
                                          <input type="input" id="Video" class="form-control mw-100 w-200px" name="Video" value="{{$pdfDatas->public_url}}"  placeholder="video Link Name"  />
                                       </div>
                                       <button type="button" data-id="{{ $pdfDatas->uid }}" class="btn btn-sm btn-icon btn-light-danger delete-galleryvdo-record" title="Data Delete">
                                          <i class="ki-outline ki-trash fs-1"></i>
                                        </button>
                                        <button type="button" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                          <i class="ki-outline ki-cross fs-1"></i>
                                       </button>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="form-group">
                                       <div data-repeater-list="kt_video_add_multiple_options" class="d-flex flex-column gap-3">
                                          <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                          <!--begin::Input-->
                                          <div>
                                             <label class="required form-label">Video Title</label>
                                             <input type="text" class="form-control mw-100 w-200px" name="videotitle" placeholder="video title Name" />
                                          </div>
                                          <div>
                                          <label class="required form-label">Start Date</label>
                                          <input type="date" class="form-control mw-100 w-200px" name="startdate" placeholder="" />
                                          </div>
                                          <div>
                                             <label class="required form-label">End Date</label>
                                             <input type="date" class="form-control mw-100 w-200px" name="enddate" placeholder="" />
                                          </div>
                                          <div>
                                             <label class="required form-label">Video Link</label>
                                             <input type="input" id="Video" class="form-control mw-100 w-200px" name="Video"  placeholder="video Link Name"  />
                                          </div>
                                          
                                    </div>
                                    @endif
                                 </div>
                                  <!--begin::Form group-->
                                    <div class="form-group mt-5">
                                       <button type="button" data-repeater-create class="btn btn-sm btn-light-primary">
                                          <i class="ki-outline ki-plus fs-2"></i> Add More
                                       </button>
                                    </div>
                                    <!--end::Form group-->
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
                    <button type="submit" id="kt_edit_video_submit" class="btn btn-primary submit-edit-video-btn">
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