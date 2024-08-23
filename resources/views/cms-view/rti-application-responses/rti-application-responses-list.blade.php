@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('RTI Application Responses')}}
@endsection
@section('pageTitle')
 {{ __('RTI Application Responses') }}
@endsection
@section('breadcrumbs')
 {{ __('RTI Application Responses Listing') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/rtiapplicationresponses-datatable-list.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
    <div class="card-body">
        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
            <a href="{{ asset($createUrl) }}"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                <i class="ki-outline ki-plus fs-2"></i>Add New
            </button></a>
        </div>
        <!--start: Datatable -->
        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable_rtiapplicationresponses" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_rtiapplicationresponses" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_rtiapplicationresponses" rowspan="1" colspan="1">{{__('Registration Number')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_rtiapplicationresponses" rowspan="1" colspan="1">{{__('Request Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_rtiapplicationresponses" rowspan="1" colspan="1">{{__('PIO Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_rtiapplicationresponses" rowspan="1" colspan="1">{{__('Status')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_rtiapplicationresponses" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@endsection
