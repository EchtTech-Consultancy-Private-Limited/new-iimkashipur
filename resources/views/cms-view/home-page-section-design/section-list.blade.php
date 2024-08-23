@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('New Section')}}
@endsection
@section('pageTitle')
 {{ __('New Section') }}
@endsection
@section('breadcrumbs')
 {{ __('New SectionListing') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/newSection_list_datatable.js') }}"></script>
<script src="{{ asset('public/form-js/newsections-add.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
    <div class="card-body">
        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_newsectionAdd">
                <i class="ki-outline ki-plus fs-2"></i>Add New Section
            </button>
        </div>
        <!--start: Datatable -->
        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable_newsections" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_newsections" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_newsections" rowspan="1" colspan="1">{{__('Section Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_newsections" rowspan="1" colspan="1">{{__('Order')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_newsections" rowspan="1" colspan="1">{{__('Status')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_newsections" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@include('cms-view.home-page-section-design.section-create')
@endsection