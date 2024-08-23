@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('File Upload Path')}}
@endsection
@section('pageTitle')
 {{ __('File Upload Path') }}
@endsection
@section('breadcrumbs')
 {{ __('File Uploaded Listing') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/file_uploaded_list_datatable.js') }}"></script>
<script src="{{ asset('public/form-js/file-upload-add.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
    <div class="card-body">
        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_fileupload">
                <i class="ki-outline ki-plus fs-2"></i>Upload File
            </button>
        </div>
        <!--start: Datatable -->
        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable_fileuploadPath_list" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_fileuploadPath_list" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_fileuploadPath_list" rowspan="1" colspan="1">{{__('Title Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_fileuploadPath_list" rowspan="1" colspan="1">{{__('Path')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_fileuploadPath_list" rowspan="1" colspan="1">{{__('Status')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_fileuploadPath_list" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@include('cms-view.file-upload-manual.upload-file-add')
@endsection