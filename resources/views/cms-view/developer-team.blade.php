@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Developer')}}
@endsection
@section('pageTitle')
 {{ __('Developer') }}
@endsection
@section('breadcrumbs')
 {{ __('Developer Listing') }}
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="tab-content">
   <div id="kt_project_users_card_pane" class="tab-pane fade show active">
      <div class="row g-6 g-xl-9">
         <div class="col-md-6 col-xxl-4">
            <!--begin::Card-->
            <div class="card ">
               <!--begin::Card body-->
               <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                  <!--begin::Avatar-->
                  <div class="symbol symbol-65px symbol-circle mb-5">
                     <img src="{{$tream['profile1']}}" alt="image" />
                     <div class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                  </div>
                  <!--end::Avatar-->
                  <!--begin::Name-->
                  <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$tream['name1']}}</a>
                  <!--end::Name-->
                  <!--begin::Position-->
                  <div class="fw-semibold text-gray-400 mb-6">{{$tream['desgination1']}}</div>
                  <!--end::Position-->
                  <!--begin::Info-->
                  <div class="d-flex flex-center flex-wrap">
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['project1']}}</div>
                        <div class="fw-semibold text-gray-400">Project</div>
                     </div>
                     <!--end::Stats-->
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['module1']}}</div>
                        <div class="fw-semibold text-gray-400">Module</div>
                     </div>
                     <!--end::Stats-->
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['migration1']}}</div>
                        <div class="fw-semibold text-gray-400">Migration</div>
                     </div>
                     <!--end::Stats-->
                  </div>
                  <!--end::Info-->
               </div>
               <!--end::Card body-->
            </div>
            <!--end::Card-->
         </div>
         <div class="col-md-6 col-xxl-4">
            <!--begin::Card-->
            <div class="card ">
               <!--begin::Card body-->
               <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                  <!--begin::Avatar-->
                  <div class="symbol symbol-65px symbol-circle mb-5">
                     <img src="{{$tream['profile2']}}" alt="image" />
                     <div class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                  </div>
                  <!--end::Avatar-->
                  <!--begin::Name-->
                  <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$tream['name2']}}</a>
                  <!--end::Name-->
                  <!--begin::Position-->
                  <div class="fw-semibold text-gray-400 mb-6">{{$tream['desgination2']}}</div>
                  <!--end::Position-->
                  <!--begin::Info-->
                  <div class="d-flex flex-center flex-wrap">
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['project2']}}</div>
                        <div class="fw-semibold text-gray-400">Project</div>
                     </div>
                     <!--end::Stats-->
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['module2']}}</div>
                        <div class="fw-semibold text-gray-400">Module</div>
                     </div>
                     <!--end::Stats-->
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['migration2']}}</div>
                        <div class="fw-semibold text-gray-400">Migration</div>
                     </div>
                     <!--end::Stats-->
                  </div>
                  <!--end::Info-->
               </div>
               <!--end::Card body-->
            </div>
            <!--end::Card-->
         </div>
         <div class="col-md-6 col-xxl-4">
            <!--begin::Card-->
            <div class="card ">
               <!--begin::Card body-->
               <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                  <!--begin::Avatar-->
                  <div class="symbol symbol-65px symbol-circle mb-5">
                     <img src="{{$tream['profile3']}}" alt="image" />
                     <div class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                  </div>
                  <!--end::Avatar-->
                  <!--begin::Name-->
                  <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$tream['name3']}}</a>
                  <!--end::Name-->
                  <!--begin::Position-->
                  <div class="fw-semibold text-gray-400 mb-6">{{$tream['desgination3']}}</div>
                  <!--end::Position-->
                  <!--begin::Info-->
                  <div class="d-flex flex-center flex-wrap">
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['project3']}}</div>
                        <div class="fw-semibold text-gray-400">Project</div>
                     </div>
                     <!--end::Stats-->
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['module3']}}</div>
                        <div class="fw-semibold text-gray-400">Module</div>
                     </div>
                     <!--end::Stats-->
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['migration3']}}</div>
                        <div class="fw-semibold text-gray-400">Migration</div>
                     </div>
                     <!--end::Stats-->
                  </div>
                  <!--end::Info-->
               </div>
               <!--end::Card body-->
            </div>
            <!--end::Card-->
         </div>
         <div class="col-md-6 col-xxl-4">
            <!--begin::Card-->
            <div class="card ">
               <!--begin::Card body-->
               <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                  <!--begin::Avatar-->
                  <div class="symbol symbol-65px symbol-circle mb-5">
                     <img src="{{$tream['profile4']}}" alt="image" />
                     <div class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                  </div>
                  <!--end::Avatar-->
                  <!--begin::Name-->
                  <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$tream['name4']}}</a>
                  <!--end::Name-->
                  <!--begin::Position-->
                  <div class="fw-semibold text-gray-400 mb-6">{{$tream['desgination4']}}</div>
                  <!--end::Position-->
                  <!--begin::Info-->
                  <div class="d-flex flex-center flex-wrap">
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['project4']}}</div>
                        <div class="fw-semibold text-gray-400">Project</div>
                     </div>
                     <!--end::Stats-->
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['module4']}}</div>
                        <div class="fw-semibold text-gray-400">Module</div>
                     </div>
                     <!--end::Stats-->
                     <!--begin::Stats-->
                     <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">{{$tream['migration4']}}</div>
                        <div class="fw-semibold text-gray-400">Migration</div>
                     </div>
                     <!--end::Stats-->
                  </div>
                  <!--end::Info-->
               </div>
               <!--end::Card body-->
            </div>
            <!--end::Card-->
         </div>
         <!--end::Col-->
      </div>
   </div>
</div>

    
@endsection