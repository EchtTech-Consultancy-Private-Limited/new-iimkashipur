@extends('cms-view.layouts.main')
@section('title')
    {{__('Content Page View')}}
@endsection
@section('pageTitle')
 {{ __('Content Page') }}
@endsection
@section('breadcrumbs')
 {{ __('Content Page View') }}
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
                            <div class="fw-bold fs-3 text-gray-800 mb-8">{{ $data->basicinfo->page_title_en}}</div>
                            <!--end::Label-->  
                            <!--begin::Row-->
                            <div class="row g-5 mb-11">
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Meta Title:</div>
                                <!--end::Label-->  
                                <!--end::Col-->
                                <div class="fw-bold fs-6 text-gray-800">{{ $data->basicinfo->meta_title}}</div>
                                <!--end::Col-->  
                            </div>
                            <!--end::Col-->  
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Meta Tag:</div>
                                <!--end::Label-->  
                                <!--end::Info-->
                                <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                    <span class="pe-2">{{ $data->basicinfo->meta_tag}}</span> 
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
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Meta Description:</div>
                                <!--end::Label-->  
                                <!--end::Description-->
                                <div class="fw-bold fs-7 text-gray-600">
                                {{ $data->basicinfo->meta_tag_description}}
                                </div>
                                <!--end::Description-->  
                            </div>
                            <!--end::Col-->  
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Meta Keywords:</div>
                                <!--end::Label-->  
                                <!--end::Description-->
                                <div class="fw-bold fs-7 text-gray-600">                      
                                {{ $data->basicinfo->meta_keywords}}             
                                </div>
                                <!--end::Description-->   
                            </div>
                            <!--end::Col-->  
                            <!--end::Col-->
                            <div class="col-sm-12">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Page Content:</div>
                                <!--end::Label-->  
                                <!--end::Description-->
                                <div class="fw-semibold fs-7 text-gray-600">                      
                                {!! $data->dynamic_page_content->page_content_en ??'' !!}             
                                </div>
                                <!--end::Description-->   
                            </div>
                            <!--end::Col-->  
                            <!--end::Col-->
                            <div class="col-sm-12">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Page Banner:</div>
                                <!--end::Label-->  
                                <!--end::Description-->
                                <div class="fw-semibold fs-7 text-gray-600">   
                                    @if(isset($data->dynamic_page_banner->public_url))                   
                                    <img src="{{ asset('resources/uploads/pagebanner/'.$data->dynamic_page_banner->public_url) }}" style="width: 250px;">  
                                    @endif           
                                </div>
                                <!--end::Description-->   
                            </div>
                            <!--end::Col-->  
                            </div>
                            <!--end::Row-->   
                            <!--begin::Content-->
                            <div class="flex-grow-1">
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Page PDF:</div>
                                <!--begin::Table-->
                                <div class="table-responsive border-bottom mb-9">
                                <table class="table mb-3">
                                    <thead>
                                        <tr class="border-bottom fs-6 fw-bold text-muted">
                                        <th class=" pb-2">PDF Title</th>
                                        <th class="text-end pb-2">PDF File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data->dynamic_content_page_pdf as $datas)
                                        <tr class="fw-bold text-gray-700 fs-5 text-end">
                                        <td class="d-flex align-items-center pt-6">                                            
                                            <i class="fa fa-genderless text-danger fs-2 me-2"></i>                                           
                                            {{$datas->pdf_title ?? ''}}
                                        </td>
                                            <td class="">
                                            <a href="{{ asset('resources/uploads/PageContentPdf/'.$datas->public_url ??'') }}" download="">View</a>    
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!--end::Table-->                     
                            </div>
                            <!--end::Content-->    
                            <!--begin::Content-->
                            <div class="flex-grow-1">
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Page Gallery:</div>
                                <!--begin::Table-->
                                <div class="table-responsive border-bottom mb-9">
                                <table class="table mb-3">
                                    <thead>
                                        <tr class="border-bottom fs-6 fw-bold text-muted">
                                        <th class=" pb-2">Image Title</th>
                                        <th class="text-end pb-2">Image File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data->dynamic_content_page_gallery as $datas)
                                        <tr class="fw-bold text-gray-700 fs-5 text-end">
                                        <td class="d-flex align-items-center pt-6">                                            
                                            <i class="fa fa-genderless text-danger fs-2 me-2"></i>                                           
                                            {{$datas->image_title ?? ''}}
                                        </td>
                                            <td class="">
                                            <a href="{{ asset('resources/uploads/PageContentGallery/'.$datas->public_url ??'') }}" download="">View</a>    
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