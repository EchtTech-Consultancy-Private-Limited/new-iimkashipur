<?php 
/******** API Controllers */
use App\Http\Controllers\CMSControllers\Api\CommonAPIController;
use App\Http\Controllers\CMSControllers\Api\WebsiteMenuManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\UserManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\WebsiteCoreSettingsAPIController;
use App\Http\Controllers\CMSControllers\Api\RolesAndPermissionAPIController;
use App\Http\Controllers\CMSControllers\Api\FooterManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\SocialLinksAPIController;
use App\Http\Controllers\CMSControllers\Api\TenderManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\TenderTypeAPIController;
use App\Http\Controllers\CMSControllers\Api\DynamicContentPageManagamentAPIController;
use App\Http\Controllers\CMSControllers\Api\EventsManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\NewsManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\GalleryManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\HomePageBannerAPIController;
use App\Http\Controllers\CMSControllers\Api\ModuleManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\SystemLogsAPIController;
use App\Http\Controllers\CMSControllers\Api\DynamicPagesAPIController;
use App\Http\Controllers\CMSControllers\Api\DataManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\CareerManagementAPIController;
use App\Http\Controllers\CMSControllers\Api\EmpDepartDesignationAPIController;
use App\Http\Controllers\CMSControllers\Api\EmployeeDirectoryAPIController;
use App\Http\Controllers\CMSControllers\Api\PopupAdvertisingAPIController;
use App\Http\Controllers\CMSControllers\Api\RecentActivityAPIController;
use App\Http\Controllers\CMSControllers\Api\RtiAssetsAPIController;
use App\Http\Controllers\CMSControllers\Api\PurchaseWorksCommitteeAPIController;
use App\Http\Controllers\CMSControllers\Api\RtiApplicationResponsesAPIController;
use App\Http\Controllers\CMSControllers\Api\CommonApprovalAPIController;
use App\Http\Controllers\CMSControllers\Api\FormBuilderAPIController;
use App\Http\Controllers\CMSControllers\Api\ManualFileUploadAPIController;
use App\Http\Controllers\CMSControllers\Api\PrivateGovernmentClientsAPIController;
use App\Http\Controllers\CMSControllers\Api\HomePageSectionsDesignAPIController;
use App\Http\Controllers\CMSControllers\Api\SocialMediaCardsAPIController;
use App\Http\Controllers\CMSControllers\Api\HeaderRightLogoAPIController;


