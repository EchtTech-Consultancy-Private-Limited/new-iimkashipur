@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('Error-401')}}
@endsection
@section('pageTitle')
{{ __('Error') }}
@endsection
@section('breadcrumbs')
{{ __('Error-401') }}
@endsection
@section('content')
<div class="error error-5 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url({{ asset('assets-cms/media/error/bg3.jpg') }});">
    <!--begin::Content-->
    <div class="container d-flex flex-row-fluid flex-column justify-content-md-center p-12">
        <h1 class="error-title font-weight-boldest text-info mt-10 mt-md-0 mb-12">401 | UNAUTHORIZED</h1>
        <p class="font-weight-boldest display-4">You are not authorized to perform this action!</p>
        <p class="font-size-h3">If you need access, please contact CMS Owner.</a></p>
        <p class="font-size-h3">You can go back using browser Back button or <a href="{{route('dashboard')}}" class="">Go To Dashboard.</a></p>
    </div>
    <!--end::Content-->
</div> 
@endsection

@push("post-scripts")
<script>
    trackHttpErrorPage("401")
</script>   
@endpush