<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMSControllers\Api\CommonAPIController;
use App\Http\Controllers\CMSControllers\ImageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CMSControllers\DashboardController;
use App\Http\Controllers\CMSControllers\DeveloperTeamController;
use App\Http\Controllers\CMSControllers\UserManagementController;
use App\Http\Controllers\CMSControllers\RolesAndPermissionController;
use App\Http\Controllers\CMSControllers\WebsiteCoreSettingsController;
use App\Http\Controllers\CMSControllers\HomePageBannerManagementController;
use App\Http\Controllers\CMSControllers\DynamicContentPageManagamentController;
use App\Http\Controllers\CMSControllers\FooterManagementController;
use App\Http\Controllers\CMSControllers\SocialLinkController;
use App\Http\Controllers\CMSControllers\WebsiteMenuManagementController;
use App\Http\Controllers\CMSControllers\DynamicFormManagementController;
use App\Http\Controllers\CMSControllers\GalleryManagementController;
use App\Http\Controllers\CMSControllers\NewsManagementController;
use App\Http\Controllers\CMSControllers\TenderManagementController;
use App\Http\Controllers\CMSControllers\TenderTypeController;
use App\Http\Controllers\CMSControllers\EventsManagementController;
use App\Http\Controllers\CMSControllers\ModuleManagementController;
use App\Http\Controllers\CMSControllers\SystemLogsController;
use App\Http\Controllers\CMSControllers\DataManagementController;
use App\Http\Controllers\CMSControllers\CareerManagementController;
use App\Http\Controllers\CMSControllers\EmpDepartDesignationController;
use App\Http\Controllers\CMSControllers\EmployeeDirectoryController;
use App\Http\Controllers\CMSControllers\PopupAdvertisingController;
use App\Http\Controllers\CMSControllers\RecentActivityController;
use App\Http\Controllers\CMSControllers\RtiAssetsController;
use App\Http\Controllers\CMSControllers\RtiApplicationResponsesController;
use App\Http\Controllers\CMSControllers\PurchaseWorksCommitteeController;
use App\Http\Controllers\CMSControllers\FormBuilderController;
use App\Http\Controllers\CMSControllers\ManualFileUploadController;
use App\Http\Controllers\CMSControllers\PrivateGovernmentClientsController;
use App\Http\Controllers\CMSControllers\HomePageSectionsDesignController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/captcha', [LoginController::class, 'generateCaptcha'])->name('captcha');
Route::get('dev/login', [LoginController::class, 'showLoginForm'])->name('dev/login');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login-dev', [LoginController::class, 'authenticateDev'])->name('authenticate-dev');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forget-user', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget-user');
Route::post('forget-change', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forgetuser');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('update_password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('update_password');
Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);

Route::post('mimeimagecheck', [CommonAPIController::class, 'imageMimeCheck'])->name('mimeimagecheck');
Route::post('mimepdfcheck', [CommonAPIController::class, 'pdfMimeCheck'])->name('mimepdfcheck');
// capture analytics
Route::post('analytics', [AnalyticsController::class, 'store'])->name('store-analytics');
Route::post('fetch-designation', [EmpDepartDesignationController::class, 'fetchDesignation'])->name('fetch-designation');

//,->middleware('throttle:custom_Limit')

Route::get('/image/{path}', [ImageController::class, 'encryptPath']);

