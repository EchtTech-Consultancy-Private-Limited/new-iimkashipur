@extends('cms-view.layouts.main')
@section('title')
    {{__('Purchase Works Committee Edit')}}
@endsection
@section('pageTitle')
 {{ __('Purchase Works Committee') }}
@endsection
@section('breadcrumbs')
 {{ __('Purchase Works Committee Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/purchaseworkscommittee-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
   <div class="card card-flush">
   @if($textMessage =='')
   <div class="card-body">
   <!--begin::Form-->
   <form id="kt_purchaseworkscommittee_edit_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
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
                                    <input class="form-check-input" type="radio" name="tabtype" value="0" checked="checked" <?php if($data->tab_type =='0'){ echo 'checked'; }else{ echo ''; } ?> />
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
                                    <input class="form-check-input" type="radio" name="tabtype" value="1"  <?php if($data->tab_type =='1'){ echo 'checked'; }else{ echo ''; } ?>/>
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
                        <div class="fv-row mb-10">
                           <div class="row g-9 mb-7">
                              <!--begin::Col-->
                              <div class="col-md-3 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Date</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input class="form-control form-control-solid" type="date" placeholder="" name="startdate" value="{{$data->start_date}}" />
                                 <!--end::Input-->
                              </div>
                              <!--end::Col-->
                              <!--begin::Col-->
                              <div class="col-md-3 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Order/Contract No</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input class="form-control form-control-solid" type="text" placeholder="Order/Contract No" name="order_contract_no" value="{{$data->order_contract_no}}" />
                                 <!--end::Input-->
                              </div>
                              <!--end::Col-->
                              <!--begin::Col-->
                              <div class="col-md-3 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Amount (Rs)</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input class="form-control form-control-solid" type="text" placeholder="Amount (Rs)" name="amount" value="{{$data->amount}}" />
                                 <!--end::Input-->
                              </div>
                              <!--end::Col-->
                              <!--begin::Col-->
                              <div class="col-md-3 fv-row">
                                 <label class="required fs-6 fw-semibold form-label"><span>Type</span></label>
                                    <select class="form-select form-select-solid type_id" name="type_id" id="type_id" data-control="select2" data-placeholder="Select an option">
                                       <option></option>
                                       @foreach($type as $types)
                                       @if($data->asset_type == $types->uid)
                                       <option value="{{ $types->uid }}" selected>{{ $types->pwc_type }}</option>
                                       @else
                                       <option value="{{ $types->uid }}">{{ $types->pwc_type }}</option>
                                       @endif
                                       @endforeach
                                    </select>
                              </div>
                              <!--end::Col-->
                           </div>
                        </div>
                        <div class="fv-row mb-10">
                           <div class="row g-9 mb-7">
                              <!--begin::Col-->
                              <div class="col-md-12 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Title (In English)</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="text" name="title_name_en" id="title_name_en" class="form-control mb-2 title_name_en" id="title_name_en" placeholder="Title name" value="{{$data->title_name_en}}" />
                                 <!--end::Input-->
                              </div>
                              <!--begin::Col-->
                              <!--begin::Col-->
                              <div class="col-md-12 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">शीर्षक (हिन्दी में)</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="text" name="title_name_hi" id="title_name_hi" class="form-control mb-2 title_name_hi" id="title_name_hi" placeholder="शीर्षक (हिन्दी में)" value="{{$data->title_name_hi}}" />
                                 <!--end::Input-->
                              </div>
                              <!--begin::Col-->
                              <div class="col-md-6 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Name of Supplier/Party (In English)</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="text" name="name_of_supplier_party_en" id="name_of_supplier_party_en" class="form-control mb-2 name_of_supplier_party_en" placeholder="Name of Supplier/Party" value="{{$data->name_of_supplier_party_en}}" />
                                 <!--end::Input-->
                              </div>
                              <div class="col-md-6 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">आपूर्तिकर्ता/पार्टी का नाम (हिन्दी में)</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="text" name="name_of_supplier_party_hi" id="name_of_supplier_party_hi" class="form-control mb-2 name_of_supplier_party_hi" placeholder="आपूर्तिकर्ता/पार्टी का नाम" value="{{$data->name_of_supplier_party_hi}}" />
                                 <!--end::Input-->
                              </div>
                              <!--end::Col-->
                           </div>
                        </div>
                        <div class="fv-row mb-10">
                           <div class="row g-9 mb-7">
                              <!--begin::Col-->
                              <div class="col-md-6 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Quality Supplied (In English)</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="text" name="quality_supplied_en" id="quality_supplied_en" class="form-control mb-2 quality_supplied_en" placeholder="Quality Supplied" value="{{$data->quality_supplied_en}}" />
                                 <!--end::Input-->
                              </div>
                              <div class="col-md-6 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">गुणवत्ता की आपूर्ति (हिन्दी में)</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="text" name="quality_supplied_hi" id="quality_supplied_hi" class="form-control mb-2 quality_supplied_hi" placeholder="गुणवत्ता की आपूर्ति" value="{{$data->quality_supplied_hi}}" />
                                 <!--end::Input-->
                              </div>
                              <!--end::Col-->
                           </div>

                           <!--begin::Input group-->
                        <div>
                           <!--begin::Label-->
                           <label class="form-label required">Description (English)</label>
                           <!--end::Label-->
                           <!--begin::Editor-->
                              <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en">{!! $data->description_en !!}</div>
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
                              <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi">{!! $data->description_hi !!}</div>
                           <!--end::Editor-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                           <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        </div>
                        
                        <div class="fv-row mb-10">
                           <div class="row g-9 mb-7">
                              <div class="col-md-4 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Related Document (PDF)</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="file" name="related_document" id="related_document" class="form-control mb-2 related_document" placeholder="अनुरोधकर्ता का नाम" value="" />
                                 <!--end::Input-->
                              </div>
                              <div class="col-md-3 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Previews File</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <a class="" target="_blank" href="{{ asset('resources/uploads/purchaseworkscommittee/'.$data->public_url)}}" alt="photo">Download</a>
                                 <!--end::Input-->
                              </div>
                              <!--end::Col-->
                              <div class="col-md-3 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold mb-2">Sort Order</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="number" name="short_order" id="short_order" class="form-control mb-2 short_order" placeholder="Sort Order" value="{{$data->short_order}}" />
                                 <!--end::Input-->
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
            <button type="reset" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
            {{config('FormField.cancel_button')}}
            </button>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_edit_purchaseworkscommittee_submit" class="btn btn-primary submit-purchaseworkscommittee-btn">
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