/***************************** API URL Use For Data Migrate With DB*************************************** */
//Route::prefix('api')->group(function(){
    Route::middleware(['auth','prevent-back-history','logs','EnsureTokenIsValid'])->group(function () {

        Artisan::call('cache:clear');
        Artisan::call('storage:link');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        
        Route::group(['prefix' => 'api/v1'], function () {
    
            /****** Users Setting user:user */
            Route::post('/create-ues',[UserManagementAPIController::class,'store'])->name('user-save')->middleware('throttle:custom_Limit');
            Route::get('/list-ues',[UserManagementAPIController::class,'index'])->name('user-list');
            Route::get('/edit-ues/{id}',[UserManagementAPIController::class,'edit'])->name('user-edit');
            Route::post('/update-ues',[UserManagementAPIController::class,'update'])->name('user-update');
            Route::post('/update-account',[UserManagementAPIController::class,'updateAccount'])->name('account-update');
            Route::post('/update-password',[UserManagementAPIController::class,'updatePassword'])->name('password-update');
            Route::delete('/delete-ues/{id}',[UserManagementAPIController::class,'destroy'])->name('user-delete');
    
            /****** Roles Permission Setting role:Role */
            Route::post('/create-role',[RolesAndPermissionAPIController::class,'permissionAdd'])->name('role-save');
            Route::get('/list-role',[RolesAndPermissionAPIController::class,'index'])->name('role-list');
            Route::get('/edit-role/{id}',[RolesAndPermissionAPIController::class,'edit'])->name('role-edit');
            Route::post('/update-role',[RolesAndPermissionAPIController::class,'permissionAdd'])->name('role-update');
            Route::delete('/delete-role/{id}',[RolesAndPermissionAPIController::class,'destroy'])->name('role-delete');

            /****** New Roles role:Role */
            Route::post('/create-new-role',[RolesAndPermissionAPIController::class,'newRoleAdd'])->name('new-role-save');
            Route::get('/list-new-role',[RolesAndPermissionAPIController::class,'indexNewRole'])->name('new-role-list');
            Route::get('/edit-new-role/{id}',[RolesAndPermissionAPIController::class,'editNewRole'])->name('new-role-edit');
            Route::post('/update-new-role',[RolesAndPermissionAPIController::class,'newRoleUpdate'])->name('new-role-update');
            Route::delete('/delete-new-role/{id}',[RolesAndPermissionAPIController::class,'newRoleDestroy'])->name('new-role-delete');
            
            /****** Permission Setting per:Permission */
            Route::post('/create-per',[HomePageBannerAPIController::class,'store'])->name('permission-save');
            Route::get('/list-per',[HomePageBannerAPIController::class,'index'])->name('permission-list');
            Route::get('/edit-per/{id}',[HomePageBannerAPIController::class,'edit'])->name('permission-edit');
            Route::post('/update-per/{id}',[HomePageBannerAPIController::class,'update'])->name('permission-update');
            Route::delete('/delete-per/{id}',[HomePageBannerAPIController::class,'destroy'])->name('permission-delete');
    
            /****** Website Menu Setting mm:main menu */
            Route::post('/create-mm',[WebsiteMenuManagementAPIController::class,'store'])->name('menu-save')->middleware('throttle:custom_Limit');
            Route::get('/list-mm',[WebsiteMenuManagementAPIController::class,'index'])->name('menu-list');
            Route::get('/edit-mm/{id}',[WebsiteMenuManagementAPIController::class,'edit'])->name('menu-edit');
            Route::post('/update-mm',[WebsiteMenuManagementAPIController::class,'update'])->name('menu-update');
            Route::delete('/delete-mm/{id}',[WebsiteMenuManagementAPIController::class,'destroy'])->name('menu-delete');
    
            /****** Website Core Setting cws:core website setting */
            Route::post('/create-cws',[WebsiteCoreSettingsAPIController::class,'store'])->name('headerLogo-save')->middleware('throttle:custom_Limit');
            Route::get('/list-logo',[WebsiteCoreSettingsAPIController::class,'indexLogo'])->name('logo-list');
            Route::get('/list-footercontent',[WebsiteCoreSettingsAPIController::class,'indexFooterContent'])->name('footercontent-list');
            Route::get('/list-sociallink',[WebsiteCoreSettingsAPIController::class,'indexSocialLink'])->name('sociallink-list');
            Route::get('/list-socialmediacards',[WebsiteCoreSettingsAPIController::class,'indexSocialMediaCards'])->name('socialmediacards-list');
            Route::get('/list-rightheaderlogo',[WebsiteCoreSettingsAPIController::class,'indexHeaderRightLogo'])->name('rightheaderlogo-list');
            Route::get('/edit-cws/{id}',[WebsiteCoreSettingsAPIController::class,'edit'])->name('cws-edit');
            Route::post('/update-headerLogo',[WebsiteCoreSettingsAPIController::class,'headerLogoUpdate'])->name('headerLogo-update');
            Route::delete('/delete-cws/{id}',[WebsiteCoreSettingsAPIController::class,'destroy'])->name('cws-delete');
    
            /****** Footer Content Setting footer:Footer */
            Route::post('/create-footer',[FooterManagementAPIController::class,'store'])->name('footer-save')->middleware('throttle:custom_Limit');
            Route::get('/list-footer',[FooterManagementAPIController::class,'index'])->name('footer-list');
            Route::get('/edit-footer/{id}',[FooterManagementAPIController::class,'edit'])->name('footer-edit');
            Route::post('/update-footer',[FooterManagementAPIController::class,'update'])->name('footer-update');
            Route::delete('/delete-footer/{id}',[FooterManagementAPIController::class,'destroy'])->name('footer-delete');
    
            /****** Website Social Link Setting sl:social Link */
            Route::post('/create-sl',[SocialLinksAPIController::class,'store'])->name('socialLink-save')->middleware('throttle:custom_Limit');
            Route::get('/list-sl',[SocialLinksAPIController::class,'index']);
            Route::get('/edit-sl/{id}',[SocialLinksAPIController::class,'edit']);
            Route::post('/update-sl',[SocialLinksAPIController::class,'update'])->name('socialLink-update');;
            Route::delete('/delete-sl/{id}',[SocialLinksAPIController::class,'destroy'])->name('delete-sl');

            /****** Website Social Media Cards Setting smc:social Link */
            Route::post('/create-smc',[SocialMediaCardsAPIController::class,'store'])->name('socialmediacard-save')->middleware('throttle:custom_Limit');
            Route::get('/list-smc',[SocialMediaCardsAPIController::class,'index']);
            Route::get('/edit-smc/{id}',[SocialMediaCardsAPIController::class,'edit']);
            Route::post('/update-smc',[SocialMediaCardsAPIController::class,'update'])->name('socialmediacard-update');;
            Route::delete('/delete-smc/{id}',[SocialMediaCardsAPIController::class,'destroy'])->name('delete-smc');

            /****** Website Core Right Header Logo's rhls:Right Header Logo */
            Route::post('/create-rhls',[HeaderRightLogoAPIController::class,'store'])->name('headerrightlogo-save')->middleware('throttle:custom_Limit');
            Route::get('/list-rhls',[HeaderRightLogoAPIController::class,'index']);
            Route::get('/edit-rhls/{id}',[HeaderRightLogoAPIController::class,'edit']);
            Route::post('/update-rhls',[HeaderRightLogoAPIController::class,'update'])->name('headerrightlogo-update');;
            Route::delete('/delete-rhls/{id}',[HeaderRightLogoAPIController::class,'destroy'])->name('delete-rhls');
    
            /****** Module Setting mo:Module*/
            Route::post('/create-mo',[ModuleManagementAPIController::class,'store'])->name('module-save')->middleware('throttle:custom_Limit');
            Route::get('/list-mo',[ModuleManagementAPIController::class,'index'])->name('module-list');
            Route::get('/edit-mo/{id}',[ModuleManagementAPIController::class,'edit'])->name('module-edit');
            Route::post('/update-mo',[ModuleManagementAPIController::class,'update'])->name('module-update');
            Route::delete('/delete-mo/{id}',[ModuleManagementAPIController::class,'destroy'])->name('module-delete');
    
            /****** Tender Setting ten:tender */
            Route::post('/create-ten',[TenderManagementAPIController::class,'store'])->name('tender-save')->middleware('throttle:custom_Limit');
            Route::get('/list-ten',[TenderManagementAPIController::class,'index'])->name('tender-list');
            Route::get('/edit-ten/{id}',[TenderManagementAPIController::class,'edit'])->name('tender-edit');
            Route::get('/show/{id}',[TenderManagementAPIController::class,'show'])->name('tender-show');
            Route::post('/update-ten',[TenderManagementAPIController::class,'update'])->name('tender-update');
            Route::delete('/delete-ten/{id}',[TenderManagementAPIController::class,'destroy'])->name('tender-delete');
            Route::post('/delete-pdf-tender',[TenderManagementAPIController::class,'deletePDFIMG'])->name('pdf-delete-tender');
           
            /****** Tender Type tentype:tender type */
            Route::post('/create-tentype',[TenderTypeAPIController::class,'store'])->name('tendertype-save')->middleware('throttle:custom_Limit');
            Route::get('/list-tentype',[TenderTypeAPIController::class,'index'])->name('tendertype-list');
            Route::get('/edit-tentype/{id}',[TenderTypeAPIController::class,'edit'])->name('tendertype-edit');
            Route::get('/show/{id}',[TenderTypeAPIController::class,'show'])->name('tendertype-show');
            Route::post('/update-tentype',[TenderTypeAPIController::class,'update'])->name('tendertype-update');
            Route::delete('/delete-tentype/{id}',[TenderTypeAPIController::class,'destroy'])->name('tendertype-delete');

    
            /****** Content Page Setting cpi: content page information */
            Route::post('/create-cpi',[DynamicContentPageManagamentAPIController::class,'basicInformation'])->name('pagemetatag-save')->middleware('throttle:custom_Limit');
            Route::post('/create-cpi-content',[DynamicContentPageManagamentAPIController::class,'pageContent'])->name('pagecontent-save')->middleware('throttle:custom_Limit');
            Route::post('/create-cpi-gallery',[DynamicContentPageManagamentAPIController::class,'pageGallery'])->name('pagegallery-save')->middleware('throttle:custom_Limit');
            Route::post('/create-cpi-pdf',[DynamicContentPageManagamentAPIController::class,'pagePdf'])->name('pagepdf-save')->middleware('throttle:custom_Limit');
            Route::post('/create-cpi-banner',[DynamicContentPageManagamentAPIController::class,'pageBanner'])->name('pagebanner-save')->middleware('throttle:custom_Limit');
            Route::get('/list-cpi',[DynamicContentPageManagamentAPIController::class,'index'])->name('pagemetatag-list');
            Route::get('/edit-cpi/{id}',[DynamicContentPageManagamentAPIController::class,'edit'])->name('pagemetatag-edit');
            Route::post('/update-cpi',[DynamicContentPageManagamentAPIController::class,'updateBasicInformation'])->name('cpi-update');
            Route::post('/update-cpi-content',[DynamicContentPageManagamentAPIController::class,'updatePageContent'])->name('cpi-content-update');
            Route::post('/update-cpi-gallery',[DynamicContentPageManagamentAPIController::class,'updatePageGallery'])->name('cpi-gallery-update');
            Route::post('/update-cpi-pdf',[DynamicContentPageManagamentAPIController::class,'updatePagePdf'])->name('cpi-pdf-update');
            Route::post('/update-cpi-banner',[DynamicContentPageManagamentAPIController::class,'updatepageBanner'])->name('cpi-banner-update');
            Route::delete('/delete-cpi/{id}',[DynamicContentPageManagamentAPIController::class,'destroy'])->name('pagemetatag-delete');
            Route::post('/delete-pdfimg',[DynamicContentPageManagamentAPIController::class,'deletePDFIMG'])->name('pdfimg-delete');
    
            /****** Event Setting eve:Event */
            Route::post('/create-eve',[EventsManagementAPIController::class,'store'])->name('event-save')->middleware('throttle:custom_Limit');
            Route::get('/list-eve',[EventsManagementAPIController::class,'index'])->name('event-list');
            Route::get('/edit-eve/{id}',[EventsManagementAPIController::class,'edit'])->name('event-edit');
            Route::post('/update-eve',[EventsManagementAPIController::class,'update'])->name('event-update');
            Route::delete('/delete-eve/{id}',[EventsManagementAPIController::class,'destroy'])->name('event-delete');
            Route::post('/delete-pdf-event',[EventsManagementAPIController::class,'deletePDFIMG'])->name('pdf-delete-event');
    
            /****** News Setting nw:News */
            Route::post('/create-nw',[NewsManagementAPIController::class,'store'])->name('news-save')->middleware('throttle:custom_Limit');
            Route::get('/list-nw',[NewsManagementAPIController::class,'index'])->name('news-list');
            Route::get('/edit-nw/{id}',[NewsManagementAPIController::class,'edit'])->name('news-edit');
            Route::post('/update-nw',[NewsManagementAPIController::class,'update'])->name('news-update');
            Route::delete('/delete-nw/{id}',[NewsManagementAPIController::class,'destroy'])->name('news-delete');
            Route::post('/delete-pdf-news',[NewsManagementAPIController::class,'deletePDFIMG'])->name('pdf-delete-news');
    
            /****** Gallery Setting pgl:photo Gallery vgl:video gallery*/
            Route::post('/create-pgl',[GalleryManagementAPIController::class,'storePhoto'])->name('photo-save')->middleware('throttle:custom_Limit');
            Route::post('/create-vgl',[GalleryManagementAPIController::class,'storeVideo'])->name('video-save')->middleware('throttle:custom_Limit');
            Route::get('/list-gl',[GalleryManagementAPIController::class,'index'])->name('photovideo-list');
            Route::get('/edit-gl/{id}',[GalleryManagementAPIController::class,'edit'])->name('photo-edit');
            // Route::get('/edit-gl-video/{id}',[GalleryManagementAPIController::class,'editVideo'])->name('video-save');
            Route::post('/update-gl',[GalleryManagementAPIController::class,'update'])->name('photo-update');
            Route::delete('/delete-gl/{id}',[GalleryManagementAPIController::class,'destroy'])->name('photovideo-delete');
            /* multiple row delete!!!*/
            Route::post('/gallery-multiple',[GalleryManagementAPIController::class,'deleteMutiData'])->name('gallery-multiple');
           
            /****** Banner Setting bn:Banner*/
            Route::post('/create-bn',[HomePageBannerAPIController::class,'store'])->name('banner-save')->middleware('throttle:custom_Limit');
            Route::get('/list-bn',[HomePageBannerAPIController::class,'index'])->name('banner-list');
            Route::get('/edit-bn/{id}',[HomePageBannerAPIController::class,'edit'])->name('banner-edit');
            Route::post('/update-bn',[HomePageBannerAPIController::class,'update'])->name('banner-update');
            Route::delete('/delete-bn/{id}',[HomePageBannerAPIController::class,'destroy'])->name('banner-delete');
    
            /****** Audit Trail Setting aut:Audit Trail*/
            Route::post('/create-aut',[SystemLogsAPIController::class,'store'])->name('aut-save')->middleware('throttle:custom_Limit');
            Route::get('/list-aut',[SystemLogsAPIController::class,'index'])->name('aut-list');
            Route::get('/edit-aut/{id}',[SystemLogsAPIController::class,'edit'])->name('aut-edit');
            Route::post('/update-aut/{id}',[SystemLogsAPIController::class,'update'])->name('aut-update');
            Route::delete('/delete-aut/{id}',[SystemLogsAPIController::class,'destroy'])->name('aut-delete');
    
            /****** FAQ Setting faq:FAQ*/
            Route::post('/create-faq',[DynamicPagesAPIController::class,'faqStore'])->name('faq-save')->middleware('throttle:custom_Limit');
            Route::get('/list-faq',[DynamicPagesAPIController::class,'faqIndex'])->name('faq-list');
            Route::get('/edit-faq/{id}',[DynamicPagesAPIController::class,'edit'])->name('faq-edit');
            Route::post('/update-faq',[DynamicPagesAPIController::class,'faqUpdate'])->name('faq-update');
            Route::delete('/delete-faq/{id}',[DynamicPagesAPIController::class,'faqDestroy'])->name('faq-delete');
    
            /****** Data Management Setting dm:FAQ*/
            //Route::post('/create-faq',[DynamicPagesAPIController::class,'faqStore'])->name('faq-save');
            Route::get('/list-dmfeed',[DataManagementAPIController::class,'feedBackIndex'])->name('dm-list-feedback');
            Route::get('/list-dmcontact',[DataManagementAPIController::class,'contactUSIndex'])->name('dm-list-contactus');
           Route::get('/other-list',[DynamicPagesAPIController::class,'othersIndex'])->name('other-list');
            //Route::post('/update-faq/{id}',[DynamicPagesAPIController::class,'update'])->name('faq-update');
          //  Route::delete('/delete-faq/{id}',[DynamicPagesAPIController::class,'destroy'])->name('faq-delete');
    
            /****** Recent Activity Setting rc:Recent Activity*/
            Route::post('/create-rc',[RecentActivityAPIController::class,'store'])->name('recentactivity-save')->middleware('throttle:custom_Limit');
            Route::get('/list-rc',[RecentActivityAPIController::class,'index'])->name('recentactivity-list');
            Route::get('/edit-rc/{id}',[RecentActivityAPIController::class,'edit'])->name('recentactivity-edit');
            Route::post('/update-rc',[RecentActivityAPIController::class,'update'])->name('recentactivity-update');
            Route::delete('/delete-rc/{id}',[RecentActivityAPIController::class,'destroy'])->name('recentactivity-delete');
    
           /****** Popup Advertising Setting pa:Popup Advertising*/
           Route::post('/create-pa',[PopupAdvertisingAPIController::class,'store'])->name('popupadvertising-save')->middleware('throttle:custom_Limit');
           Route::get('/list-pa',[PopupAdvertisingAPIController::class,'index'])->name('popupadvertising-list');
           Route::get('/edit-pa/{id}',[PopupAdvertisingAPIController::class,'edit'])->name('popupadvertising-edit');
           Route::post('/update-pa',[PopupAdvertisingAPIController::class,'update'])->name('popupadvertising-update');
           Route::delete('/delete-pa/{id}',[PopupAdvertisingAPIController::class,'destroy'])->name('popupadvertising-delete');
    
            /****** Employee Directory Setting ed:Employee Directory*/
            Route::post('/create-ed',[EmployeeDirectoryAPIController::class,'store'])->name('employeedirectory-save')->middleware('throttle:custom_Limit');
            Route::get('/list-ed',[EmployeeDirectoryAPIController::class,'index'])->name('employeedirectory-list');
            Route::get('/edit-ed/{id}',[EmployeeDirectoryAPIController::class,'edit'])->name('employeedirectory-edit');
            Route::post('/update-ed',[EmployeeDirectoryAPIController::class,'update'])->name('employeedirectory-update');
            Route::delete('/delete-ed/{id}',[EmployeeDirectoryAPIController::class,'destroy'])->name('employeedirectory-delete');
    
            /****** Employee Department/Designation Setting edd:Employee Department/Designation*/
            Route::post('/create-edd',[EmpDepartDesignationAPIController::class,'store'])->name('departmentdesignation-save')->middleware('throttle:custom_Limit');
            Route::get('/list-edd',[EmpDepartDesignationAPIController::class,'index'])->name('departmentdesignation-list');
            Route::get('/edit-edd/{id}',[EmpDepartDesignationAPIController::class,'edit'])->name('departmentdesignation-edit');
            Route::post('/update-edd',[EmpDepartDesignationAPIController::class,'update'])->name('departmentdesignation-update');
            Route::delete('/delete-edd/{id}',[EmpDepartDesignationAPIController::class,'destroy'])->name('departmentdesignation-delete');
            
            /****** Career Setting career:Career*/
            Route::post('/create-career',[CareerManagementAPIController::class,'store'])->name('career-save')->middleware('throttle:custom_Limit');
            Route::get('/list-career',[CareerManagementAPIController::class,'index'])->name('career-list');
            Route::get('/edit-career/{id}',[CareerManagementAPIController::class,'edit'])->name('career-edit');
            Route::post('/update-career',[CareerManagementAPIController::class,'update'])->name('career-update');
            Route::delete('/delete-career/{id}',[CareerManagementAPIController::class,'destroy'])->name('career-delete');
            Route::post('/delete-pdf-career',[CareerManagementAPIController::class,'deletePDFIMG'])->name('pdf-delete-career');
    
            /****** RTI Assets Setting rtia:RTI Assets*/
            Route::post('/create-rtia',[RtiAssetsAPIController::class,'store'])->name('rtiassets-save')->middleware('throttle:custom_Limit');
            Route::get('/list-rtia',[RtiAssetsAPIController::class,'index'])->name('rtiassets-list');
            Route::get('/edit-rtia/{id}',[RtiAssetsAPIController::class,'edit'])->name('rtiassets-edit');
            Route::post('/update-rtia',[RtiAssetsAPIController::class,'update'])->name('rtiassets-update');
            Route::delete('/delete-rtia/{id}',[RtiAssetsAPIController::class,'destroy'])->name('rtiassets-delete');
            Route::post('/delete-pdf-rti',[RtiAssetsAPIController::class,'deletePDFIMG'])->name('pdf-delete-rtiassets');

            /****** RTI Application Responses Setting rtiapplicationresponses:RTI Application Responses*/
            Route::post('/create-rtiapplicationresponses',[RtiApplicationResponsesAPIController::class,'store'])->name('rtiapplicationresponses-save')->middleware('throttle:custom_Limit');
            Route::get('/list-rtiapplicationresponses',[RtiApplicationResponsesAPIController::class,'index'])->name('rtiapplicationresponses-list');
            Route::get('/edit-rtiapplicationresponses/{id}',[RtiApplicationResponsesAPIController::class,'edit'])->name('rtiapplicationresponses-edit');
            Route::post('/update-rtiapplicationresponses',[RtiApplicationResponsesAPIController::class,'update'])->name('rtiapplicationresponses-update');
            Route::delete('/delete-rtiapplicationresponses/{id}',[RtiApplicationResponsesAPIController::class,'destroy'])->name('rtiapplicationresponses-delete');

            /****** purchase works committee Setting purchaseworkscommittee:purchase works committee*/
            Route::post('/create-purchaseworkscommittee',[PurchaseWorksCommitteeAPIController::class,'store'])->name('purchaseworkscommittee-save')->middleware('throttle:custom_Limit');
            Route::get('/list-purchaseworkscommittee',[PurchaseWorksCommitteeAPIController::class,'index'])->name('purchaseworkscommittee-list');
            Route::get('/edit-purchaseworkscommittee/{id}',[PurchaseWorksCommitteeAPIController::class,'edit'])->name('purchaseworkscommittee-edit');
            Route::post('/update-purchaseworkscommittee',[PurchaseWorksCommitteeAPIController::class,'update'])->name('purchaseworkscommittee-update');
            Route::delete('/delete-purchaseworkscommittee/{id}',[PurchaseWorksCommitteeAPIController::class,'destroy'])->name('purchaseworkscommittee-delete');
    
            /****** Mannual File Upload mfu:File */
            Route::post('/create-mfu',[ManualFileUploadAPIController::class,'store'])->name('mfu-save')->middleware('throttle:custom_Limit');
            Route::get('/list-mfu',[ManualFileUploadAPIController::class,'index'])->name('mfu-list');
            Route::get('/edit-mfu/{id}',[ManualFileUploadAPIController::class,'edit'])->name('mfu-edit');
            Route::post('/update-mfu',[ManualFileUploadAPIController::class,'update'])->name('mfu-update');
            Route::delete('/delete-mfu/{id}',[ManualFileUploadAPIController::class,'destroy'])->name('mfu-delete');
            Route::post('/delete-pdf-mfu',[ManualFileUploadAPIController::class,'deletePDFIMG'])->name('mfu-pdf-delete');

            /****** Form Building fbd:formbuilding*/
            Route::post('/create-map',[FormBuilderAPIController::class,'storeMapping'])->name('formMap-save')->middleware('throttle:custom_Limit');
            Route::post('/create-fbd',[FormBuilderAPIController::class,'store'])->name('formbuilder-save')->middleware('throttle:custom_Limit');
            Route::get('/list-fbd',[FormBuilderAPIController::class,'index'])->name('formbuilder-list');
            Route::get('/list-formData',[FormBuilderAPIController::class,'formDataIndexs'])->name('formData-list');
            Route::delete('/delete-formdata/{id}',[FormBuilderAPIController::class,'formDataDestroy'])->name('formdata-delete');
            Route::get('/list-fmap',[FormBuilderAPIController::class,'formMappingIndex'])->name('formmap-list');
            Route::get('/edit-fbd/{id}',[FormBuilderAPIController::class,'edit'])->name('formbuilder-edit');
            Route::post('/update-fbd',[FormBuilderAPIController::class,'update'])->name('formbuilder-update');
            Route::delete('/delete-fbd/{id}',[FormBuilderAPIController::class,'destroy'])->name('formbuilder-delete');
            Route::get('/form-show',[FormBuilderAPIController::class,'show'])->name('formbuilder-show');
            Route::get('/form-edit',[FormBuilderAPIController::class,'showEdit'])->name('formbuilder-edit');
            // Route::post('/formdata-save',[FormBuilderAPIController::class,'saveFormData'])->name('formbuilder-saveformData');

            /****** Private Govt. Client Setting pgcs:Private Govt. Client Setting*/
            Route::post('/create-pgcs',[PrivateGovernmentClientsAPIController::class,'store'])->name('pgcs-save')->middleware('throttle:custom_Limit');
            Route::get('/list-pgcs',[PrivateGovernmentClientsAPIController::class,'index'])->name('pgcs-list');
            Route::get('/edit-pgcs/{id}',[PrivateGovernmentClientsAPIController::class,'edit'])->name('pgcs-edit');
            Route::post('/update-pgcs',[PrivateGovernmentClientsAPIController::class,'update'])->name('pgcs-update');
            Route::delete('/delete-pgcs/{id}',[PrivateGovernmentClientsAPIController::class,'destroy'])->name('pgcs-delete');
            
            /****** Home Page Section hps:Home Page Section*/
            Route::post('/create-homepagesection',[HomePageSectionsDesignAPIController::class,'store'])->name('homepagesection-save')->middleware('throttle:custom_Limit');
            Route::get('/list-homepagesection',[HomePageSectionsDesignAPIController::class,'index'])->name('homepagesection-list');
            Route::get('/edit-homepagesection/{id}',[HomePageSectionsDesignAPIController::class,'edit'])->name('homepagesection-edit');
            Route::post('/update-homepagesection',[HomePageSectionsDesignAPIController::class,'update'])->name('homepagesection-update');
            Route::delete('/delete-homepagesection/{id}',[HomePageSectionsDesignAPIController::class,'destroy'])->name('homepagesection-delete');
            
            /****** New Section ns:New Section*/
            Route::post('/create-newsection',[HomePageSectionsDesignAPIController::class,'storeNewSections'])->name('newsection-save')->middleware('throttle:custom_Limit');
            Route::get('/list-newsectionlist',[HomePageSectionsDesignAPIController::class,'indexNewSections'])->name('newsections-list');
            Route::get('/edit-newsection/{id}',[HomePageSectionsDesignAPIController::class,'edit'])->name('newsection-edit');
            Route::post('/update-newsection',[HomePageSectionsDesignAPIController::class,'updateNewSection'])->name('newsection-update');
            Route::delete('/delete-newsection/{id}',[HomePageSectionsDesignAPIController::class,'destroyNewSection'])->name('newsection-delete');


            /****** Asset Approver Route*/
            /****** Recent Activity rc:Recent Activity*/
            Route::post('/approve-rcta/{id}',[CommonApprovalAPIController::class,'recentActivityApprovePublish'])->name('recentactivity-approve');
            Route::post('/approve-bn/{id}',[CommonApprovalAPIController::class,'homePageBannerApprovePublish'])->name('banner-approve');
            Route::post('/approve-caree/{id}',[CommonApprovalAPIController::class,'careerApprovePublish'])->name('careers-approve');
            Route::post('/approve-page/{id}',[CommonApprovalAPIController::class,'dynamicContentApprovePublish'])->name('pagemetatag-approve');
            Route::post('/approve-faq/{id}',[CommonApprovalAPIController::class,'FAQApprovePublish'])->name('faq-approve');
            Route::post('/approve-dept/{id}',[CommonApprovalAPIController::class,'departmentDesignationApprovePublish'])->name('departmentdesignation-approve');
            Route::post('/approve-emp/{id}',[CommonApprovalAPIController::class,'employeeDirectoryApprovePublish'])->name('employeedirectory-approve');
            Route::post('/approve-event/{id}',[CommonApprovalAPIController::class,'eventApprovePublish'])->name('event-approve');
            Route::post('/approve-wc/{id}',[CommonApprovalAPIController::class,'homePageBannerApprovePublish'])->name('websitecoresetting-approve');
            Route::post('/approve-gall/{id}',[CommonApprovalAPIController::class,'galleryApprovePublish'])->name('photovideo-approve');
            Route::post('/approve-module/{id}',[CommonApprovalAPIController::class,'dashboardModuleApprovePublish'])->name('module-approve');
            Route::post('/approve-news/{id}',[CommonApprovalAPIController::class,'newsApprovePublish'])->name('news-approve');
            Route::post('/approve-pwc/{id}',[CommonApprovalAPIController::class,'purchaseWorksCommitteeApprovePublish'])->name('purchaseworkscommittee-approve');
            Route::post('/approve-rar/{id}',[CommonApprovalAPIController::class,'rtiApplicationResponseApprovePublish'])->name('rtiapplicationresponses-approve');
            Route::post('/approve-rti/{id}',[CommonApprovalAPIController::class,'rtiAssetsApprovePublish'])->name('rtiassets-approve');
            Route::post('/approve-aut/{id}',[CommonApprovalAPIController::class,'auditReportApprovePublish'])->name('aut-approve');
            Route::post('/approve-tender/{id}',[CommonApprovalAPIController::class,'tenderApprovePublish'])->name('tender-approve');
            Route::post('/approve-tendertype/{id}',[CommonApprovalAPIController::class,'tenderTypeApprovePublish'])->name('tendertype-approve');
            Route::post('/approve-ue/{id}',[CommonApprovalAPIController::class,'userManagementApprovePublish'])->name('user-approve');
            Route::post('/approve-loginue/{id}',[CommonApprovalAPIController::class,'loginUserApprovePublish'])->name('loginuser-approve');
            Route::post('/approve-sociallink/{id}',[CommonApprovalAPIController::class,'websiteCoreSettingsSocialLinkApprovePublish'])->name('socialLink-approve');
            Route::post('/approve-socialmediacards/{id}',[CommonApprovalAPIController::class,'websiteCoreSettingsSocialMediaCardsApprovePublish'])->name('socialmediacards-approve');
            Route::post('/approve-headerrightlogo/{id}',[CommonApprovalAPIController::class,'websiteCoreSettingsHeaderRightLogoApprovePublish'])->name('headerrightlogo-approve');
            Route::post('/approve-logo/{id}',[CommonApprovalAPIController::class,'websiteCoreSettingsLogoApprovePublish'])->name('logo-approve');
            Route::post('/approve-footercontent/{id}',[CommonApprovalAPIController::class,'websiteCoreSettingsFooterContentApprovePublish'])->name('footercontent-approve');
            Route::post('/approve-cws/{id}',[CommonApprovalAPIController::class,'websiteCoreSettingsLogoApprovePublish'])->name('cws-approve');
            Route::post('/approve-menu/{id}',[CommonApprovalAPIController::class,'websiteMenuApprovePublish'])->name('menu-approve');
            Route::post('/approve-formbuilding/{id}',[CommonApprovalAPIController::class,'formBuildingApprovePublish'])->name('formbuilder-approve');
            Route::post('/approve-formdata/{id}',[CommonApprovalAPIController::class,'formDataApprovePublish'])->name('formdata-approve');
            Route::post('/approve-mfu/{id}',[CommonApprovalAPIController::class,'manualFileUploadApprovePublish'])->name('mfu-approve');
            Route::post('/approve-newrole/{id}',[CommonApprovalAPIController::class,'newRoleApprovePublish'])->name('newrole-approve');
            Route::post('/approve-popupadvertising/{id}',[CommonApprovalAPIController::class,'popupAdvertisingApprovePublish'])->name('popupadvertising-approve');
            Route::post('/approve-pgcs/{id}',[CommonApprovalAPIController::class,'privateGovernmentClientsApprovePublish'])->name('pgcs-approve');
            Route::post('/approve-homepagesection/{id}',[CommonApprovalAPIController::class,'homePageSectionDesignApprovePublish'])->name('homepagesection-approve');
            Route::post('/approve-newsection/{id}',[CommonApprovalAPIController::class,'newSectionsApprovePublish'])->name('newsection-approve');
    
        });
    });