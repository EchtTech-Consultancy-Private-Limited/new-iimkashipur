@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Permission')}}
@endsection
@section('pageTitle')
 {{ __('Permission') }}
@endsection
@section('breadcrumbs')
 {{ __('Permission Listing') }}
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
            @foreach($permissionAllow as $permissionAllows)
                @foreach($permissionAllows as $permissionAllowse)
                    <div class="col-md-4">
                        <div class="card card-flush h-md-100">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ $permissionAllowse->roleTypeName->role_type }}</h2>
                                </div>
                            </div>
                            <div class="card-body pt-1">
                                <div class="fw-bold text-gray-600 mb-5">Total Access with this role: {{ count($permissionAllowse->permissionAllow) }}</div>
                                <div class="d-flex flex-column text-gray-600">
                                @foreach($permissionAllowse->permissionAllow as $permission)
                                    <div class="d-flex align-items-center py-2 wordcomplete" style="display:none !important;"><span class="bullet bg-primary me-3"></span> {{$permission->module_name}}: <br>Create: {{($permission->create =='Y')?'Yes':'No'}} | Read: {{($permission->read =='Y')?'Yes':'No'}}
                                        | View: {{($permission->view =='Y')?'Yes':'No'}} | Update: {{($permission->update =='Y')?'Yes':'No'}} | Delete: {{($permission->delete =='Y')?'Yes':'No'}}
                                        | Approver: {{($permission->approver =='Y')?'Yes':'No'}} | Publisher: {{($permission->publisher =='Y')?'Yes':'No'}}
                                    </div>
                                @endforeach
                                    <div class='d-flex align-items-center py-2 more'><span class='bullet bg-primary me-3 '></span> <em>and 7 more...</em></div>
                                </div>
                            </div>
                            <div class="card-footer flex-wrap pt-0">
                                <a href="{{ route('role.edit') }}?id={{ $permission->role_id ?? ''}}" class="btn btn-light btn-active-primary my-1 me-2">Edit Role</a>
                                <!-- <button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Edit Role</button> -->
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
    <div class="ol-md-4">
        <!--begin::Card-->
        <div class="card h-md-100">
            <!--begin::Card body-->
            <div class="card-body d-flex flex-center">
                <!--begin::Button-->
                <a href="{{ route('role.create') }}" class="btn btn-clear d-flex flex-column flex-center">
                    <!--begin::Illustration-->
                    <img src="{{ asset('assets-cms/media/illustrations/unitedpalms-1/4.png') }}" alt="" class="mw-100 mh-150px mb-7"/>                      
                    <!--end::Illustration-->

                    <!--begin::Label-->
                    <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                    <!--end::Label-->
                </a>
                <!--begin::Button-->
            </div>
            <!--begin::Card body-->
        </div>
        <!--begin::Card-->
    </div>
</div>
@endsection
@push('post-scripts')

@endpush