Route::middleware(['auth','prevent-back-history','EnsureTokenIsValid'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dev-team', [DeveloperTeamController::class, 'index'])->name('dev-team');
    
    Route::prefix('user')->group(function(){
        Route::get('/user-create', [UserManagementController::class, 'create'])->name('user.create');
        Route::get('/user-list', [UserManagementController::class, 'index'])->name('user.list');
        Route::get('/user-show', [UserManagementController::class, 'show'])->name('user.show');
        Route::get('/user-edit', [UserManagementController::class, 'edit'])->name('user.edit');
        Route::get('/account-view', [UserManagementController::class, 'accountSettingsEdit'])->name('accountsettings.edit');
    });

    Route::prefix('role')->group(function(){
        Route::get('/role-create', [RolesAndPermissionController::class, 'createRoles'])->name('role.create');
        Route::get('/role-edit', [RolesAndPermissionController::class, 'edit'])->name('role.edit');
        Route::get('/role-list', [RolesAndPermissionController::class, 'roleIndex'])->name('role.list');
    });

    Route::prefix('newrole')->group(function(){
        Route::get('/new-role-create', [RolesAndPermissionController::class, 'newCreateRoles'])->name('newrole.create');
        Route::get('/new-role-edit', [RolesAndPermissionController::class, 'newRoleEdit'])->name('newrole.edit');
        Route::get('/new-role-list', [RolesAndPermissionController::class, 'newRoleIndex'])->name('newrole.list');
    });
    
    Route::prefix('permission')->group(function(){
        Route::get('/permission-create', [RolesAndPermissionController::class, 'create'])->name('permission.create');
        Route::get('/permission-list', [RolesAndPermissionController::class, 'permissionIndex'])->name('permission.list');
    });
    
    Route::prefix('menu')->group(function(){
        Route::get('/menu-create', [WebsiteMenuManagementController::class, 'create'])->name('menu.create');
        Route::get('/menu-edit', [WebsiteMenuManagementController::class, 'edit'])->name('menu.edit');
        Route::get('/menu-show', [WebsiteMenuManagementController::class, 'showMenu'])->name('menu.show');
        Route::get('/menu-list', [WebsiteMenuManagementController::class, 'index'])->name('menu.list');
        Route::get('/menu-tree', [WebsiteMenuManagementController::class, 'showMenuInTree'])->name('menu.tree');
    });
    
    Route::prefix('homebanner')->group(function(){
        Route::get('/homebanner-create', [HomePageBannerManagementController::class, 'create'])->name('homebanner.create');
        Route::get('/homebanner-edit', [HomePageBannerManagementController::class, 'edit'])->name('homebanner.edit');
        Route::get('/homebanner-list', [HomePageBannerManagementController::class, 'index'])->name('homebanner.list');
    });
    
    Route::prefix('contentpage')->group(function(){
        Route::get('/contentpage-create', [DynamicContentPageManagamentController::class, 'create'])->name('contentpage.create');
        Route::get('/contentpage-edit', [DynamicContentPageManagamentController::class, 'edit'])->name('contentpage.edit');
        Route::get('/contentpage-show', [DynamicContentPageManagamentController::class, 'show'])->name('contentpage.show');
        Route::get('/contentpage-list', [DynamicContentPageManagamentController::class, 'index'])->name('contentpage.list');
    });
    
    Route::prefix('websitecoresetting')->group(function(){
        Route::get('/websitecoresetting-create', [WebSiteCoreSettingsController::class, 'create'])->name('websitecoresetting.create');
        Route::get('/websitecoresetting-edit', [WebSiteCoreSettingsController::class, 'edit'])->name('websitecoresetting.edit');
        Route::get('/logo-list', [WebSiteCoreSettingsController::class, 'indexLogo'])->name('logo.list');
        Route::get('/footercontent-list', [WebSiteCoreSettingsController::class, 'indexFooterContent'])->name('footercontent.list');
        Route::get('/sociallink-list', [WebSiteCoreSettingsController::class, 'indexSocialLink'])->name('sociallink.list');
        Route::get('/socialmediacards-list', [WebSiteCoreSettingsController::class, 'indexSocialMediaCards'])->name('socialmediacards.list');
        Route::get('/headerrightlogo-list', [WebSiteCoreSettingsController::class, 'indexHeaderRightLogo'])->name('headerrightlogo.list');
        Route::get('/advertisingpopup-list', [WebSiteCoreSettingsController::class, 'indexAdvertisingPopup'])->name('advertisingpopup.list');
    });
    
    Route::prefix('gallerymanagement')->group(function(){
        Route::get('/gallerymanagement-create', [GalleryManagementController::class, 'create'])->name('gallerymanagement.create');
        Route::get('/gallerymanagement-edit', [GalleryManagementController::class, 'edit'])->name('photovideo.edit');
        Route::get('/gallerymanagement-list', [GalleryManagementController::class, 'index'])->name('gallerymanagement.list');
    });
    
    Route::prefix('news')->group(function(){
        Route::get('/news-create', [NewsManagementController::class, 'create'])->name('news.create');
        Route::get('/news-edit', [NewsManagementController::class, 'edit'])->name('news.edit');
        Route::get('/news-show', [NewsManagementController::class, 'show'])->name('news.show');
        Route::get('/news-list', [NewsManagementController::class, 'index'])->name('news.list');
    });
    
    Route::prefix('tender')->group(function(){
        Route::get('/tender-create', [TenderManagementController::class, 'create'])->name('tender.create');
        Route::get('/tender-edit', [TenderManagementController::class, 'edit'])->name('tender.edit');
        Route::get('/tender-show', [TenderManagementController::class, 'show'])->name('tender.show');
        Route::get('/tender-list', [TenderManagementController::class, 'index'])->name('tender.list');
    });
    Route::prefix('tendertype')->group(function(){
        Route::get('/tendertype-create', [TenderTypeController::class, 'create'])->name('tendertype.create');
        Route::get('/tendertype-edit', [TenderTypeController::class, 'edit'])->name('tendertype.edit');
        Route::get('/tendertype-show', [TenderTypeController::class, 'show'])->name('tendertype.show');
        Route::get('/tendertype-list', [TenderTypeController::class, 'index'])->name('tendertype.list');
    });

    Route::prefix('event')->group(function(){
        Route::get('/event-create', [EventsManagementController::class, 'create'])->name('event.create');
        Route::get('/event-edit', [EventsManagementController::class, 'edit'])->name('event.edit');
        Route::get('/event-show', [EventsManagementController::class, 'show'])->name('event.show');
        Route::get('/event-list', [EventsManagementController::class, 'index'])->name('event.list');
    });
    
    Route::prefix('module')->group(function(){
        Route::get('/module-create', [ModuleManagementController::class, 'create'])->name('module.create');
        Route::get('/module-list', [ModuleManagementController::class, 'index'])->name('module.list');
        Route::get('/module-edit', [ModuleManagementController::class, 'edit'])->name('module.edit');
    });
    
    Route::prefix('faq')->group(function(){
        Route::get('/faq-create', [DynamicFormManagementController::class, 'faqCreate'])->name('faq.create');
        Route::get('/faq-list', [DynamicFormManagementController::class, 'faqIndex'])->name('faq.list');
        Route::get('/faq-edit', [DynamicFormManagementController::class, 'faqEdit'])->name('faq.edit');
    });
    
    Route::prefix('audittrail')->group(function(){
        Route::get('/audittrail-create', [SystemLogsController::class, 'create'])->name('audittrail.create');
        Route::get('/audittrail-list', [SystemLogsController::class, 'index'])->name('audittrail.list');
        Route::get('/audittrail-edit', [SystemLogsController::class, 'edit'])->name('audittrail.edit');
    });
    
    Route::prefix('datamanagement')->group(function(){
        //Route::get('/audittrail-create', [SystemLogsController::class, 'create'])->name('audittrail.create');
        Route::get('/contactus-list', [DataManagementController::class, 'contactUSIndex'])->name('datamanagement.list-contact');
        Route::get('/feedback-list', [DataManagementController::class, 'FeedbackIndex'])->name('datamanagement.list-feedback');
        Route::get('/other-list', [DataManagementController::class, 'otherIndex'])->name('datamanagement.list-other');
    });
    
    Route::prefix('recentactivity')->group(function(){
        Route::get('/recentactivity-create', [RecentActivityController::class, 'create'])->name('recentactivity.create');
        Route::get('/recentactivity-list', [RecentActivityController::class, 'index'])->name('recentactivity.list');
        Route::get('/recentactivity-edit', [RecentActivityController::class, 'edit'])->name('recentactivity.edit');
    });
    Route::prefix('popupadvertising')->group(function(){
        Route::get('/popupadvertising-create', [PopupAdvertisingController::class, 'create'])->name('popupadvertising.create');
        Route::get('/popupadvertising-list', [PopupAdvertisingController::class, 'index'])->name('popupadvertising.list');
        Route::get('/popupadvertising-edit', [PopupAdvertisingController::class, 'edit'])->name('popupadvertising.edit');
    });
    
    Route::prefix('employeedirectory')->group(function(){
        Route::get('/employeedirectory-create', [EmployeeDirectoryController::class, 'create'])->name('employeedirectory.create');
        Route::get('/employeedirectory-list', [EmployeeDirectoryController::class, 'index'])->name('employeedirectory.list');
        Route::get('/employeedirectory-show', [EmployeeDirectoryController::class, 'show'])->name('employeedirectory.show');
        Route::get('/employeedirectory-edit', [EmployeeDirectoryController::class, 'edit'])->name('employeedirectory.edit');
    });
    
    Route::prefix('departmentdesignation')->group(function(){
        Route::get('/departmentdesignation-create', [EmpDepartDesignationController::class, 'create'])->name('departmentdesignation.create');
        Route::get('/departmentdesignation-list', [EmpDepartDesignationController::class, 'index'])->name('departmentdesignation.list');
        Route::get('/departmentdesignation-edit', [EmpDepartDesignationController::class, 'edit'])->name('departmentdesignation.edit');
    });
    
    Route::prefix('careers')->group(function(){
        Route::get('/careers-create', [CareerManagementController::class, 'create'])->name('careers.create');
        Route::get('/careers-list', [CareerManagementController::class, 'index'])->name('careers.list');
        Route::get('/careers-edit', [CareerManagementController::class, 'edit'])->name('careers.edit');
    });
    
    Route::prefix('rtiassets')->group(function(){
            Route::get('/rtiassets-create', [RtiAssetsController::class, 'create'])->name('rtiassets.create');
            Route::get('/rtiassets-list', [RtiAssetsController::class, 'index'])->name('rtiassets.list');
            Route::get('/rtiassets-edit', [RtiAssetsController::class, 'edit'])->name('rtiassets.edit');
        });

    Route::prefix('rtiapplicationresponses')->group(function(){
        Route::get('/rtiapplicationresponses-create', [RtiApplicationResponsesController::class, 'create'])->name('rtiapplicationresponses.create');
        Route::get('/rtiapplicationresponses-list', [RtiApplicationResponsesController::class, 'index'])->name('rtiapplicationresponses.list');
        Route::get('/rtiapplicationresponses-edit', [RtiApplicationResponsesController::class, 'edit'])->name('rtiapplicationresponses.edit');
    });
    Route::prefix('purchaseworkscommittee')->group(function(){
        Route::get('/purchaseworkscommittee-create', [PurchaseWorksCommitteeController::class, 'create'])->name('purchaseworkscommittee.create');
        Route::get('/purchaseworkscommittee-list', [PurchaseWorksCommitteeController::class, 'index'])->name('purchaseworkscommittee.list');
        Route::get('/purchaseworkscommittee-edit', [PurchaseWorksCommitteeController::class, 'edit'])->name('purchaseworkscommittee.edit');
    });
    Route::prefix('formbuilder')->group(function(){
        Route::get('/formbuilder-create', [FormBuilderController::class, 'create'])->name('formbuilder.create');
        Route::get('/formbuilder-list', [FormBuilderController::class, 'index'])->name('formbuilder.list');
        Route::get('/formbuilder-edit', [FormBuilderController::class, 'edit'])->name('formbuilder.edit');
        Route::get('/formbuilder-show', [FormBuilderController::class, 'show'])->name('formbuilder.show');
        Route::get('/form-data-list', [FormBuilderController::class, 'formDataIndex'])->name('formbuilder.formdatalist');
        //Route::get('/formbuilder-mapping', [FormBuilderController::class, 'formMappingIndex'])->name('formbuilder.mapping');
        Route::post('/formdata-save',[FormBuilderController::class,'saveFormData'])->name('formbuilder-saveformData');
    });

    Route::prefix('formmappingmenu')->group(function(){
        Route::get('/formmappingmenu-create', [FormBuilderController::class, 'create'])->name('formmappingmenu.create');
        Route::get('/formmappingmenu-edit', [FormBuilderController::class, 'edit'])->name('formmappingmenu.edit');
        Route::get('/formmappingmenu-list', [FormBuilderController::class, 'formMappingIndex'])->name('formmappingmenu.list');
    });

    Route::prefix('maunalfileupload')->group(function(){
        Route::get('/maunalfileupload-create', [ManualFileUploadController::class, 'create'])->name('mfu.create');
        Route::get('/maunalfileupload-edit', [ManualFileUploadController::class, 'edit'])->name('mfu.edit');
        Route::get('/maunalfileupload-list', [ManualFileUploadController::class, 'index'])->name('mfu.list');
    });

    Route::prefix('pgcs')->group(function(){
        Route::get('/pgcs-create', [PrivateGovernmentClientsController::class, 'create'])->name('pgcs.create');
        Route::get('/pgcs-edit', [PrivateGovernmentClientsController::class, 'edit'])->name('pgcs.edit');
        Route::get('/pgcs-list', [PrivateGovernmentClientsController::class, 'index'])->name('pgcs.list');
    });
    Route::prefix('homepagesection')->group(function(){
        Route::get('/homepagesection-create', [HomePageSectionsDesignController::class, 'create'])->name('homepagesection.create');
        Route::get('/homepagesection-edit', [HomePageSectionsDesignController::class, 'edit'])->name('homepagesection.edit');
        Route::get('/homepagesection-list', [HomePageSectionsDesignController::class, 'index'])->name('homepagesection.list');
        Route::get('/newsection-create', [HomePageSectionsDesignController::class, 'createSection'])->name('newsection.create');
        Route::get('/newsection-edit', [HomePageSectionsDesignController::class, 'editNewSections'])->name('newsection.edit');
        Route::get('/newsection-list', [HomePageSectionsDesignController::class, 'indexNewSections'])->name('newsection.list');
    });
});

require __DIR__ .'/api_route.php';


