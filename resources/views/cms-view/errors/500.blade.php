@extends('cms-view.layouts.main')
@section('title')
@parent
| {{__('Error-500')}}
@endsection
@section('pageTitle')
{{ __('Error') }}
@endsection
@section('breadcrumbs')
{{ __('Error-500') }}
@endsection
@section('content')
<div class="error error-5 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url({{ asset('assets-cms/media/error/bg5.jpg') }});">
    <!--begin::Content-->
    <div class="container d-flex flex-row-fluid flex-column justify-content-md-center p-12">
        <h1 class="error-title font-weight-boldest text-info mt-10 mt-md-0 mb-12">Oops!</h1>
        <p class="font-weight-boldest display-4">Something went wrong here.</p>
        <p class="font-size-h3">We have been notified and we'll get it fixed as soon as possible.</p>
        <p class="font-size-h3">You can go back using browser Back button or <a href="{{route('dashboard')}}" class="">Go To Dashboard.</a></p>
    </div>
    <!--end::Content-->
</div>
@endsection

@push("post-scripts")
<script>
    trackHttpErrorPage("500")
</script>   
@endpush