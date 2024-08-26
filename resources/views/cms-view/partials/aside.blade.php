<div class="aside-menu flex-column-fluid">
   <div
      class="hover-scroll-overlay-y py-2"
      id="kt_aside_menu_wrapper"
      data-kt-scroll="true"
      data-kt-scroll-activate="{default: false, lg: true}"
      data-kt-scroll-height="auto"     
      data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
      data-kt-scroll-wrappers="#kt_aside_menu" 
      data-kt-scroll-offset="0"
      >
      <!-- <//?php //dd($modelname) ?> -->
      <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
         <div  class="menu-item here show menu-accordion" >
            <span class="menu-link" >
               <span  class="menu-icon" ><i class="ki-outline ki-element-11 fs-2"></i></span>
               <span  class="menu-title" style="transform: rotateZ(0deg);">
            <a href="{{ route('dashboard') }}">{{ config('menu.dashboard') }}</a></span>
            <span class="menu-arrow-o" style="transform: rotate(90deg) !important;"></span></span><!--end:Menu link--><!--begin:Menu sub-->
         </div>
         <div  class="menu-item pt-5" >
            <div  class="menu-content" ><span class="menu-heading fw-bold text-uppercase fs-7">{{ config('menu.usermanagement') }}</span></div>
         </div>
         <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['user/user-list','role/role-create','role/role-list','permission/permission-list','newrole/new-role-list']) }} {{ (request()->is('role/role-create/*')) ? 'hover show' : '' }}{{ (request()->is('role/role-list/*')) ? 'hover show' : '' }}{{ (request()->is('user/user-list/*')) ? 'hover show' : '' }}{{ (request()->is('permission/permission-list/*')) ? 'hover show' : '' }}{{ (request()->is('newrole/new-role-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span class="menu-icon" ><i class="ki-outline ki-address-book fs-2"></i></span><span  class="menu-title" >{{ config('menu.usermanagement') }}</span><span class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion {{ set_active(['role/role-create','role/role-list','user/role-list','newrole/new-role-list']) }} {{ (request()->is('role/role-create/*')) ? 'show' : '' }}{{ (request()->is('role/role-list/*')) ? 'show' : '' }}{{ (request()->is('user/role-list/*')) ? 'show' : '' }}{{ (request()->is('newrole/new-role-list/*')) ? 'show' : '' }}" >
               <div  data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['user/list']) }}{{ (request()->is('user/list/*')) ? 'hover show' : '' }} mb-1" >
                  <span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Users</span><span class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
                  <div  class="menu-sub menu-sub-accordion {{ set_active(['user/user-list']) }} {{ (request()->is('user/user-list/*')) ? 'show' : '' }}{{ (request()->is('user/user-list/*')) ? 'show' : '' }}" >
                     <div  class="menu-item" >
                        <a class="menu-link {{ set_active1(['user/user-list']) }} {{ (request()->is('user/user-list/*')) ? 'active' : '' }}" href="{{ route('user.list') }}" ><span class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >User List</span></a><!--end:Menu link-->
                     </div>
                  </div>
               </div>
               @if(isset(Auth::user()->role_id) == '1' && Auth::user()->role_id == '1' || isset(Auth::user()->role_id) == '2' && Auth::user()->role_id == '2')
               <div data-kt-menu-trigger="click"  class="menu-item menu-accordion {{ set_active(['role/role-create','role/role-list','newrole/new-role-list']) }} {{ (request()->is('role/role-create/*')) ? 'hover show' : '' }}{{ (request()->is('role/role-list/*')) ? 'hover show' : '' }}{{ (request()->is('newrole/new-role-list/*')) ? 'hover show' : '' }}" >
                  <span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                  <span  class="menu-title" >Roles & Permissions</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
                  <div class="menu-sub menu-sub-accordion {{ set_active(['role/role-create','role/role-list','newrole/new-role-list']) }} {{ (request()->is('role/role-create/*')) ? 'show' : '' }}{{ (request()->is('role/role-list/*')) ? 'show' : '' }}{{ (request()->is('newrole/new-role-list/*')) ? 'show' : '' }}" >
                     <div class="menu-item" >
                        <a class="menu-link {{ set_active1(['role/role-create']) }} {{ (request()->is('role/role-create/*')) ? 'active' : '' }}" href="{{ route('role.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Permission Create</span></a><!--end:Menu link-->
                        <a class="menu-link {{ set_active1(['role/role-list']) }} {{ (request()->is('role/role-list/*')) ? 'active' : '' }}" href="{{ route('role.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Permission List</span></a><!--end:Menu link-->
                        <a class="menu-link {{ set_active1(['newrole/new-role-list']) }} {{ (request()->is('newrole/new-role-list/*')) ? 'active' : '' }}" href="{{ route('newrole.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Roles List</span></a><!--end:Menu link-->
                     </div>
                  </div>
               </div>
               <!-- <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['permission/permission-list']) }} {{ (request()->is('permission/permission-list/*')) ? 'active' : '' }}"  href="{{ route('permission.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >{{ config('menu.permissions') }}</span></a>
               </div> -->
               @endif
            </div>
         </div>
         <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['employeedirectory/employeedirectory-create','employeedirectory/employeedirectory-list']) }}{{ (request()->is('employeedirectory/employeedirectory-create/*')) ? 'hover show' : '' }} {{ (request()->is('employeedirectory/employeedirectory-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span class="menu-icon" ><i class="ki-outline ki-people fs-2"></i></span>
            <span class="menu-title" >{{ config('menu.employeedirectory') }} </span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ set_active(['employeedirectory/employeedirectory-create','employeedirectory/employeedirectory-list']) }}{{ (request()->is('employeedirectory/employeedirectory-create/*')) ? 'show' : '' }} {{ (request()->is('employeedirectory/employeedirectory-list/*')) ? 'show' : '' }}" >
               <div class="menu-item" >
                  <a class="menu-link {{ set_active1(['employeedirectory/employeedirectory-create']) }} {{ (request()->is('employeedirectory/employeedirectory-create/*')) ? 'active' : '' }}"  href="{{ route('employeedirectory.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
                  <a class="menu-link {{ set_active1(['employeedirectory/employeedirectory-list']) }} {{ (request()->is('employeedirectory/employeedirectory-list/*')) ? 'active' : '' }}"  href="{{ route('employeedirectory.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['departmentdesignation/departmentdesignation-list','departmentdesignation/departmentdesignation-create']) }} {{ (request()->is('departmentdesignation/departmentdesignation-list/*')) ? 'hover show' : '' }}{{ (request()->is('departmentdesignation/departmentdesignation-create/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span class="menu-icon" ><i class="ki-outline ki-abstract-19 fs-2"></i></span>
            <span class="menu-title" >{{ config('menu.departmentdesignation') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ set_active(['departmentdesignation/departmentdesignation-list','departmentdesignation/departmentdesignation-create']) }} {{ (request()->is('departmentdesignation/departmentdesignation-list/*')) ? 'show' : '' }}{{ (request()->is('departmentdesignation/departmentdesignation-create/*')) ? 'show' : '' }}" >
               <div class="menu-item" >
                  <a class="menu-link {{ set_active1(['departmentdesignation/departmentdesignation-create']) }} {{ (request()->is('departmentdesignation/departmentdesignation-create/*')) ? 'active' : '' }}"  href="{{ route('departmentdesignation.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
                  <a class="menu-link {{ set_active1(['departmentdesignation/departmentdesignation-list']) }} {{ (request()->is('departmentdesignation/departmentdesignation-list/*')) ? 'active' : '' }}"  href="{{ route('departmentdesignation.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div  class="menu-item pt-5" >
            <div  class="menu-content" ><span class="menu-heading fw-bold text-uppercase fs-7">{{ config('menu.pagemanagement') }}</span></div>
         </div>
         <div  data-kt-menu-trigger="click" class="menu-item menu-accordion 
            {{ set_active(['menu/menu-create','menu/menu-list','menu/menu-tree']) }} 
            {{ (request()->is('menu/menu-create/*')) ? 'hover show' : '' }}
            {{ (request()->is('menu/menu-list/*')) ? 'hover show' : '' }}
            {{ (request()->is('menu/menu-tree/*')) ? 'hover show' : '' }}
            ">
            <span class="menu-link" ><span class="menu-icon" ><i class="ki-outline ki-menu fs-2"></i></span>
            <span  class="menu-title" >{{ config('menu.websitemenu') }} </span><span  class="menu-arrow" ></span></span>
            <div  class="menu-sub menu-sub-accordion menu-active-bg 
            {{ set_active(['menu/menu-create','menu/menu-list']) }} 
            {{ (request()->is('menu/menu-create/*')) ? 'show' : '' }}
            {{ (request()->is('menu/menu-list/*')) ? 'show' : '' }}
            {{ (request()->is('menu/menu-tree/*')) ? 'show' : '' }}
            ">
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['menu/menu-create']) }} {{ (request()->is('menu/menu-create/*')) ? 'active' : '' }}"  href="{{ route('menu.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create </span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['menu/menu-list']) }} {{ (request()->is('menu/menu-list/*')) ? 'active' : '' }}"  href="{{ route('menu.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['menu/menu-tree']) }} {{ (request()->is('menu/menu-tree/*')) ? 'active' : '' }}"  href="{{ route('menu.tree') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Menu Tree</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div  data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['websitecoresetting/websitecoresetting-create','websitecoresetting/logo-list','websitecoresetting/footercontent-list'
            ,'websitecoresetting/sociallink-list','websitecoresetting/advertisingpopup-list']) }} 
         {{ (request()->is('websitecoresetting/websitecoresetting-create/*')) ? 'hover show' : '' }}{{ (request()->is('websitecoresetting/logo-list/*')) ? 'hover show' : '' }}
         {{ (request()->is('websitecoresetting/footercontent-list/*')) ? 'hover show' : '' }}
         {{ (request()->is('websitecoresetting/sociallink-list/*')) ? 'hover show' : '' }}
         {{ (request()->is('websitecoresetting/advertisingpopup-list/*')) ? 'hover show' : '' }}
         " >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-setting-2 fs-2"></i></span><span  class="menu-title" >{{ config('menu.websitecoresettings') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion menu-active-bg 
            {{ set_active(['websitecoresetting/websitecoresetting-create','websitecoresetting/logo-list',
               'websitecoresetting/footercontent-list','websitecoresetting/sociallink-list',
               'websitecoresetting/advertisingpopup-list','websitecoresetting/socialmediacards-list'
               ,'websitecoresetting/headerrightlogo-list']) }}
             {{ (request()->is('websitecoresetting/websitecoresetting-create/*')) ? 'show' : '' }}{{ (request()->is('websitecoresetting/logo-list/*')) ? 'show' : '' }}
            {{ (request()->is('websitecoresetting/footercontent-list/*')) ? 'show' : '' }}
            {{ (request()->is('websitecoresetting/sociallink-list/*')) ? 'show' : '' }}
            {{ (request()->is('websitecoresetting/socialmediacards-list/*')) ? 'show' : '' }}
            {{ (request()->is('websitecoresetting/advertisingpopup-list/*')) ? 'show' : '' }}
            {{ (request()->is('websitecoresetting/headerrightlogo-list/*')) ? 'show' : '' }}
            " >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['websitecoresetting/websitecoresetting-create']) }} {{ (request()->is('websitecoresetting/websitecoresetting-create/*')) ? 'active' : '' }}"  href="{{ route('websitecoresetting.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Core Setting</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['websitecoresetting/advertisingpopup-list']) }} {{ (request()->is('websitecoresetting/advertisingpopup-list/*')) ? 'active' : '' }}"  href="{{ route('advertisingpopup.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Advertising Popup Listing</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['websitecoresetting/logo-list']) }} {{ (request()->is('websitecoresetting/logo-list/*')) ? 'active' : '' }}"  href="{{ route('logo.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title">Header Footer Logo Listing</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['websitecoresetting/headerrightlogo-list']) }} {{ (request()->is('websitecoresetting/headerrightlogo-list/*')) ? 'active' : '' }}"  href="{{ route('headerrightlogo.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title">Header Right Logo Listing</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['websitecoresetting/footercontent-list']) }} {{ (request()->is('websitecoresetting/footercontent-list/*')) ? 'active' : '' }}"  href="{{ route('footercontent.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Footer Content Listing</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['websitecoresetting/sociallink-list']) }} {{ (request()->is('websitecoresetting/sociallink-list/*')) ? 'active' : '' }}"  href="{{ route('sociallink.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Social Link Listing</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['websitecoresetting/socialmediacards-list']) }} {{ (request()->is('websitecoresetting/socialmediacards-list/*')) ? 'active' : '' }}"  href="{{ route('socialmediacards.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Social Media Listing</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div  data-kt-menu-trigger="click"  class="menu-item menu-accordion {{ set_active(['homebanner/homebanner-create','homebanner/homebanner-list']) }} {{ (request()->is('homebanner/homebanner-create/*')) ? 'hover show' : '' }}{{ (request()->is('homebanner/homebanner-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-picture fs-2"></i></span><span  class="menu-title" >{{ config('menu.homepagebanner') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion menu-active-bg {{ set_active(['homebanner/homebanner-create','homebanner/homebanner-list']) }} {{ (request()->is('homebanner/homebanner-create/*')) ? 'show' : '' }}{{ (request()->is('homebanner/homebanner-list/*')) ? 'show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['homebanner/homebanner-create']) }} {{ (request()->is('homebanner/homebanner-create/*')) ? 'active' : '' }}"  href="{{ route('homebanner.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['homebanner/homebanner-list']) }} {{ (request()->is('homebanner/homebanner-list/*')) ? 'active' : '' }}"  href="{{ route('homebanner.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         
         <div  data-kt-menu-trigger="click"  class="menu-item menu-accordion {{ set_active(['contentpage/contentpage-create','contentpage/contentpage-list']) }} {{ (request()->is('contentpage/contentpage-create/*')) ? 'hover show' : '' }}{{ (request()->is('contentpage/contentpage-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-document fs-2"></i></span><span  class="menu-title" >{{ config('menu.dynamiccontentpage') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion {{ set_active(['contentpage/contentpage-create','contentpage/contentpage-list']) }} {{ (request()->is('contentpage/contentpage-create/*')) ? 'show' : '' }}{{ (request()->is('contentpage/contentpage-list/*')) ? 'show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['contentpage/contentpage-create']) }} {{ (request()->is('contentpage/contentpage-create/*')) ? 'active' : '' }}"  href="{{ route('contentpage.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Page Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['contentpage/contentpage-list']) }} {{ (request()->is('contentpage/contentpage-list/*')) ? 'active' : '' }}"  href="{{ route('contentpage.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Listing</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div  data-kt-menu-trigger="click"  class="menu-item menu-accordion 
               {{ set_active(['homepagesection/homepagesection-create','homepagesection/homepagesection-list',
                  'homepagesection/newsection-list']) }} 
               {{ (request()->is('homepagesection/homepagesection-create/*')) ? 'hover show' : '' }}
               {{ (request()->is('homepagesection/homepagesection-list/*')) ? 'hover show' : '' }}
               {{ (request()->is('homepagesection/newsection-list/*')) ? 'hover show' : '' }}
               " >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-design fs-2"></i></span><span  class="menu-title" >{{ config('menu.homepagesection') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion menu-active-bg 
               {{ set_active(['homepagesection/homepagesection-create','homepagesection/homepagesection-list']) }} 
               {{ (request()->is('homepagesection/homepagesection-create/*')) ? 'show' : '' }}
               {{ (request()->is('homepagesection/homepagesection-list/*')) ? 'show' : '' }}
               {{ (request()->is('homepagesection/newsection-list/*')) ? 'show' : '' }}
               " >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['homepagesection/homepagesection-create']) }} {{ (request()->is('homepagesection/homepagesection-create/*')) ? 'active' : '' }}"  href="{{ route('homepagesection.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['homepagesection/homepagesection-list']) }} {{ (request()->is('homepagesection/homepagesection-list/*')) ? 'active' : '' }}"  href="{{ route('homepagesection.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['homepagesection/newsection-list']) }} {{ (request()->is('homepagesection/newsection-list/*')) ? 'active' : '' }}"  href="{{ route('newsection.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Section List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['recentactivity/recentactivity-list','recentactivity/recentactivity-create']) }} {{ (request()->is('recentactivity/recentactivity-list/*')) ? 'hover show' : '' }}{{ (request()->is('recentactivity/recentactivity-create/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span class="menu-icon" ><i class="ki-outline ki-abstract-22 fs-2"></i></span>
            <span class="menu-title" >{{ config('menu.recentactivity') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ set_active(['recentactivity/recentactivity-list','recentactivity/recentactivity-create']) }} {{ (request()->is('recentactivity/recentactivity-list/*')) ? 'show' : '' }}{{ (request()->is('recentactivity/recentactivity-create/*')) ? 'show' : '' }}" >
               <div class="menu-item" >
                  <a class="menu-link {{ set_active1(['recentactivity/recentactivity-create']) }} {{ (request()->is('recentactivity/recentactivity-create/*')) ? 'active' : '' }}"  href="{{ route('recentactivity.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
                  <a class="menu-link {{ set_active1(['recentactivity/recentactivity-list']) }} {{ (request()->is('recentactivity/recentactivity-list/*')) ? 'active' : '' }}"  href="{{ route('recentactivity.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['rtiassets/rtiassets-create','rtiassets/rtiassets-list','rtiapplicationresponses/rtiapplicationresponses-list']) }}{{ (request()->is('rtiassets/rtiassets-create/*')) ? 'hover show' : '' }} {{ (request()->is('rtiassets/rtiassets-list/*')) ? 'hover show' : '' }}{{ (request()->is('rtiapplicationresponses/rtiapplicationresponses-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span class="menu-icon" ><i class="ki-outline ki-abstract-21 fs-2"></i></span>
            <span class="menu-title" >{{ config('menu.RTIassets') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ set_active(['rtiassets/rtiassets-list','rtiassets/rtiassets-create','rtiapplicationresponses/rtiapplicationresponses-list']) }}{{ (request()->is('rtiassets/rtiassets-create/*')) ? 'show' : '' }} {{ (request()->is('rtiassets/rtiassets-list/*')) ? 'show' : '' }}{{ (request()->is('rtiapplicationresponses/rtiapplicationresponses-list/*')) ? 'show' : '' }}" >
               <div class="menu-item">
                  <a class="menu-link {{ set_active1(['rtiassets/rtiassets-create']) }} {{ (request()->is('rtiassets/rtiassets-create/*')) ? 'active' : '' }}"  href="{{ route('rtiassets.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
                  <a class="menu-link {{ set_active1(['rtiassets/rtiassets-list']) }} {{ (request()->is('rtiassets/rtiassets-list/*')) ? 'active' : '' }}"  href="{{ route('rtiassets.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
                  @if(config('particularAssets.rtiapplicationresponses') == 'true')
                  <a class="menu-link {{ set_active1(['rtiapplicationresponses/rtiapplicationresponses-list']) }} {{ (request()->is('rtiapplicationresponses/rtiapplicationresponses-list/*')) ? 'active' : '' }}"  href="{{ route('rtiapplicationresponses.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >RTI Application & Responses</span></a><!--end:Menu link-->
                  @endif
               </div>
            </div>
         </div>
         <div data-kt-menu-trigger="click"  class="menu-item menu-accordion {{ set_active(['faq/faq-list','maunalfileupload/maunalfileupload-list']) }} {{ (request()->is('faq/faq-list/*')) ? 'hover show' : '' }}{{ (request()->is('maunalfileupload/maunalfileupload-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-abstract-39 fs-2"></i></span>
            <span  class="menu-title" >{{ config('menu.dynamicformpages') }} </span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion {{ set_active(['faq/faq-list']) }} {{ (request()->is('faq/faq-list/*')) ? 'show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['faq/faq-list']) }} {{ (request()->is('faq/faq-list/*')) ? 'active' : '' }}"  href="{{ route('faq.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create FAQ</span></a><!--end:Menu link-->
               </div>
            </div>
            <div  class="menu-sub menu-sub-accordion {{ set_active(['maunalfileupload/maunalfileupload-list']) }} {{ (request()->is('maunalfileupload/maunalfileupload-list/*')) ? 'show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['maunalfileupload/maunalfileupload-list']) }} {{ (request()->is('maunalfileupload/maunalfileupload-list/*')) ? 'active' : '' }}"  href="{{ route('mfu.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create File Path</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div  data-kt-menu-trigger="click"  class="menu-item menu-accordion {{ set_active(['pgcs/pgcs-create','pgcs/pgcs-list']) }} {{ (request()->is('pgcs/pgcs-create/*')) ? 'hover show' : '' }}{{ (request()->is('pgcs/pgcs-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-abstract-38 fs-2"></i></span><span  class="menu-title" >{{ config('menu.privategovClient') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion menu-active-bg {{ set_active(['pgcs/pgcs-create','pgcs/pgcs-list']) }} {{ (request()->is('pgcs/pgcs-create/*')) ? 'show' : '' }}{{ (request()->is('pgcs/pgcs-list/*')) ? 'show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['pgcs/pgcs-create']) }} {{ (request()->is('pgcs/pgcs-create/*')) ? 'active' : '' }}"  href="{{ route('pgcs.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['pgcs/pgcs-list']) }} {{ (request()->is('pgcs/pgcs-list/*')) ? 'active' : '' }}"  href="{{ route('pgcs.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div  data-kt-menu-trigger="click"  class="menu-item menu-accordion {{ set_active(['gallerymanagement/gallerymanagement-create','gallerymanagement/gallerymanagement-list']) }} {{ (request()->is('gallerymanagement/gallerymanagement-create/*')) ? 'hover show' : '' }}{{ (request()->is('gallerymanagement/gallerymanagement-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-element-3 fs-2"></i></span><span  class="menu-title" >{{ config('menu.gallerymanagement') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion {{ set_active(['gallerymanagement/gallerymanagement-create','gallerymanagement/gallerymanagement-list']) }} {{ (request()->is('gallerymanagement/gallerymanagement-create/*')) ? 'hover show' : '' }}{{ (request()->is('gallerymanagement/gallerymanagement-list/*')) ? 'hover show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['gallerymanagement/gallerymanagement-create']) }} {{ (request()->is('gallerymanagement/gallerymanagement-create/*')) ? 'active' : '' }}"  href="{{ route('gallerymanagement.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Photo & Video Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link  {{ set_active1(['gallerymanagement/gallerymanagement-list']) }} {{ (request()->is('gallerymanagement/gallerymanagement-list/*')) ? 'active' : '' }}"   href="{{ route('gallerymanagement.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Listing</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div  data-kt-menu-trigger="click"  class="menu-item menu-accordion {{ set_active(['careers/careers-create','careers/careers-list']) }} {{ (request()->is('careers/careers-create/*')) ? 'hover show' : '' }}{{ (request()->is('careers/careers-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-element-2 fs-2"></i></span><span  class="menu-title" >{{ config('menu.careermanagement') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion {{ set_active(['careers/careers-create','careers/careers-list']) }} {{ (request()->is('careers/careers-create/*')) ? 'hover show' : '' }}{{ (request()->is('careers/careers-list/*')) ? 'hover show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['careers/careers-create']) }} {{ (request()->is('careers/careers-create/*')) ? 'active' : '' }}"  href="{{ route('careers.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['careers/careers-list']) }} {{ (request()->is('careers/careers-list/*')) ? 'active' : '' }}"  href="{{ route('careers.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div  data-kt-menu-trigger="click"  class="menu-item menu-accordion {{ set_active(['news/news-create','news/news-list']) }} {{ (request()->is('news/news-create/*')) ? 'hover show' : '' }}{{ (request()->is('news/news-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-element-6 fs-2"></i></span><span  class="menu-title" >{{ config('menu.newsmanagement') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion {{ set_active(['news/news-create','news/news-list']) }} {{ (request()->is('news/news-create/*')) ? 'hover show' : '' }}{{ (request()->is('news/news-list/*')) ? 'hover show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['news/news-create']) }} {{ (request()->is('news/news-create/*')) ? 'active' : '' }}"  href="{{ route('news.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['news/news-list']) }} {{ (request()->is('news/news-list/*')) ? 'active' : '' }}"  href="{{ route('news.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         <div  data-kt-menu-trigger="click" class="menu-item menu-accordion 
               {{ set_active(['tender/tender-create','tender/tender-list','purchaseworkscommittee/purchaseworkscommittee-list','tendertype/tendertype-list']) }} 
               {{ (request()->is('tender/tender-create/*')) ? 'hover show' : '' }}
               {{ (request()->is('tender/tender-list/*')) ? 'hover show' : '' }}
               {{ (request()->is('purchaseworkscommittee/purchaseworkscommittee-list/*')) ? 'hover show' : '' }}
               {{ (request()->is('tendertype/tendertype-list/*')) ? 'hover show' : '' }}
               " >
            <span class="menu-link" ><span class="menu-icon" ><i class="ki-outline ki-element-12 fs-2"></i></span><span  class="menu-title" >{{ config('menu.tendersmanagement') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion 
               {{ set_active(['tender/tender-create','tender/tender-list','purchaseworkscommittee/purchaseworkscommittee-list','tendertype/tendertype-list']) }} 
               {{ (request()->is('tender/tender-create/*')) ? 'show' : '' }}
               {{ (request()->is('tender/tender-list/*')) ? 'show' : '' }}
               {{ (request()->is('purchaseworkscommittee/purchaseworkscommittee-list/*')) ? 'show' : '' }}
               {{ (request()->is('tendertype/tendertype-list/*')) ? 'show' : '' }}
               " >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['tender/tender-create']) }} {{ (request()->is('tender/tender-create/*')) ? 'active' : '' }}" href="{{ route('tender.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['tender/tender-list']) }} {{ (request()->is('tender/tender-list/*')) ? 'active' : '' }}" href="{{ route('tender.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
               @if(config('particularAssets.purchaseworkscommittee') == 'true')
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['purchaseworkscommittee/purchaseworkscommittee-list']) }}{{ (request()->is('purchaseworkscommittee/purchaseworkscommittee-list/*')) ? 'active' : '' }}" href="{{ route('purchaseworkscommittee.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Purchase / Works / Committee</span></a><!--end:Menu link-->
               </div>
               @endif
               @if(config('particularAssets.tender_type') == 'true')
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['tendertype/tendertype-list']) }}{{ (request()->is('tendertype/tendertype-list/*')) ? 'active' : '' }}" href="{{ route('tendertype.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Tender Type List</span></a><!--end:Menu link-->
               </div>
               @endif
            </div>
         </div>
         <div  data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['event/event-create','event/event-list']) }} {{ (request()->is('event/event-create/*')) ? 'hover show' : '' }}{{ (request()->is('event/event-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-abstract-25 fs-2"></i></span><span  class="menu-title" >{{ config('menu.eventsmanagement') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion {{ set_active(['event/event-create','event/event-list']) }} {{ (request()->is('event/event-create/*')) ? 'show' : '' }}{{ (request()->is('event/event-list/*')) ? 'show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['event/event-create']) }} {{ (request()->is('event/event-create/*')) ? 'active' : '' }}" href="{{ route('event.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['event/event-list']) }} {{ (request()->is('event/event-list/*')) ? 'active' : '' }}" href="{{ route('event.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         @if(isset(Auth::user()->role_id) == '1' && Auth::user()->role_id == '1' || isset(Auth::user()->role_id) == '2' && Auth::user()->role_id == '2')
         <div  class="menu-item pt-5" >
            <div  class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">{{ config('menu.FB_title') }}</span></div>
         </div>
         <div  data-kt-menu-trigger="click" class="menu-item menu-accordion 
            {{ set_active(['formbuilder/formbuilder-create','formbuilder/formbuilder-list',
               'formbuilder/form-data-list','formmappingmenu/formmappingmenu-list']) }} 
            {{ (request()->is('formbuilder/formbuilder-create/*')) ? 'hover show' : '' }}
            {{ (request()->is('formbuilder/formbuilder-list/*')) ? 'hover show' : '' }}
            {{ (request()->is('formbuilder/form-data-list/*')) ? 'hover show' : '' }}
            {{ (request()->is('formmappingmenu/formmappingmenu-list/*')) ? 'hover show' : '' }}
            ">
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-abstract-9 fs-2"></i></span><span  class="menu-title" >{{ config('menu.FB_title') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion 
            {{ set_active(['formbuilder/formbuilder-create','formbuilder/formbuilder-list',
               'formbuilder/form-data-list','formmappingmenu/formmappingmenu-list']) }} 
            {{ (request()->is('formbuilder/formbuilder-create/*')) ? 'show' : '' }}
            {{ (request()->is('formbuilder/formbuilder-list/*')) ? 'show' : '' }}
            {{ (request()->is('formbuilder/form-data-list/*')) ? 'show' : '' }}
            {{ (request()->is('formmappingmenu/formmappingmenu-list/*')) ? 'show' : '' }}
            ">
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['formbuilder/formbuilder-create']) }} {{ (request()->is('formbuilder/formbuilder-create/*')) ? 'active' : '' }}"  href="{{ route('formbuilder.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['formbuilder/formbuilder-list']) }} {{ (request()->is('formbuilder/formbuilder-list/*')) ? 'active' : '' }}"  href="{{ route('formbuilder.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['formmappingmenu/formmappingmenu-list']) }} {{ (request()->is('formmappingmenu/formmappingmenu-list/*')) ? 'active' : '' }}"  href="{{ route('formmappingmenu.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Menu Mapping</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['formbuilder/form-data-list']) }} {{ (request()->is('formbuilder/form-data-list/*')) ? 'active' : '' }}"  href="{{ route('formbuilder.formdatalist') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Form Data List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         @endif
         <div  class="menu-item pt-5" >
            <div  class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Apps</span></div>
         </div>
         <div  data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['datamanagement/contactus-list','datamanagement/list-feedback']) }} 
         {{ (request()->is('datamanagement/contactus-list/*')) ? 'hover show' : '' }}
         {{ (request()->is('datamanagement/feedback-list/*')) ? 'hover show' : '' }}
         {{ (request()->is('datamanagement/other-list/*')) ? 'hover show' : '' }}
         " >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-information-4 fs-2"></i></span><span  class="menu-title" >{{ config('menu.datamanagement') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion {{ set_active(['datamanagement/contactus-list','datamanagement/list-feedback']) }} 
            {{ (request()->is('datamanagement/contactus-list/*')) ? 'show' : '' }}
            {{ (request()->is('datamanagement/feedback-list/*')) ? 'show' : '' }}
            {{ (request()->is('datamanagement/other-list/*')) ? 'show' : '' }}
            " >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['datamanagement/contactus-list']) }} {{ (request()->is('datamanagement/contactus-list/*')) ? 'active' : '' }}" href="{{ route('datamanagement.list-contact') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Contact List</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['datamanagement/list-feedback']) }} {{ (request()->is('datamanagement/list-feedback/*')) ? 'active' : '' }}" href="{{ route('datamanagement.list-feedback') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Feedback List</span></a><!--end:Menu link-->
               </div>
               @if(config('particularAssets.other_list') == 'true')
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['datamanagement/list-other']) }} {{ (request()->is('datamanagement/list-other/*')) ? 'active' : '' }}" href="{{ route('datamanagement.list-other') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Other List</span></a><!--end:Menu link-->
               </div>
               @endif
            </div>
         </div>
         @if(isset(Auth::user()->role_id) == '1' && Auth::user()->role_id == '1')
         <div  data-kt-menu-trigger="click" class="menu-item menu-accordion {{ set_active(['module/module-create','module/module-list']) }} {{ (request()->is('module/module-create/*')) ? 'hover show' : '' }}{{ (request()->is('module/module-list/*')) ? 'hover show' : '' }}" >
            <span class="menu-link" ><span  class="menu-icon" ><i class="ki-outline ki-element-3 fs-2"></i></span><span  class="menu-title" >{{ config('menu.modulemanagement') }}</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
            <div  class="menu-sub menu-sub-accordion {{ set_active(['module/module-create','module/module-list']) }} {{ (request()->is('module/module-create/*')) ? 'show' : '' }}{{ (request()->is('module/module-list/*')) ? 'show' : '' }}" >
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['module/module-create']) }} {{ (request()->is('module/module-create/*')) ? 'active' : '' }}"  href="{{ route('module.create') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Create</span></a><!--end:Menu link-->
               </div>
               <div  class="menu-item" >
                  <a class="menu-link {{ set_active1(['module/module-list']) }} {{ (request()->is('module/module-list/*')) ? 'active' : '' }}"  href="{{ route('module.list') }}" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >List</span></a><!--end:Menu link-->
               </div>
            </div>
         </div>
         @endif
         @if(isset(Auth::user()->role_id) == '1' && Auth::user()->role_id == '1' || isset(Auth::user()->role_id) == '2' && Auth::user()->role_id == '2')
         <div  class="menu-item pt-5" >
            <div  class="menu-content" ><span class="menu-heading fw-bold text-uppercase fs-7">{{ config('menu.logs') }}</span></div>
         </div>
         <div  class="menu-item" >
            <a class="menu-link {{ set_active1(['audittrail/audittrail-list']) }} {{ (request()->is('audittrail/audittrail-list/*')) ? 'active' : '' }}" href="{{ route('audittrail.list') }}"><span  class="menu-icon" ><i class="ki-outline ki-rocket fs-2"></i></span><span  class="menu-title" >{{ config('menu.audittrail') }}</span></a><!--end:Menu link-->
         </div>
         @if(isset(Auth::user()->role_id) == '1' && Auth::user()->role_id == '1')
         <div  class="menu-item pt-5" >
            <div  class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">{{ config('menu.help') }}</span></div>
         </div>
         <div  class="menu-item" >
            <a class="menu-link {{ set_active1(['dev-team']) }} {{ (request()->is('dev-team/*')) ? 'active' : '' }}" href="{{ route('dev-team') }}"><span  class="menu-icon" ><i class="ki-outline ki-profile-user fs-2"></i></span><span  class="menu-title" >{{ config('menu.developer') }}</span></a><!--end:Menu link-->
         </div>
         <div  class="menu-item">
            <a class="menu-link" href="#" target="_blank" ><span  class="menu-icon" ><i class="ki-outline ki-abstract-26 fs-2"></i></span><span  class="menu-title" >{{ config('menu.documentation') }}</span></a><!--end:Menu link-->
         </div>
         @endif
         @endif
      </div>
   </div>
</div>