@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Home Page Section')}}
@endsection
@section('pageTitle')
 {{ __('Home Page Section') }}
@endsection
@section('breadcrumbs')
 {{ __('Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/home-page-sections-edit.js') }}"></script>
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
      <form id="kt_homepagesectiondesign_update_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
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
                           <!--begin::Input group-->
                           <div class="mb-10 fv-row">
                              <div class="form-group row">
                                <!--begin::Input-->
                                <div class="col-md-4">
                                 <label class="required form-label required">Select Section</label>
                                    <select class="form-select form-select-solid section_id" name="section_id" id="section_id" data-control="select2" data-placeholder="Select an option">
                                       <option></option>
                                       @foreach($sectionList as $sectionLists)
                                       @if($data->hpsi_id == $sectionLists->uid)
                                          <option value="{{ $sectionLists->uid }}" selected>{{ $sectionLists->title_en  }} ({{ $sectionLists->title_hi }})</option>
                                       @else
                                          <option value="{{ $sectionLists->uid }}">{{ $sectionLists->title_en  }} ({{ $sectionLists->title_hi }})</option>
                                       @endif
                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                 <label class="required form-label mw-100 w-100">Order Number</label>
                                    <input type="number" class="form-control mw-100 w-100 sort_order" value="{{$data->sort_order??''}}" name="sort_order" id="sort_order" placeholder="sort order"/>
                                </div>
                                <div class="col-md-6">
                                 <label class="form-label mw-100 w-100">Link (optional)</label>
                                    <input type="text" class="form-control mw-100 w-100 url_link"  value="{{$data->url??''}}" name="url_link" id="url_link" placeholder="https://..."/>
                                </div>
                            </div>
                                 <!--end::Input-->
                           </div>
                                <div>
                                 <!--begin::Label-->
                                 <label class="form-label required">Description (English)</label>
                                 <!--end::Label-->
                                 <!--begin::Editor-->
                                    <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en">{!! $data->content_en??'' !!}</div>
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
                                    <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi">{!! $data->content_hi??'' !!}</div>
                                 <!--end::Editor-->
                                 <!--begin::Description-->
                                 <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                                 <!--end::Description-->
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
               <button type="reset" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                  {{config('FormField.cancel_button')}}
               </button>
               <!--end::Button-->
               <!--begin::Button-->
               <button type="submit" id="kt_update_homepagesectiondesign_submit" class="btn btn-primary submit-homepagesectiondesign-btn">
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