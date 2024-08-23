@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Dashboard')}}
@endsection
@section('pageTitle')
 {{ __('Home Page Banner') }}
@endsection
@section('breadcrumbs')
 {{ __('Home Page Banner Listing') }}
@endsection
@section('content')
<div class="card card-flush">
    <div class="card-body">
        <!--start: Datatable -->
        <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="kt_datatable" role="grid" aria-describedby="kt_datatable_info" style="width: 924px;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1">{{__('ID')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1">{{__('Title')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1">{{__('Logo')}}</th>
                    <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1">{{__('Action')}}</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection