@extends('cms-view.layouts.main')
@section('title')
    {{__('Menu Tree')}}
@endsection
@section('pageTitle')
 {{ __('Menu') }}
@endsection
@section('breadcrumbs')
 {{ __('Menu Tree') }}
@endsection
@push('post-css')
<link href="{{ asset('assets-cms/cms_css/tree.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body p-lg-20">
                <div class="d-flex flex-column flex-xl-row">
                <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                    <span class="display">Show Menu: </span>
                    <input checked data-tooltip='first level' id='radio-1' name='test' type='radio' /><label for="radio-1">First level</label>
                    <input id='radio-2' data-tooltip='second level' name='test' type='radio' /><label for="radio-2">Second level</label>
                    <input id='radio-3' data-tooltip='third level' name='test' type='radio' /><label for="radio-3">Third & Fourth level</label>
                    <!-- <input id='radio-4' data-tooltip='Fourth level' name='test' type='radio' /><label for="radio-4">Fourth level</label> -->
                <ol class="wtree">
                    @if (isset($headerMenu) && count($headerMenu) > 0)
                    @foreach($data->list as $menu)
                    <li><span>{{ $menu->name_en }}</span>
                    <ol>
                        @if (isset($menu->children) && count($menu->children) > 0)
                        @foreach($menu->children as $submenu)
                        <li>
                            <span>{{ $submenu->name_en }}</span>
                            <ol>
                                @if (isset($submenu->children) && count($submenu->children) > 0)
                                @foreach($submenu->children as $subsubmenu)
                                <li><span>{{ $subsubmenu->name_en }}</span></li>
                                @endforeach
                                @endif
                                <ol>
                                    @if (isset($subsubmenu->children) && count($subsubmenu->children) > 0)
                                    @foreach($subsubmenu->children as $subsubsubmenu)
                                    <li><span>{{ $subsubsubmenu->name_en }}</span></li>
                                    @endforeach
                                    @endif
                                </ol>
                            </ol>
                        </li>
                        @endforeach
                        @endif
                    </ol>
                </li>
                @endforeach
                @endif
            </ol>
@endsection