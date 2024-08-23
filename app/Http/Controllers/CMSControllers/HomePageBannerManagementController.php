<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\HomePageBannerManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class HomePageBannerManagementController extends Controller
{
    use AccessModelTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'home-page-banner-management.homepagebanner-add';
    protected $edit = 'home-page-banner-management.homepagebanner-edit';
    protected $list = 'home-page-banner-management.homepagebanner-list';
    
    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('banner-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('homebanner.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('banner-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('banner-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('banner-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

        return view('cms-view.'.$this->list,
            ['crudUrlTemplate' => json_encode($crudUrlTemplate)
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create_banner'] = route('banner-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        
        return view('cms-view.'.$this->create,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePageBannerManagement  $homePageBannerManagement
     * @return \Illuminate\Http\Response
     */
    public function show(HomePageBannerManagement $homePageBannerManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePageBannerManagement  $homePageBannerManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('banner-update');
        }

        $results = DB::table('home_page_banner_management')->where('uid', $request->id)->first();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        return view('cms-view.'.$this->edit,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'data'=> $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePageBannerManagement  $homePageBannerManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePageBannerManagement $homePageBannerManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePageBannerManagement  $homePageBannerManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePageBannerManagement $homePageBannerManagement)
    {
        //
    }
}
