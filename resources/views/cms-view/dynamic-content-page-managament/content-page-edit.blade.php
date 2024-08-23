@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Dashboard')}}
@endsection
@section('pageTitle')
 {{ __('Content Edit') }}
@endsection
@section('breadcrumbs')
 {{ __('Content Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/content-page-edit.js') }}"></script>
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
            <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab" href="#kt_settings_basicInformation">
            <i class="ki-outline ki-home fs-2 me-2"></i> Basic Information
            </a>
         </li>
         <!--end:::Tab item-->
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pageContent">
            <i class="ki-outline ki-shop fs-2 me-2"></i> Page Content
            </a>
         </li>
         <!--end:::Tab item-->
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pageGallery">
            <i class="ki-outline ki-compass fs-2 me-2"></i> Page Gallery
            </a>
         </li>
         <!--end:::Tab item-->
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pagePdf">
            <i class="ki-outline ki-package fs-2 me-2"></i> Page PDF
            </a>
         </li>
         <!--end:::Tab item-->
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pageBanner">
            <i class="ki-outline ki-package fs-2 me-2"></i> Page Banner
            </a>
         </li>
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent">
         <!--begin:::Tab pane-->
         <div class="tab-pane fade show active" id="kt_settings_basicInformation" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_basic_information_form" class="form">
               <!--begin::Heading-->
               <!-- <div class="row mb-7">
                  <div class="col-md-7 offset-md-3">
                     <h2>Basic Information</h2>
                  </div>
               </div> -->
               <!--end::Heading-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Select Menu</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <?php //dd($data->pageContent[0]->pageTitle->page_title_en); ?>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <select class="form-select form-select-solid menu_id" name="menu_id" id="menu_id" data-control="select2" data-placeholder="Select an page title">
                           <option></option>
                           @foreach($menuName as $exitMenu)
                                 @if($exitMenu->uid == $data->pageContent[0]->pageTitle->menu_uid)
                                    <option value="{{ $exitMenu->uid }},{{$exitMenu->url }}" selected>{{ $exitMenu->name_en  }} ({{ $exitMenu->name_hi   }})</option>
                                 @else
                                    <option value="{{ $exitMenu->uid }},{{$exitMenu->url }}">{{ $exitMenu->name_en  }} ({{ $exitMenu->name_hi   }})</option>
                                 @endif
                           @endforeach
                        </select>
                     <!--end::Input-->
                  </div>
               </div>
               
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Page Title (English)</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid page_title_en" id="page_title_en" name="page_title_en" value="{{$data->pageContent[0]->pageTitle->page_title_en}}" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">पृष्ठ का शीर्षक (हिन्दी में)</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid page_title_hi" id="page_title_hi" name="page_title_hi" value="{{$data->pageContent[0]->pageTitle->page_title_hi}}" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Meta Title</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid meta_title" id="meta_title" name="meta_title" value="{{$data->pageContent[0]->pageTitle->meta_title}}" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Meta Tag</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid meta_tag" id="meta_tag" name="meta_tag" value="{{$data->pageContent[0]->pageTitle->meta_tag}}" />
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Meta Tag Description</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the description of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>     
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <textarea class="form-control form-control-solid" name="meta_description">{{$data->pageContent[0]->pageTitle->meta_tag_description}}</textarea>
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Meta Keywords</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set keywords for the store separated by a comma." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>           
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid" name="meta_keywords" value="{{$data->pageContent[0]->pageTitle->meta_keywords}}" data-kt-ecommerce-settings-type="tagify" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Short Order</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set keywords for the store separated by a comma." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>           
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="number" class="form-control form-control-solid" name="sort_order" value="{{$data->pageContent[0]->pageTitle->sort_order}}" data-kt-ecommerce-settings-type="tagify" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="">Custom URL</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set keywords for the store separated by a comma." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>           
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-7">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid" name="custom_url" value="{{$data->pageContent[0]->pageTitle->custom_slug}}" data-kt-ecommerce-settings-type="tagify" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        {{config('FormField.cancel_button')}}
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_basicInformation_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-basicInfo-btn">
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
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
         <!--begin:::Tab pane-->
         <div class="tab-pane fade" id="kt_settings_pageContent" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_page_content_form" class="form">
               <!--begin::Input group-->
               <div class="card card-flush py-4">
                  <div class="card-body pt-0">
                     <div class="card-body pt-0">
                        <div class="col-md-12">
                           <label class="required form-label">Select Page TItle</label>
                           <select class="form-select form-select-solid pageTitle_id" name="pageTitle_id" id="pageTitle_id" data-control="select2" data-placeholder="Select an page title">
                              <option></option>
                              @foreach($pageTitle as $pageTitles)
                                 @if($pageTitles->uid == $data->pageContent[0]->pageTitle->uid)
                                 <option value="{{ $pageTitles->uid }}" selected>{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})</option>
                                 @else
                                 <option value="{{ $pageTitles->uid }}">{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})</option>
                                 @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <!--begin::Input group-->
                     <!--begin::News-->
                     <!-- <div class="card-header">
                        <div class="card-title">
                           <h2>Add Page Content</h2>
                        </div>
                     </div> -->
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                     <div>
                           <!--begin::Label-->
                           <label class="form-label required">Description (English)</label>
                           <!--end::Label-->
                           <!--begin::Editor-->
                              <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en">{!! $data->pageContent[0]->content_page[0]->page_content_en ?? '' !!}</div>
                           <!--end::Editor-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                           <!--end::Description-->
                        </div>
                        <div>
                           <!--begin::Label-->
                           <label class="form-label mt-8">विवरण (हिन्दी में)</label>
                           <!--end::Label-->
                           <!--begin::Editor-->
                              <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi">{!! $data->pageContent[0]->content_page[0]->page_content_hi ?? '' !!}</div>
                           <!--end::Editor-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                           <!--end::Description-->
                        </div>
                     </div>
                     <!--end::Card header-->
                  
                     <!--end::Variations-->
                     </div>
                     <!--end::Card header-->
                  </div>
                  <!--end::Pricing-->
               <!--end::Input group-->
               <!--begin::Action buttons-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        {{config('FormField.cancel_button')}}
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_pagecontent_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-contentpage-btn">
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
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
         <!--begin:::Tab pane-->
         <div class="tab-pane fade" id="kt_settings_pageGallery" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_page_gallery_form" class="form">
               <!--begin::Input group-->
               <div class="card card-flush py-4">
                  <div class="card-body pt-0">
                     <div class="card-body pt-0">
                        <div class="col-md-10">
                           <label class="required form-label">Select Page TItle</label>
                           <select class="form-select form-select-solid pageTitle_id1" name="pageTitle_id1" id="pageTitle_id1" data-control="select2" data-placeholder="Select an page title">
                              <option></option>
                              @foreach($pageTitle as $pageTitles)
                              @if($pageTitles->uid == $data->pageContent[0]->pageTitle->uid)
                                 <option value="{{ $pageTitles->uid }}" selected>{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})</option>
                                 @else
                                 <option value="{{ $pageTitles->uid }}">{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})</option>
                                 @endif
                              @endforeach
                           </select>
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
                     <!-- <div class="card-header">
                        <div class="card-title">
                           <h2>Add Page Gallery</h2>
                        </div>
                     </div> -->
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                           <!--begin::Repeater-->
                           <div id="kt_Pagegallery_add_multiple_options">
                              <!--begin::Form group-->
                              <div class="form-group">
                                 <div data-repeater-list="kt_Pagegallery_add_multiple_options" class="d-flex flex-column gap-2">
                                    @if(count($data->pageContent[0]->content_gallery)>0)
                                    @foreach($data->pageContent[0]->content_gallery as $gallery)
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-4">
                                       <!--begin::Input-->
                                       <input type="hidden" class="form-control mw-100 w-200px" name="uid" value="{{ $gallery->uid }}" />
                                       <div>
                                       <label class="required form-label mw-100 w-175px">Image Title</label>
                                       <input type="text" class="form-control mw-100 w-175px" name="imagetitle" placeholder="image title Name" value="{{ $gallery->image_title ?? '' }}" />
                                       </div>
                                       <div>
                                       <label class="required form-label mw-100 w-175px">Start Date</label>
                                       <input type="date" class="form-control mw-100 w-175px" name="startdate" placeholder="" value="{{ $gallery->start_date ?? '' }}" />
                                       </div>
                                       <div>
                                       <label class="required form-label mw-100 w-175px">End Date</label>
                                       <input type="date" class="form-control mw-100 w-175px" name="enddate" placeholder="" value="{{ $gallery->end_date ?? '' }}" />
                                       </div>
                                       <div>
                                       <label class="required form-label mw-100 w-175px">Image Format</label>
                                       <input type="file" class="form-control mw-100 w-175px checkmime" name="image" accept="image/*" />
                                       </div>
                                       <!--end::Input-->
                                       
                                       <button type="button" id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                          <i class="ki-outline ki-cross fs-1"></i>
                                       </button>
                                        <img src="{{ asset('resources/uploads/PageContentGallery/'.$gallery->public_url) }}" width="50px" />

                                        <button type="button" data-id="{{ $gallery->uid ?? '' }},img" class="btn btn-sm btn-icon btn-light-danger delete-single-record" title="Data Delete">
                                          <i class="ki-outline ki-trash fs-1"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                 
                                    @else
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-4">
                                       <!--begin::Input-->
                                       <div>
                                       <label class="required form-label mw-100 w-175px">Image Title</label>
                                       <input type="text" class="form-control mw-100 w-175px" name="imagetitle" placeholder="image title Name" />
                                       </div>
                                       <div>
                                       <label class="required form-label mw-100 w-175px">Start Date</label>
                                       <input type="date" class="form-control mw-100 w-175px" name="startdate" placeholder="" />
                                       </div>
                                       <div>
                                       <label class="required form-label mw-100 w-175px">End Date</label>
                                       <input type="date" class="form-control mw-100 w-175px" name="enddate" placeholder="" />
                                       </div>
                                       <div>
                                       <label class="required form-label mw-100 w-175px">Image Format</label>
                                       <input type="file" class="form-control mw-100 w-175px checkmime" name="image" accept="image/*" />
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
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        {{config('FormField.cancel_button')}}
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_pagegallery_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-gallerypage-btn">
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
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
         <!--begin:::Tab pane-->
         <div class="tab-pane fade" id="kt_settings_pagePdf" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_page_pdf_form" class="form">
               <!--begin::Input group-->
               <div class="card card-flush py-4">
                  <div class="card-body p-0">
                     <div class="row">
                        <div class="col-md-9">
                        <div class="card-body p-0">
                        <div class="col-md-11">
                           <label class="required form-label">Select Page TItle</label>
                           <select class="form-select form-select-solid pageTitle_id2" name="pageTitle_id2" id="pageTitle_id2" data-control="select2" data-placeholder="Select an page title">
                              <option></option>
                              @foreach($pageTitle as $pageTitles)
                              @if($pageTitles->uid == $data->pageContent[0]->pageTitle->uid)
                                 <option value="{{ $pageTitles->uid }}" selected>{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})</option>
                                 @else
                                 <option value="{{ $pageTitles->uid }}">{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})</option>
                                 @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                   
                     <!--begin::Input group-->
                     <!--begin::News-->
                     <!-- <div class="card-header">
                        <div class="card-title">
                           <h2>Add Page PDF</h2>
                        </div>
                     </div> -->
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body p-0 mt-5 pt-3">
                        <!--begin::Input group-->
                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                           <!--begin::Repeater-->
                           <div id="kt_PagePdf_add_multiple_options">
                              <!--begin::Form group-->
                              <div class="form-group">
                                 <div data-repeater-list="kt_PagePdf_add_multiple_options" class="d-flex flex-column gap-3">
                                 @if(count($data->pageContent[0]->content_pdf)>0)
                                 @foreach($data->pageContent[0]->content_pdf as $contentPdf)
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                          <input type="hidden" class="form-control mw-100 w-175px" name="uid" value="{{ $contentPdf->uid }}" />
                                       <div>
                                          <label class="required form-label mw-100 w-175px">Pdf Title</label>
                                          <input type="text" class="form-control mw-100 w-175px" name="pdftitle" placeholder="pdf title Name" value="{{ $contentPdf->pdf_title }}" />
                                       </div>
                                       <div>
                                          <label class="required form-label mw-100 w-175px">Start Date</label>
                                          <input type="date" class="form-control mw-100 w-175px" name="startdate" placeholder="" value="{{ $contentPdf->start_date }}"  />
                                       </div>
                                       <div>
                                          <label class="required form-label mw-100 w-175px">End Date</label>
                                          <input type="date" class="form-control mw-100 w-175px" name="enddate" placeholder="" value="{{ $contentPdf->end_date }}"  />
                                       </div>
                                       <div>
                                          <label class="required form-label mw-100 w-175px">Pdf Format</label>
                                          <input type="file" class="form-control mw-100 w-175px checkmimepdf" name="image" accept=".pdf" />
                                       </div>
                                       <!--end::Input-->
                                       <button type="button" id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                          <i class="ki-outline ki-cross fs-1"></i>
                                        </button>
                                        <a href="{{ asset('resources/uploads/PageContentPdf/'.$contentPdf->public_url) }}" target="_blank" download>
                                          <i class="ki-outline ki-file fs-1"></i>
                                       </a>
                                        <button type="button" data-id="{{ $contentPdf->uid }},pdf" class="btn btn-sm btn-icon btn-light-danger delete-single-record" title="Data Delete">
                                          <i class="ki-outline ki-trash fs-1"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                    @else
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                       <div>
                                          <label class="required form-label mw-100 w-175px">Pdf Title</label>
                                          <input type="text" class="form-control mw-100 w-175px" name="pdftitle" placeholder="pdf title Name" value="" />
                                       </div>
                                       <div>
                                          <label class="required form-label mw-100 w-175px">Start Date</label>
                                          <input type="date" class="form-control mw-100 w-175px" name="startdate" placeholder="" value=""  />
                                       </div>
                                       <div>
                                          <label class="required form-label mw-100 w-175px">End Date</label>
                                          <input type="date" class="form-control mw-100 w-175px" name="enddate" placeholder="" value=""  />
                                       </div>
                                       <div>
                                          <label class="required form-label mw-100 w-175px">Pdf Format</label>
                                          <input type="file" class="form-control mw-100 w-175px checkmimepdf" name="image" accept=".pdf" />
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
                        </div>
                        <div class="col-md-3">
                              <div class="card-body p-0 pt-4 mt-5">
                              <!--begin::Input group-->
                              <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                 <!--begin::Repeater-->
                                 <div id="kt_tablehead_add_multiple_options">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                       <div data-repeater-list="kt_tablehead_add_multiple_options" class="d-flex flex-column gap-3">
                                       @if(isset($data->pageContent[0]->tableHead) && $data->pageContent[0]->tableHead !=0)
                                       @foreach(json_decode($data->pageContent[0]->tableHead) as $key=>$contentPdf)
                                          <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                             <!--begin::Input-->
                                             <div>
                                                <input type="text" class="form-control mw-100 w-200px" name="tablehead" value="{{$contentPdf->tablehead??''}}" placeholder="Table Head Name" />
                                             </div>
                                             <button type="button"id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                                <i class="ki-outline ki-cross fs-1"></i>
                                             </button>
                                             <!--end::Input-->
                                          </div>
                                          @endforeach
                                          @else
                                          <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                             <!--begin::Input-->
                                             <div>
                                                <input type="text" class="form-control mw-100 w-200px" name="tablehead" value="" placeholder="Table Head Name" />
                                             </div>
                                             <button type="button"id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                                <i class="ki-outline ki-cross fs-1"></i>
                                             </button>
                                             <!--end::Input-->
                                          </div>
                                          @endif
                                       </div>
                                    </div>
                                    <!--end::Form group-->
                                    <!--begin::Form group-->
                                    <div class="form-group mt-5">
                                       <button type="button" data-repeater-create class="btn btn-sm btn-light-primary">
                                          <i class="ki-outline ki-plus fs-2"></i> Add Table Head
                                       </button>
                                    </div>
                                    <!--end::Form group-->
                                 </div>
                                 <!--end::Repeater-->
                              </div>
                              <!--end::Input group-->
                           </div>
                        </div>
                     </div>
                    
                     <!--end::Card header-->
                  
                     <!--end::Variations-->
                     </div>
                     <!--end::Card header-->
                  </div>
                  <!--end::Pricing-->
               <!--end::Input group-->
               <!--begin::Action buttons-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        {{config('FormField.cancel_button')}}
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_pagepdf_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-pdfpage-btn">
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
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
          <!--begin:::Tab pane-->
          <div class="tab-pane fade" id="kt_settings_pageBanner" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_page_bannerUpdate_form" class="form">
               <!--begin::Input group-->
               <div class="card card-flush py-4">
                  <div class="card-body pt-0">
                     <div class="card-body pt-0">
                        <div class="col-md-12">
                           <label class="required form-label">Select Page TItle</label>
                           <select class="form-select form-select-solid pageTitle_id3" name="pageTitle_id3" id="pageTitle_id3" data-control="select2" data-placeholder="Select an page title">
                              <option></option>
                              @foreach($pageTitle as $pageTitles)
                              @if($pageTitles->uid == $data->pageContent[0]->pageTitle->uid)
                                 <option value="{{ $pageTitles->uid }}" selected>{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})</option>
                                 @else
                                 <option value="{{ $pageTitles->uid }}">{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})</option>
                                 @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <!--begin::Input group-->
                     <!--begin::News-->
                     <!-- <div class="card-header">
                        <div class="card-title">
                           <h2>Update Page Banner</h2>
                        </div>
                     </div> -->
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                           <!--begin::Repeater-->
                           <div id="">
                              <!--begin::Form group-->
                              <div class="form-group">
                                 
                                 
                                 <div class="d-flex flex-column gap-3">
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                       <div>
                                       <label class="required form-label mw-100 w-200px">Banner Title</label>
                                       <input type="text" class="form-control mw-100 w-200px" name="bannertitle" value="{{ $data->pageContent[0]->content_banner->banner_title_en ??''  }}" placeholder="Banner title Name" />
                                       </div>
                                       <div>
                                       <label class="required form-label mw-100 w-200px">Banner image Format</label>
                                       <input type="file" class="form-control mw-100 w-200px" name="image" accept="image/*" />
                                       </div>
                                       @if($data->pageContent[0]->content_banner !='')
                                       <img src="{{ asset('resources/uploads/pagebanner/'. $data->pageContent[0]->content_banner->public_url)  }}" width="50px" />
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <!--end::Form group-->
                              <!--begin::Form group-->
                              <!-- <div class="form-group mt-5">
                                 <button type="button" data-repeater-create class="btn btn-sm btn-light-primary">
                                    <i class="ki-outline ki-plus fs-2"></i> Add More
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
               <!--end::Input group-->
               <!--begin::Action buttons-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        {{config('FormField.cancel_button')}}
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_pagebanner_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-bannerpage-btn">
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