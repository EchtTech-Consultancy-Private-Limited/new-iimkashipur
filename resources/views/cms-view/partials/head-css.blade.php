<title>@section('title'){{ config('app.name') }}@show</title>
<meta http-equiv="cache-control" content="private, max-age=0, no-cache">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8"/>
<meta name="description" content=" "/>
<meta name="keywords" content=" "/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>      
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content=" " />
<meta property="og:url" content=""/>
<meta property="og:site_name" content="ECHTTECH | CRM" />
<link rel="shortcut icon" href="{{ asset(config('constants.default.favicon')) }}"/>
<link href="{{ asset('assets-cms/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets-cms/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets-cms/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets-cms/cms_css/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets-cms/cms_css/cms-css.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets-cms/cms_css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<script>if (window.top != window.self) { window.top.location.replace(window.self.location.href);}</script>
@stack('post-css')