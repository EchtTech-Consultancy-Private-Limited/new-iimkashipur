@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Dashboard')}}
@endsection
@section('pageTitle')
 {{ __('Dashboard') }}
@endsection
@section('breadcrumbs')
 {{ __('Dashboard') }}
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
<!--begin::Row-->
   <div class="row gy-5 g-xl-10">
      <!--begin::Col-->
      @if(isset(Auth::user()->role_id) == '1' && Auth::user()->role_id == '1' || isset(Auth::user()->role_id) == '2' && Auth::user()->role_id == '2')
      <div class="col-sm-6 col-xl-2 mb-xl-10">
         <!--begin::Card widget 2-->
         <div class="card h-lg-100">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
               <!--begin::Icon--> 
               <div class="m-0">
                  <i class="ki-outline ki-address-book fs-2hx text-gray-600"></i>                     
               </div>
               <!--end::Icon-->
               <!--begin::Section--> 
               <div class="d-flex flex-column my-7">
                  <!--begin::Number-->           
                  <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$total['users']}}</span> 
                  <!--end::Number--> 
                  <!--begin::Follower-->
                  <div class="m-0">
                     <span class="fw-semibold fs-6 text-gray-400">Users </span>  
                  </div>
                  <!--end::Follower--> 
               </div>
               <!--end::Section-->          
               <!--begin::Badge--> 
               <!-- <span class="badge badge-light-success fs-base">
               <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i> 
               2.1%
               </span>   -->
               <!--end::Badge-->                              
            </div>
            <!--end::Body-->
         </div>
         <!--end::Card widget 2-->
      </div>
      <!--end::Col-->
      <!--begin::Col-->
      <div class="col-sm-6 col-xl-2 mb-xl-10">
         <!--begin::Card widget 2-->
         <div class="card h-lg-100">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
               <!--begin::Icon--> 
               <div class="m-0">
                  <i class="ki-outline ki-menu fs-2hx text-gray-600"></i>                     
               </div>
               <!--end::Icon-->
               <!--begin::Section--> 
               <div class="d-flex flex-column my-7">
                  <!--begin::Number-->           
                  <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$total['menu']}}</span> 
                  <!--end::Number--> 
                  <!--begin::Follower-->
                  <div class="m-0">
                     <span class="fw-semibold fs-6 text-gray-400"> Menu</span>  
                  </div>
                  <!--end::Follower--> 
               </div>
               <!--end::Section-->          
               <!--begin::Badge--> 
               <!-- <span class="badge badge-light-success fs-base">
               <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i> 
               2.1%
               </span>   -->
               <!--end::Badge-->                              
            </div>
            <!--end::Body-->
         </div>
         <!--end::Card widget 2-->
      </div>
      <!--end::Col-->
      <!--begin::Col-->
      <div class="col-sm-6 col-xl-2 mb-xl-10">
         <!--begin::Card widget 2-->
         <div class="card h-lg-100">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
               <!--begin::Icon--> 
               <div class="m-0">
                  <i class="ki-outline ki-abstract-25 fs-2hx text-gray-600"></i>                     
               </div>
               <!--end::Icon-->
               <!--begin::Section--> 
               <div class="d-flex flex-column my-7">
                  <!--begin::Number-->           
                  <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$total['event']}}</span> 
                  <!--end::Number--> 
                  <!--begin::Follower-->
                  <div class="m-0">
                     <span class="fw-semibold fs-6 text-gray-400"> Events </span>  
                  </div>
                  <!--end::Follower--> 
               </div>
               <!--end::Section-->          
               <!--begin::Badge--> 
               <!-- <span class="badge badge-light-danger fs-base">
               <i class="ki-outline ki-arrow-down fs-5 text-danger ms-n1"></i>                  
               0.47%
               </span>   -->
               <!--end::Badge-->                              
            </div>
            <!--end::Body-->
         </div>
         <!--end::Card widget 2-->
      </div>
      <!--end::Col-->
      <!--begin::Col-->
      <div class="col-sm-6 col-xl-2 mb-xl-10">
         <!--begin::Card widget 2-->
         <div class="card h-lg-100">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
               <!--begin::Icon--> 
               <div class="m-0">
                  <i class="ki-outline ki-element-12 fs-2hx text-gray-600"></i>                     
               </div>
               <!--end::Icon-->
               <!--begin::Section--> 
               <div class="d-flex flex-column my-7">
                  <!--begin::Number-->           
                  <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$total['tender']}}</span> 
                  <!--end::Number--> 
                  <!--begin::Follower-->
                  <div class="m-0">
                     <span class="fw-semibold fs-6 text-gray-400">Tenders</span>  
                  </div>
                  <!--end::Follower--> 
               </div>
               <!--end::Section-->          
               <!--begin::Badge--> 
               <!-- <span class="badge badge-light-success fs-base">
               <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i> 
               2.1%
               </span>   -->
               <!--end::Badge-->                              
            </div>
            <!--end::Body-->
         </div>
         <!--end::Card widget 2-->
      </div>
      <!--end::Col-->
      <!--begin::Col-->
      <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
         <!--begin::Card widget 2-->
         <div class="card h-lg-100">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
               <!--begin::Icon--> 
               <div class="m-0">
                  <i class="ki-outline ki-element-6 fs-2hx text-gray-600"></i>                     
               </div>
               <!--end::Icon-->
               <!--begin::Section--> 
               <div class="d-flex flex-column my-7">
                  <!--begin::Number-->           
                  <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$total['news']}}</span> 
                  <!--end::Number--> 
                  <!--begin::Follower-->
                  <div class="m-0">
                     <span class="fw-semibold fs-6 text-gray-400">News </span>  
                  </div>
                  <!--end::Follower--> 
               </div>
               <!--end::Section-->          
               <!--begin::Badge--> 
               <!-- <span class="badge badge-light-danger fs-base">
               <i class="ki-outline ki-arrow-down fs-5 text-danger ms-n1"></i>                  
               0.647%
               </span>   -->
               <!--end::Badge-->                              
            </div>
            <!--end::Body-->
         </div>
         <!--end::Card widget 2-->
      </div>
      <!--end::Col-->
      <!--begin::Col-->
      <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
         <!--begin::Card widget 2-->
         <div class="card h-lg-100">
            <!--begin::Body-->
            <div class="card-body d-flex justify-content-between align-items-start flex-column">
               <!--begin::Icon--> 
               <div class="m-0">
                  <i class="ki-outline ki-people fs-2hx text-gray-600"></i>                     
               </div>
               <!--end::Icon-->
               <!--begin::Section--> 
               <div class="d-flex flex-column my-7">
                  <!--begin::Number-->           
                  <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$total['employee']}}</span> 
                  <!--end::Number--> 
                  <!--begin::Follower-->
                  <div class="m-0">
                     <span class="fw-semibold fs-6 text-gray-400">Employee </span>  
                  </div>
                  <!--end::Follower--> 
               </div>
               <!--end::Section-->          
               <!--begin::Badge--> 
               <!-- <span class="badge badge-light-success fs-base">
               <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i> 
               2.1%
               </span>   -->
               <!--end::Badge-->                              
            </div>
            <!--end::Body-->
         </div>
      </div>
      @endif
   </div>
      

@endsection