@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Users')}}
@endsection
@section('pageTitle')
 {{ __('Users') }}
@endsection
@section('breadcrumbs')
 {{ __('Users Listing') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/user_list_datatable.js') }}"></script>
<script src="{{ asset('public/form-js/user-add.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
    <div class="card-body">
        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
        @if(isset(auth::user()->role_name) && auth::user()->role_name=='Admin' || isset(Auth::user()->role_id) == '1' && Auth::user()->role_id == '1')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                <i class="ki-outline ki-plus fs-2"></i>Add User
            </button>
        @endif
        </div>
        <!--start: Datatable -->
        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable_user_list" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_user_list" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_user_list" rowspan="1" colspan="1">{{__('Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_user_list" rowspan="1" colspan="1">{{__('Email')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_user_list" rowspan="1" colspan="1">{{__('Role Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_user_list" rowspan="1" colspan="1">{{__('Status')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_user_list" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@include('cms-view.user-management.user-add')
@endsection
