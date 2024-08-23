@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Form Data')}}
@endsection
@section('pageTitle')
 {{ __('Form Data') }}
@endsection
@section('breadcrumbs')
 {{ __('Form Data Listing') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/formFormData_list_datatable.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card card-flush  p-5">
            <div class="card-body pt-0">
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column align-items-start justift-content-center flex-equal me-5">
                        <!-- <h1 class="fw-bold fs-4 fs-lg-1 text-gray-800 mb-5 mb-lg-10">How Can We Help You?</h1> -->
                        <div class="position-relative w-100">
                            <form method="get" id="search-form" action="{{ route('formbuilder.formdatalist') }}">
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                                    <div class="row fv-row">
                                        <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label class="fs-5 fw-bold form-label mb-2"><span class="required">Select Form Name</span></label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="w-100">
                                                    <select class="form-select form-select-solid form_name" onchange="this.form.submit()" name="formid" data-control="select2" data-placeholder="Select an option">
                                                        <option></option>
                                                        @foreach($formlist as $data)
                                                            <option value="{{ $data->uid }}" {{request('formid')==$data->uid?'selected':''}}> {{ $data->form_name  }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
<div class="card card-flush">
    <div class="card-body pt-0">
        <!--start: Datatable -->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_formDataList" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_formDataList" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_formDataList" rowspan="1" colspan="1">{{__('Form Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_formDataList" rowspan="1" colspan="1">{{__('Menu Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_formDataList" rowspan="1" colspan="1">{{__('Form Value')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_formDataList" rowspan="1" colspan="1">{{__('Status')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_formDataList" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
