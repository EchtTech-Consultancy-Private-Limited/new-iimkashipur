@extends('cms-view.layouts.main')
@section('title')
    {{__('Employee View')}}
@endsection
@section('pageTitle')
 {{ __('Employee') }}
@endsection
@section('breadcrumbs')
 {{ __('Employee View') }}
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
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    @if(is_file(asset('resources/uploads/empDirectory/'.$data->list->public_url)))
                                        <img src="{{ asset('resources/uploads/empDirectory/'.$data->list->public_url)  }}"  class="image-input-wrapper w-125px h-125px mb-4">
                                    @else
                                        <span class="symbol-label font-size-h10 font-weight-bold">
                                            {{ strtoupper(substr(isset($data->list->fname_en)?$data->list->fname_en:'', 0, 1)).strtoupper(substr(isset($data->list->mname_en)?$data->list->mname_en:'', 0, 1)).strtoupper(substr(isset($data->list->lname_en)?$data->list->lname_en:'', 0, 1))  }}   
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!--begin::Label-->
                            <div class="fw-bold fs-3 text-gray-800">{{ $data->list->fname_en ??'' }} {{ $data->list->mname_en ??'' }} {{ $data->list->lname_en ??'' }} 
                                ({{ $data->list->fname_hi ??'' }} {{ $data->list->mname_hi ??'' }} {{ $data->list->lname_hi ??'' }})</div>
                            <div class=" text-gray-800 mt-2"><span class="badge-lg badge-light-primary d-inline">Department:</span> {{ $data->list->depart_name ??'' }}</div> 
                            <div class=" text-gray-800 mt-2"><span class="badge-lg badge-light-primary d-inline">Designation:</span> {{ $data->list->desig_name ??'' }}</div>
                            <div class="d-flex gap-2 mb-8 mt-2">
                                @if(isset($data->list->facebook) && $data->list->facebook !=null)
                                <a href="{{ $data->list->facebook  }}" target="_blank">
                                <img src="{{ asset('assets-cms/media/svg/brand-logos/facebook-4.svg') }}" class="w-20px" alt="">
                                </a>
                                @endif
                                @if(isset($data->list->twitter) && $data->list->twitter !=null)
                                <a href="{{ $data->list->twitter  }}" target="_blank">
                                <img src="{{ asset('assets-cms/media/svg/brand-logos/twitter-2.svg') }}" class="w-20px" alt="">
                                </a>
                                @endif
                                @if(isset($data->list->linked_in) && $data->list->linked_in !=null)
                                <a href="{{ $data->list->linked_in  }}" target="_blank">
                                <img src="{{ asset('assets-cms/media/svg/brand-logos/linkedin-2.svg') }}" class="w-20px" alt="">
                                </a>
                                <!-- <a href="{{ $data->list->google_link  }}">
                                <img src="{{ asset('assets-cms/media/svg/brand-logos/youtube-3.svg') }}" class="w-20px" alt="">
                                </a> -->
                                @endif
                                @if(isset($data->list->google_link) && $data->list->google_link !=null)
                                <a href="{{ $data->list->google_link  }}" target="_blank">
                                <img src="{{ asset('assets-cms/media/svg/brand-logos/google-icon.svg') }}" class="w-20px" alt="">
                                </a>
                                @endif
                                @if(isset($data->list->gitHub) && $data->list->gitHub !=null)
                                <a href="{{ $data->list->gitHub  }}" target="_blank">
                                <img src="{{ asset('assets-cms/media/svg/brand-logos/github.svg') }}" class="w-20px" alt="">
                                </a>
                                @endif
                                @if(isset($data->list->instagram) && $data->list->instagram !=null)
                                <a href="{{ $data->list->instagram  }}" target="_blank">
                                <img src="{{ asset('assets-cms/media/svg/brand-logos/instagram-2-1.svg') }}" class="w-20px" alt="">
                                </a>
                                @endif
                            </div>
                            <!--end::Label-->  
                            <!--begin::Row-->
                            <div class="row g-5 mb-11">
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1"><span class="badge-lg badge-light-primary d-inline">Mobile & Landline:</span></div>
                                <!--end::Label-->  
                                <!--end::Col-->
                                <div class="fw-bold fs-6 text-gray-800">{{ $data->list->mobile }} / {{ $data->list->landline_number }}</div>
                                <span class="fs-7 text-danger d-flex align-items-center">
                                <span class="bullet bullet-dot bg-danger me-2"></span> 
                                    Extention Number: {{ $data->list->extention_number }}
                                </span>
                                <!--end::Col-->  
                            </div>
                            <!--end::Col-->  
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1"><span class="badge-lg badge-light-primary d-inline">Mail ID:</span></div>
                                <!--end::Label-->  
                                <!--end::Info-->
                                <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                    <span class="pe-2">{{ $data->list->email }}</span> 
                                    
                                </div>
                                <!--end::Info-->  
                            </div>
                            <!--end::Col-->  
                            </div>
                            <!--end::Row-->   
                            <!--begin::Row-->
                            <div class="row g-5 mb-12">
                            <!--end::Col-->
                            <div class="col-sm-12">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1"><span class="badge-lg badge-light-primary d-inline">Description:</span></div>
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