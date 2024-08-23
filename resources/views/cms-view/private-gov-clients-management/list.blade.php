@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Private Government Client')}}
@endsection
@section('pageTitle')
 {{ __('Private Government Client') }}
@endsection
@section('breadcrumbs')
 {{ __('Listing') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/js/privategovclient_list_datatable.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
    <div class="card-body pt-0">
        <!--start: Datatable -->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_privategovclient" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_privategovclient" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_privategovclient" rowspan="1" colspan="1">{{__('Name')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_privategovclient" rowspan="1" colspan="1">{{__('Short Order')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_privategovclient" rowspan="1" colspan="1">{{__('Logo')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_privategovclient" rowspan="1" colspan="1">{{__('Status')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable_privategovclient" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection