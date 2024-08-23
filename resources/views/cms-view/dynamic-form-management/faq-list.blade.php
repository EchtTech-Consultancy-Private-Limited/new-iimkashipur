@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('FAQ')}}
@endsection
@section('pageTitle')
 {{ __('FAQ') }}
@endsection
@section('breadcrumbs')
 {{ __('FAQ Listing') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/faq_list_datatable.js') }}"></script>
<script src="{{ asset('public/form-js/faq-add.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
    <div class="card-body">
        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_faq">
                <i class="ki-outline ki-plus fs-2"></i>Add FAQ
            </button>
        </div>
        <!--start: Datatable -->
        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable_faq_list" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_faq_list" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_faq_list" rowspan="1" colspan="1">{{__('Question')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_faq_list" rowspan="1" colspan="1">{{__('Status')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_faq_list" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@include('cms-view.dynamic-form-management.faq-add')
@endsection