@extends('cms-view.layouts.main')
@section('title')
@parent
    | {{__('FAQ')}}
@endsection
@section('pageTitle')
 {{ __('FAQ') }}
@endsection
@section('breadcrumbs')
 {{ __('FAQ Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/faq-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
   <div id="kt_content_container" class="container-xxl">
      <div class="card card-flush">
         <div class="card-body">
            <form id="kt_faq_update_form" class="form">
                     <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Question (English)</label>
                        <div class="col-md-12">
                           <input type="text" name="question_en" class="form-control form-control-solid mb-3 mb-lg-0 question_en" id="question_en" placeholder="Question name" value="{{ $data->question_en }}" />
                        </div>
                     </div>
                     <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">सवाल (हिन्दी में)</label>
                        <div class="col-md-12">
                           <input type="text" name="question_hi" class="form-control form-control-solid mb-3 mb-lg-0 question_hi" id="question_hi" placeholder="सवाल नाम" value="{{ $data->question_hi }}" />
                        </div>
                     </div>
                     <div class="fv-row mb-7">
                           <label class="form-label required">Answer (English)</label>
                              <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en">{!! $data->answer_en !!}</div>
                           <div class="text-muted fs-7">Set a Answer to the news for better visibility.</div>
                     </div>
                     <div class="fv-row mb-7">
                        <label class="form-label mt-8">उत्तर (हिन्दी में)</label>
                           <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi">{!! $data->answer_hi !!}</div>
                        <div class="text-muted fs-7">Set a Answer to the Answer for better visibility.</div>
                     </div>
                  <div class="text-center pt-15">
                     <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                     {{config('FormField.cancel_button')}}
                     </button>
                     <button type="submit" id="kt_update_faq_submit" class="btn btn-primary submit-faq-btn" data-kt-users-modal-action="submit">
                     <span class="indicator-label">
                     {{config('FormField.save_button')}}
                     </span>
                     <span class="indicator-progress">
                     Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                     </span>
                     </button>
                  </div>
            </form>
         </div>
      </div>
@include('cms-view.dynamic-form-management.faq-add')
@endsection