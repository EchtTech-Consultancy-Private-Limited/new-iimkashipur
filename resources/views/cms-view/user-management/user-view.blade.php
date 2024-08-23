@extends('cms-view.layouts.main')
@section('title')
    {{__('User View')}}
@endsection
@section('pageTitle')
 {{ __('User') }}
@endsection
@section('breadcrumbs')
 {{ __('User View') }}
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
                            <div class="fw-bold fs-3 text-gray-800 mb-8">{{$data->name}}</div>
                            <!--end::Label-->  
                            <!--begin::Row-->
                            <div class="row g-5 mb-11">
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Email:</div>
                                <!--end::Label-->  
                                <!--end::Col-->
                                <div class="fw-bold fs-6 text-gray-800">{{$data->email}}</div>
                                <!--end::Col-->  
                            </div>
                            <!--end::Col-->  
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Role Name:</div>
                                <!--end::Label-->  
                                <!--end::Info-->
                                <div class="fw-bold fs-6 text-gray-800">{{$data->role_name}}</div>
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
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Last Login:</div>
                                <!--end::Label-->  
                                <!--end::Description-->
                                <div class="fw-semibold fs-7 text-gray-600">{{$data->last_login}}</div>
                                <!--end::Description-->  
                            </div>
                            <!--end::Col-->  
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Your Last IP:</div>
                                <!--end::Label-->  
                                <!--end::Description-->
                                <div class="fw-semibold fs-7 text-gray-600">{{$data->ip}}</div>
                                <!--end::Description-->   
                            </div>
                            <!--end::Col-->  
                            </div>
                            <!--end::Row-->   
                            <!--begin::Content-->
                            <div class="flex-grow-1">
                            <!--begin::Table-->
                            <div class="table-responsive border-bottom mb-9">
                               
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