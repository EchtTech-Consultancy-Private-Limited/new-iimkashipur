<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\WebsiteMenuManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class WebsiteMenuManagementController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'website-menu-management.menu-add';
    protected $edit = 'website-menu-management.menu-edit';
    protected $list = 'website-menu-management.menu-list';
    protected $view = 'website-menu-management.menu_view';
    protected $viewTree = 'website-menu-management.menu_tree';

    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('menu-list');
        }
        // if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
        //     $crudUrlTemplate['view'] = route('menu.show', ['id' => 'xxxx']);
        // }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('menu.edit', ['id' => 'xxxx']);
        }
        
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('menu-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('menu-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('menu-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');
        //dd($crudUrlTemplate);
        $data=WebsiteMenuManagement::all();

        return view('cms-view.'.$this->list,
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate) ],compact('data'));
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
            $crudUrlTemplate['create'] = route('menu-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        
        $menu=WebsiteMenuManagement::select('name_en','name_hi','uid')->where([['soft_delete','=','0']])->where('parent_id','0')->get();
        $Submenu=WebsiteMenuManagement::select('name_en','name_hi','uid')->where([['soft_delete','=','0']])->whereNot('parent_id', '0')->get();
        return view('cms-view.'.$this->create,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'menuList'=>$menu, 
            'Submenu'=>$Submenu,    
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
        // $request->validate([
        //   // 'logo_title'=>'required'              
        // ]);       
        //     $data=new WebsiteMenuManagement;
        //     $data->menu=$request->menu;
        //     $data->menu_id=$request->menu_id;
        //     $data->sub_menu_id=$request->sub_menu_id;
        //     $data->sub_menu=$request->sub_menu;
        //     $data->sub_sub_menu=$request->sub_sub_menu;
        //     $data->save();
        //     if($data)
        //     {
        //         return response()->json([
        //         'status'=>200,
        //         'message'=>'Added successfully.'
        //     ],200);
        //     }
        //     else{
        //         return response()->json([
        //         'status'=>201,
        //         'message'=>'some error accoured.'
        //     ],201);
        //     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteMenuManagement  $websiteMenuManagement
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteMenuManagement $websiteMenuManagement)
    {
            $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        $crudUrlTemplate['read'] = route('menu.menu-list');
        $crudUrlTemplate['list'] = route('websitecoresetting-list');
        $crudUrlTemplate['delete'] = route('websitecoresetting-list');
        $crudUrlTemplate['view'] = route('websitecoresetting-list');
        

            return view('cms-view.'.$this->list, 
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
            
        ]);
    }
    public function showMenu(Request $request, WebsiteMenuManagement $websiteMenuManagement)
    {
        $menu=DB::table('website_menu_management')->where('uid',$request->id)->where([['parent_id',0],['soft_delete','0']])->first();
        //dd($menu);
        $menus = DB::table('website_menu_management')->where('soft_delete', 0)->where('uid',$request->id)->get();
        $menuName = $this->getMenuTree($menus, 0);
        //dd($menuName);
        if($menu !=null){
            $dataV =$menu;
        }else{
            return view('cms-view.errors.500');
        }
        $details=DB::table('tender_details')->where('tender_id',$request->id)->where('soft_delete','0')->get();

        $data = new \StdClass;
        $data->list = $dataV??'';
        $data->details = $details??'';
        //dd($data);
        return view('cms-view.'.$this->view,['data'=>$data]);
    }
    public function showMenuInTree(Request $request, WebsiteMenuManagement $websiteMenuManagement)
    {
        $menus = DB::table('website_menu_management')->whereIn('menu_place', [0,1,2,3,4,5])->where('soft_delete', 0)->orderBy('sort_order', 'ASC')->get();
        $menuName = $this->getMenuTree($menus, 0);
        //dd($menu);
        if($menuName !=null){
            $dataV =$menuName;
        }else{
            return view('cms-view.errors.500');
        }
        $data = new \StdClass;
        $data->list = $dataV??'';
        //dd($data);
        return view('cms-view.'.$this->viewTree,['data'=>$data]);
    }

    function getMenuTree($menus, $parentId)
    {
        $branch = array();
        foreach ($menus as $menu) {
            if ($menu->parent_id == $parentId) {
                $children = $this->getMenuTree($menus, $menu->uid);
                if ($children) {
                    $menu->children = $children;
                }
                $branch[] = $menu;
            }
        }
        return $branch;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteMenuManagement  $websiteMenuManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('menu-update');
        }

        $Editmenus=WebsiteMenuManagement::select('name_en','name_hi','url','sort_order','footer_url','menu_place','tab_type','parent_id')
                     ->where('uid',$request->id)->first();

        $menuList=WebsiteMenuManagement::select('name_en','name_hi','uid')->where([['soft_delete','=','0']])->get();
        $Submenu=WebsiteMenuManagement::select('name_en','name_hi','uid')->where([['soft_delete','=','0']])->whereNot('parent_id', '0')->get();
        //dd($Editmenu);
        if($Editmenus){
            $Editmenu = $Editmenus;
        }else{
            return view('cms-view.errors.500');
        }
        if(isset($Editmenus->parent_id) && $Editmenus->parent_id ==0 ){
            $type = '0';
        }else{
            $type = '1';
        }
       
        return view('cms-view.'.$this->edit,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'menulist'=> $menuList,
            'Submenu'=>$Submenu,
            'Editmenu' =>$Editmenu,
            'types' =>$type
        ]);
    }
    // function getMenuTree($menus,$parentId){
    //         $branch = array();
    //         foreach ($menus as $menu){
    //             if($menu->parent_id == $parentId) {
    //                 $children = $this->getMenuTree($menus,$menu->uid);
    //                 if ($children) {
    //                     $menu->children = $children;
    //                 }
    //                 $branch[] = $menu;
    //             }
    //         }
    //         return $branch;
    //     }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteMenuManagement  $websiteMenuManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteMenuManagement $websiteMenuManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteMenuManagement  $websiteMenuManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteMenuManagement $websiteMenuManagement)
    {
        //
    }
}
