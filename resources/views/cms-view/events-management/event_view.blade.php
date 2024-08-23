@extends('cms-view.layouts.main')
@section('title')
    {{__('Event View')}}
@endsection
@section('pageTitle')
 {{ __('Event') }}
@endsection
@section('breadcrumbs')
 {{ __('Event View') }}
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-20">
                <div class="d-flex flex-column flex-xl-row">
                <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                    <!--begin::Invoice 2 content-->
                    <div class="mt-n1">
                        <!--begin::Wrapper-->
                        <div class="m-0">
                            <!--begin::Label-->
                            <div class="fw-bold fs-3 text-gray-800 mb-8">{{ $data->list->title_name_en ??'' }}</div>
                            <!--end::Label-->  
                            <!--begin::Row-->
                            <div class="row g-5 mb-11">
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Start Date:</div>
                                <!--end::Label-->  
                                <!--end::Col-->
                                <div class="fw-bold fs-6 text-gray-800">{{ date('d M Y',strtotime($data->list->start_date)) }}</div>
                                <!--end::Col-->  
                            </div>
                            <!--end::Col-->  
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">End Date:</div>
                                <!--end::Label-->  
                                <!--end::Info-->
                                <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                    <span class="pe-2">{{ date('d M Y',strtotime($data->list->end_date)) }}</span> 
                                    <span class="fs-7 text-danger d-flex align-items-center">
                                    <span class="bullet bullet-dot bg-danger me-2"></span> 
                                    <?php 
                                    $startDate = new DateTime($data->list->start_date);
                                    $endDate = new DateTime($data->list->end_date);
                                    ?>
                                    Due in {{   $startDate->diff($endDate)->days }} days
                                    </span>
                                </div>
                                <!--end::Info-->  
                            </div>
                            <!--end::Col-->  
                            </div>
                            <!--end::Row-->   
                            <!--begin::Row-->
                            <div class="row g-5 mb-12">
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Title Name:</div>
                                <!--end::Label-->  
                                <!--end::Description-->
                                <div class="fw-semibold fs-7 text-gray-600">
                                   {{ $data->list->title_name_en }}
                                </div>
                                <!--end::Description-->  
                            </div>
                            <!--end::Col-->  
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Description:</div>
                                <!--end::Label-->  
                                <!--end::Description-->
                                <div class="fw-semibold fs-7 text-gray-600">                      
                                    {!! $data->list->description_en !!}                   
                                </div>
                                <!--end::Description-->   
                            </div>
                            <!--end::Col-->  
                            </div>
                            <!--end::Row-->   
                            <!--begin::Content-->
                            <div class="flex-grow-1">
                            <!--begin::Table-->
                            <div class="table-responsive border-bottom mb-9">
                                <table class="table mb-3">
                                    <thead>
                                        <tr class="border-bottom fs-6 fw-bold text-muted">
                                        <th class=" pb-2">Title</th>
                                        <th class="text-end pb-2">File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data->details as $datas)
                                        <tr class="fw-bold text-gray-700 fs-5 text-end">
                                        <td class="d-flex align-items-center pt-6">                                            
                                            <i class="fa fa-genderless text-danger fs-2 me-2"></i>                                           
                                            {{$datas->title ?? ''}}
                                        </td>
                                            <td class="">
                                            <a href="{{ asset('resources/uploads/EventsManagement/'.$datas->public_url ??'') }}" download="">View</a>    
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->                     
                            </div>
                            <!--end::Content-->          
                        </div>
                        <!--end::Wrapper-->           
                    </div>
                    <!--end::Invoice 2 content-->         
                </div>
            </div>
        </div>
@endsection