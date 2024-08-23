@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Permission')}}
@endsection
@section('pageTitle')
 {{ __('Permissions') }}
@endsection
@section('breadcrumbs')
 {{ __('List') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/permission_list_datatable.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
    <div class="card-body">
        <!--start: Datatable -->
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Name</th>
                    <th class="min-w-250px">Assigned to</th>
                    <th class="min-w-125px">Created Date</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                <tr>
                    <td>User Management</td>
                    <td>
                        <a href="roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
                    </td>
                    <td>
                        10 Mar 2023, 2:40 pm                        
                    </td>
                </tr>
            </tbody>
            </table>
        <!--end::Table-->
        <!--end: Datatable -->
    </div>
</div>
@endsection