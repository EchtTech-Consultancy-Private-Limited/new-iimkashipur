<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\HomePageSectionsDesign;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class HomePageSectionsDesignController extends Controller
{
    use AccessModelTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $create = 'home-page-section-design.create';
    protected $edit = 'home-page-section-design.edit';
    protected $editNewSection = 'home-page-section-design.section-edit';
    protected $list = 'home-page-section-design.list';
    protected $listsection = 'home-page-section-design.section-list';
    
    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('homepagesection-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('homepagesection.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('homepagesection-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('homepagesection-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('homepagesection-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

        return view('cms-view.'.$this->list,
            ['crudUrlTemplate' => json_encode($crudUrlTemplate)
        
        ]);
    }

    public function indexNewSections()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('newsection-save');
        }
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('newsections-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('newsection.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('newsection-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('newsection-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('newsection-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

        return view('cms-view.'.$this->listsection,
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
            $crudUrlTemplate['create'] = route('homepagesection-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        $sectionList = DB::table('home_page_sections_list')->where([['status',3],['soft_delete',0]])->get();
        
        return view('cms-view.'.$this->create,
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),    
            'textMessage' =>$accessPermission??'',
            'sectionList' => $sectionList
        
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
     * @param  \App\Models\HomePageSectionsDesign  $homePageSectionsDesign
     * @return \Illuminate\Http\Response
     */
    public function show(HomePageSectionsDesign $homePageSectionsDesign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePageSectionsDesign  $homePageSectionsDesign
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePageSectionsDesign $homePageSectionsDesign, Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('homepagesection-update');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        $results = DB::table('home_page_sections_designs_details')->where('uid', $request->id)->first();
        $sectionList = DB::table('home_page_sections_list')->where([['status',3],['soft_delete',0]])->get();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        return view('cms-view.'.$this->edit,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'textMessage' =>$accessPermission??'',
            'data'=> $result??'',
            'sectionList' => $sectionList??''
        ]);
    }

    public function editNewSections(HomePageSectionsDesign $homePageSectionsDesign, Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('newsection-update');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

        $results = DB::table('home_page_sections_list')->where('uid', $request->id)->first();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        return view('cms-view.'.$this->editNewSection,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'textMessage' =>$accessPermission??'',
            'data'=> $result,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePageSectionsDesign  $homePageSectionsDesign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePageSectionsDesign $homePageSectionsDesign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePageSectionsDesign  $homePageSectionsDesign
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePageSectionsDesign $homePageSectionsDesign)
    {
        //
    }
}
