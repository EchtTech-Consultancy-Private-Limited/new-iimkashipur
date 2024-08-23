@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Private Government Client')}}
@endsection
@section('pageTitle')
 {{ __('Private Government Client') }}
@endsection
@section('breadcrumbs')
 {{ __('Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/private-gov-clients-edit.js') }}"></script>
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
      <form id="kt_pgcs_update_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
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
                        <div class="mb-10 fv-row">
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
                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                       <!--begin::Radio-->
                                       <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                       <input class="form-check-input" type="radio" name="tabtype" value="0" <?php if($data->tab_type =='0'){ echo 'checked'; }else{ echo ''; } ?>/>
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
                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                                       <!--begin::Radio-->
                                       <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                       <input class="form-check-input" type="radio" name="tabtype" value="1" checked="checked" <?php if($data->tab_type =='1'){ echo 'checked'; }else{ echo ''; } ?>/>
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
                                 <input type="text" name="title_name_en" class="form-control mb-2 title_name_en" id="title_name_en" placeholder="Title name" value="{{$data->title_en}}" />
                              </div>
                                 <!--end::Input-->
                              <!--begin::Description-->
                              <div class="text-muted fs-7">A title name is required and recommended to be unique.</div>
                              <!--end::Description-->
                           </div>
                           <div class="mb-10 fv-row">
                              <!--begin::Label-->
                              <label class="required form-label">शीर्षक नाम (हिन्दी में)</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <div class="col-md-12">
                              <input type="text" name="title_name_hi" class="form-control mb-2 title_name_hi" id="title_name_hi" placeholder="Title name" value="{{$data->title_hi}}" />
                           </div>
                              <!--end::Input-->
                              <!--begin::Description-->
                              <div class="text-muted fs-7">A title name is required and recommended to be unique.</div>
                              <!--end::Description-->
                           </div>
                           <div class="mb-10 fv-row">
                              <!--begin::Label-->
                              <label class="required form-label">URL (Logo Link)</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <div class="col-md-12">
                                 <input type="text" name="logo_url" class="form-control mb-2 logo_url" id="logo_url" placeholder="https://..." value="{{$data->url??''}}" />
                              </div>
                           </div>
                           <div data-repeater-item class="form-group row">
                                <!--begin::Input-->
                                <div class="col-md-4">
                                <label class="required form-label mw-100 w-100">Logo Title/Alt</label>
                                    <input type="text" class="form-control mw-100 w-100" name="title" placeholder="title Name" value="{{$data->title_alt ?? ''}}" />
                                </div>
                                <div class="col-md-4">
                                <label class="required form-label mw-100 w-100">Sort Order</label>
                                    <input type="number" class="form-control mw-100 w-100" name="sort_order" placeholder="sort order"  value="{{$data->sort_order??''}}"/>
                                </div>
                                <div class="col-md-4">
                                <label class="required form-label mw-100 w-100">Image Format (230px * 80px)
                                <span class="ms-1"  data-bs-toggle="tooltip" title="Only Allow jpg,png,jpeg" >
                                 <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>
                                </label>
                                    <input type="file" class="form-control mw-100 w-100 image" id="image" name="image" accept="image/*" />
                                    Old Logo: <img src="{{ asset('resources/uploads/clientlogo/'. $data->public_url)  }}" width="50px" />
                                </div>
                            </div>
                           <!--end::Input group-->
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
               <button type="submit" id="kt_update_pgcs_submit" class="btn btn-primary submit-pgcs-btn">
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