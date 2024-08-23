@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Audit Trail Setting')}}
@endsection
@section('pageTitle')
 {{ __('Audit Trail Setting') }}
@endsection
@section('breadcrumbs')
 {{ __('Listing') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/audit_trail_datatable.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
    <div class="card-body">
        <!--start: Datatable -->
        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable_audit_trail" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_audit_trail" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_audit_trail" rowspan="1" colspan="1">{{__('User Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_audit_trail" rowspan="1" colspan="1">{{__('IP')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_audit_trail" rowspan="1" colspan="1">{{__('Method')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_audit_trail" rowspan="1" colspan="1">{{__('API URL')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_audit_trail" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@endsection