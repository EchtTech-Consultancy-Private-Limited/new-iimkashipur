<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\WebsiteCoreSettings;
use App\Models\CMSModels\FooterManagement;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\AccessModelTrait;
use DB;

class WebsiteCoreSettingsController extends Controller
{
    use AccessModelTrait;

    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = '';
    protected $edit = '';
    protected $list = '';
    
    public function indexLogo(Request $request,$id=null)
    {

       $crudUrlTemplate = array();
       // xxxx to be replaced with ext_id to create valid endpoint
       if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('logo-list');
       }
       
       if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('websitecoresetting.edit', ['id' => 'xxxx']);
       }
       
       if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('cws-delete', ['id' => 'xxxx']);
       }
       if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
        $crudUrlTemplate['approver'] = route('logo-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('logo-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        
       //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

       return view('cms-view.website-core-settings.websitelogo_list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }
    public function indexFooterContent(Request $request,$id=null)
    {

       $crudUrlTemplate = array();
       // xxxx to be replaced with ext_id to create valid endpoint
       if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('footercontent-list');
       }
       
       if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('websitecoresetting.edit', ['id' => 'xxxx']);
       }
       
       if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
             $crudUrlTemplate['delete'] = route('footer-delete', ['id' => 'xxxx']);
       }
       if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
        $crudUrlTemplate['approver'] = route('footercontent-approve', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('footercontent-approve', ['id' => 'xxxx']);
        }
        
       //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

       return view('cms-view.website-core-settings.footercontent_list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }
    public function indexSocialLink(Request $request,$id=null)
    {

       $crudUrlTemplate = array();
       // xxxx to be replaced with ext_id to create valid endpoint
       if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('sociallink-list');
       }
       
       if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('websitecoresetting.edit', ['id' => 'xxxx']);
       }
       
       if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('delete-sl', ['id' => 'xxxx']);
       }
       if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
        $crudUrlTemplate['approver'] = route('socialLink-approve', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('socialLink-approve', ['id' => 'xxxx']);
        }
        
       //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

       return view('cms-view.website-core-settings.sociallink_list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }
    public function indexSocialMediaCards(Request $request,$id=null)
    {

       $crudUrlTemplate = array();
       // xxxx to be replaced with ext_id to create valid endpoint
       if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('socialmediacards-list');
       }
       
       if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('websitecoresetting.edit', ['id' => 'xxxx']);
       }
       
       if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('delete-smc', ['id' => 'xxxx']);
       }
       if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
        $crudUrlTemplate['approver'] = route('socialmediacards-approve', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('socialmediacards-approve', ['id' => 'xxxx']);
        }
        
       //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

       return view('cms-view.website-core-settings.socialmediacards_list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }
    public function indexHeaderRightLogo(Request $request,$id=null)
    {

       $crudUrlTemplate = array();
       // xxxx to be replaced with ext_id to create valid endpoint
       if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('rightheaderlogo-list');
       }
       
       if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('websitecoresetting.edit', ['id' => 'xxxx']);
       }
       
       if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('delete-rhls', ['id' => 'xxxx']);
       }
       if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
        $crudUrlTemplate['approver'] = route('headerrightlogo-approve', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('headerrightlogo-approve', ['id' => 'xxxx']);
        }
        
       //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

       return view('cms-view.website-core-settings.rightheaderlogo_list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }


    public function indexAdvertisingPopup(){
        $crudUrlTemplate = array();
       // xxxx to be replaced with ext_id to create valid endpoint
       if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('popupadvertising-list');
       }
       
       if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('websitecoresetting.edit', ['id' => 'xxxx']);
       }
       
       if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('popupadvertising-delete', ['id' => 'xxxx']);
       }
       if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
        $crudUrlTemplate['approver'] = route('popupadvertising-approve', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('popupadvertising-approve', ['id' => 'xxxx']);
        }
        
       //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

       return view('cms-view.website-core-settings.advertising_popup_list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data=WebsiteCoreSettings::all(); 
       $crudUrlTemplate = array();
       // xxxx to be replaced with ext_id to create valid endpoint
       if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create_headerlogo'] = route('headerLogo-save');
            $crudUrlTemplate['create_footerContent'] = route('footer-save');
            $crudUrlTemplate['create_sociallink'] = route('socialLink-save');
            $crudUrlTemplate['create_popupadvertising'] = route('popupadvertising-save');
            $crudUrlTemplate['create_socialmediacard'] = route('socialmediacard-save');
            $crudUrlTemplate['create_headerrightlogo'] = route('headerrightlogo-save');
       }else{
            $accessPermission = $this->checkAccessMessage();
        }
       return view('cms-view.website-core-settings.websitecoresetting_add',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),    
            'textMessage' =>$accessPermission??''
        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteCoreSettings  $websiteCoreSettings
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WebsiteCoreSettings $websiteCoreSettings)

    {
        $data=WebsiteCoreSettings::all();
        $totalRecords = WebsiteCoreSettings::where('soft_delete',0)->count();
     

        $resp = new \stdClass;

        $resp->iTotalRecords = $totalRecords;
        $resp->iTotalDisplayRecords = $totalRecords;
        $resp->sEcho = (int)$request->input('draw');
        $resp->aaData = $data;
        
        return response()->json($resp);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteCoreSettings  $websiteCoreSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update_headerlogo'] = route('headerLogo-update');
            $crudUrlTemplate['update_footerContent'] = route('footer-update');
            $crudUrlTemplate['update_sociallink'] = route('socialLink-update');
            $crudUrlTemplate['update_popupAdvertisings'] = route('popupadvertising-update');
            $crudUrlTemplate['update_socialmediacard'] = route('socialmediacard-update');
            $crudUrlTemplate['update_headerrightlogo'] = route('headerrightlogo-update');
        }

       $datas = WebsiteCoreSettings::where('uid',$request->id)->first();
       $footerdatas = FooterManagement::where('uid',$request->id)->first();
       $sociallinkDatas = DB::table('social_links')->where('uid',$request->id)->first();
       $popupAdvertisings = DB::table('popup_advertisings')->where('uid',$request->id)->first();
       $socialmediacards = DB::table('social_media_enbed')->where('uid',$request->id)->first();
       $rightheaderlogo = DB::table('header_right_logo')->where('uid',$request->id)->first();
        if(isset($datas)){
            $Logodata = $datas;
            $formCall = 'websitecoresetting_edit';
        }elseif(isset($footerdatas)){
            $footerdata = $footerdatas;
            $formCall = 'footercontent_edit';
        }elseif(isset($sociallinkDatas)){
            $sociallinkData = $sociallinkDatas;
            $formCall = 'sociallink_edit';
        }elseif(isset($popupAdvertisings)){
            $popupAdvertising = $popupAdvertisings;
            $formCall = 'advertising_popup_edit';
        }elseif(isset($socialmediacards)){
            $socialmediacard = $socialmediacards;
            $formCall = 'social_mediacards_edit';
        }elseif(isset($rightheaderlogo)){
            $rightheaderlogos = $rightheaderlogo;
            $formCall = 'rightheaderlogo_edit';
        }else{
            return view('cms-view.errors.500');
        }
        return view('cms-view.website-core-settings.'.$formCall,
        [
            'crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'data'=> isset($Logodata)?$Logodata:'',
            'footerdata'=> isset($footerdata)?$footerdata:'',
            'sociallinkData'=> isset($sociallinkData)?$sociallinkData:'',
            'popupAdvertising'=> isset($popupAdvertising)?$popupAdvertising:'',
            'socialmediacard'=> isset($socialmediacard)?$socialmediacard:'',
            'rightheaderlogolist'=> isset($rightheaderlogos)?$rightheaderlogos:'',
        ]);
    }

    public function update(Request $request, WebsiteCoreSettings $websiteCoreSettings)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteCoreSettings  $websiteCoreSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteCoreSettings $websiteCoreSettings,Request $request)
    {
        if(websiteCoreSettings::where('id',$request->websiteCoreSettings_id)->exists())
        {
        WebsiteCoreSettings::find($request->websiteCoreSettings_id)->delete();
        return response()->json(['success'=>'Company Delete Successfully'],200);  
        }
        else{
            return response()->json(['success'=>'Record not exist.'],201);
        }
    }
}
