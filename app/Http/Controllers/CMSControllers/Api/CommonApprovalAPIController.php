<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;
use App\Http\Requests\ImagesMimesCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\CMSModels\RecentActivity;
use App\Models\CMSModels\WebsiteMenuManagement;
use App\Models\CMSModels\WebsiteCoreSettings;
use App\Models\CMSModels\FooterManagement;
use App\Models\CMSModels\UserManagement;
use App\Models\CMSModels\TenderManagement;
use App\Models\CMSModels\SocialLink;
use App\Models\User;
use App\Models\CMSModels\RtiAssets;
use App\Models\CMSModels\RtiApplicationResponses;
use App\Models\CMSModels\RolesAndPermission;
use App\Models\CMSModels\PurchaseWorksCommittee;
use App\Models\CMSModels\PopupAdvertising;
use App\Models\CMSModels\NewsManagement;
use App\Models\CMSModels\ModuleManagement;
use App\Models\CMSModels\HomePageBannerManagement;
use App\Models\CMSModels\GalleryManagement;
use App\Models\CMSModels\EventsManagement;
use App\Models\CMSModels\EmployeeDirectory;
use App\Models\CMSModels\EmpDepartDesignation;
use App\Models\CMSModels\DynamicContentPageManagament;
use App\Models\CMSModels\CareerManagement;
use App\Models\CMSModels\ManualFileUpload;
use App\Models\CMSModels\PrivateGovernmentClients;
use App\Models\CMSModels\HomePageSectionsDesign;

use Ramsey\Uuid\Uuid;
use Validator;
use DB;

class CommonApprovalAPIController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function loginUserApprovePublish($id)
    {
        $data=User::where('id',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            User::where('id',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            User::where('id',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function recentActivityApprovePublish($id)
    {
        $data=RecentActivity::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            RecentActivity::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            RecentActivity::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function careerApprovePublish($id)
    {
        $data=CareerManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            CareerManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            CareerManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function dynamicContentApprovePublish($id)
    {
        $data=DB::table('dynamic_content_page_metatag')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('dynamic_content_page_metatag')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('dynamic_content_page_metatag')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function departmentDesignationApprovePublish($id)
    {
        $data=EmpDepartDesignation::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            EmpDepartDesignation::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            EmpDepartDesignation::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function employeeDirectoryApprovePublish($id)
    {
        $data=EmployeeDirectory::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            EmployeeDirectory::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            EmployeeDirectory::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function eventApprovePublish($id)
    {
        $data=EventsManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            EventsManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            EventsManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function galleryApprovePublish($id)
    {
        $data=GalleryManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            GalleryManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            GalleryManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function homePageBannerApprovePublish($id)
    {
        $data=HomePageBannerManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            HomePageBannerManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            HomePageBannerManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function newsApprovePublish($id)
    {
        $data=NewsManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            NewsManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            NewsManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function popupAdvertiesActivityApprovePublish($id)
    {
        $data=PopupAdvertising::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            PopupAdvertising::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            PopupAdvertising::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function purchaseWorksCommitteeApprovePublish($id)
    {
        $data=PurchaseWorksCommittee::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            PurchaseWorksCommittee::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            PurchaseWorksCommittee::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function rtiApplicationResponseApprovePublish($id)
    {
        $data=RtiApplicationResponses::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            RtiApplicationResponses::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            RtiApplicationResponses::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function rtiAssetsApprovePublish($id)
    {
        $data=RtiAssets::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            RtiAssets::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            RtiAssets::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function socialLinksApprovePublish($id)
    {
        $data=SocialLink::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            SocialLink::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            SocialLink::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function tenderApprovePublish($id)
    {
        $data=TenderManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            TenderManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            TenderManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function tenderTypeApprovePublish($id)
    {
        $data=DB::table('tender_type')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('tender_type')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('tender_type')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function websiteCoreSettingsSocialLinkApprovePublish($id)
    {
        $data=DB::table('social_links')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('social_links')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('social_links')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function websiteCoreSettingsSocialMediaCardsApprovePublish($id)
    {
        $data=DB::table('social_media_enbed')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('social_media_enbed')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('social_media_enbed')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function websiteCoreSettingsLogoApprovePublish($id)
    {
        $data=WebsiteCoreSettings::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            WebsiteCoreSettings::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            WebsiteCoreSettings::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function websiteCoreSettingsFooterContentApprovePublish($id)
    {
        $data=DB::table('footer_management')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('footer_management')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('footer_management')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function websiteMenuApprovePublish($id)
    {
        $data=WebsiteMenuManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            WebsiteMenuManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            WebsiteMenuManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function userManagementApprovePublish($id)
    {
        $data=UserManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            UserManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            UserManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function formBuildingApprovePublish($id)
    {
        $data=DB::table('form_designs_management')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('form_designs_management')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('form_designs_management')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function formDataApprovePublish($id)
    {
        $data=DB::table('form_data_management')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('form_data_management')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('form_data_management')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function manualFileUploadApprovePublish($id)
    {
        $data=ManualFileUpload::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            ManualFileUpload::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            ManualFileUpload::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function FAQApprovePublish($id)
    {
        $data=DB::table('faq')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('faq')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('faq')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function dashboardModuleApprovePublish($id)
    {
        $data=ModuleManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            ModuleManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            ModuleManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function auditReportApprovePublish($id)
    {
        $data=ModuleManagement::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            ModuleManagement::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            ModuleManagement::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function newRoleApprovePublish($id)
    {
        $data=DB::table('role_type_users')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('role_type_users')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('role_type_users')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function popupAdvertisingApprovePublish($id)
    {
        $data=PopupAdvertising::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            PopupAdvertising::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            PopupAdvertising::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function privateGovernmentClientsApprovePublish($id)
    {
        $data=PrivateGovernmentClients::where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            PrivateGovernmentClients::where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            PrivateGovernmentClients::where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function homePageSectionDesignApprovePublish($id)
    {
        $data=DB::table('home_page_sections_designs_details')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('home_page_sections_designs_details')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('home_page_sections_designs_details')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function newSectionsApprovePublish($id)
    {
        $data= DB::table('home_page_sections_list')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('home_page_sections_list')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('home_page_sections_list')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function websiteCoreSettingsHeaderRightLogoApprovePublish($id)
    {
        $data= DB::table('header_right_logo')->where('uid',$id)->first()->status;
        if($data ==0 || $data ==1)
        {
            DB::table('header_right_logo')->where('uid',$id)->update(['status'=>'2']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }else if($data ==2){
            DB::table('header_right_logo')->where('uid',$id)->update(['status'=>'3']);
            return response()->json([
                'status'=>200,
                'message'=>'Approve successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
}