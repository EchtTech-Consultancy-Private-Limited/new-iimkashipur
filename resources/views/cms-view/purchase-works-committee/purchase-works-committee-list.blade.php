@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Purchase Works Committee')}}
@endsection
@section('pageTitle')
 {{ __('Purchase Works Committee') }}
@endsection
@section('breadcrumbs')
 {{ __('Purchase Works Committee Listing') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/purchaseworkscommittee-datatable-list.js') }}"></script>
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
        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable_purchaseworkscommittee" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_purchaseworkscommittee" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_purchaseworkscommittee" rowspan="1" colspan="1">{{__('Supplier Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_purchaseworkscommittee" rowspan="1" colspan="1">{{__('Supplied Quality')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_purchaseworkscommittee" rowspan="1" colspan="1">{{__('Order Contract No')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_purchaseworkscommittee" rowspan="1" colspan="1">{{__('amount')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_purchaseworkscommittee" rowspan="1" colspan="1">{{__('Related Document')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_purchaseworkscommittee" rowspan="1" colspan="1">{{__('Status')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_purchaseworkscommittee" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@endsection
