<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\RolesAndPermission;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class RolesAndPermissionController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = '';
    protected $edit = '';
    protected $list = '';
    
    public function permissionIndex()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('news-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('news-edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('news-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('news-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('news-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }

        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');
        $data=DB::table('roles_and_permissions')->where('soft_delete','0')->get();
        
        //dd($data);
        return view('cms-view.roles-and-permission.permission_list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'list' => $data
        
        ]);
    }

    public function roleIndex()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('news-list');
        }
        
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('news-edit', ['id' => 'xxxx']);
        }
        
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('news-delete', ['id' => 'xxxx']);
        }
        
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');
        
        $typeUserName=DB::table('role_type_users')->select('*')->where([['soft_delete','=','0']])->get();
        $datas = [];
        foreach($typeUserName as $typeUserNames){
            $newData = new \stdClass;
            $newData->roleTypeName = $typeUserNames;
            $modulePermission=DB::table('roles_and_permissions')->select('*')->where([['role_id','=',$typeUserNames->uid]])->where([['soft_delete','=','0']])->get();
            if($modulePermission){
                $newData->permissionAllow = $modulePermission;
            }
            $datas[] = $newData;
        }
        $objectpass = new \stdclass;
        $objectpass->permissionAllows = $datas;

        return view('cms-view.roles-and-permission.role-list',['permissionAllow' =>$objectpass ]);
    }

    public function newRoleIndex()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('new-role-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('new-role-list');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('newrole.edit', ['id' => 'xxxx']);
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('new-role-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('newrole-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('newrole-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        
        return view('cms-view.roles-and-permission.new-role-list',[
            'crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRoles()
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create_role'] = route('role-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

        $moduleName=DB::table('module_management')->select('name_en','name_hi','uid','sort_order','prefix')->where([['soft_delete','=','0']])->orderby('sort_order','Asc')->get();
        $roleType=DB::table('role_type_users')->select('role_type','uid')->where([['soft_delete','=','0']])->orderby('uid','Asc')->get();
        
        
        return view('cms-view.roles-and-permission.role-add',
          ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
           'module'=>$moduleName,
           'roleType' =>$roleType,    
           'textMessage' =>$accessPermission??''
    
         ]);
    }
    public function createPermission()
    {
        return view('cms-view.roles-and-permission.role-add');
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
     * @param  \App\Models\RolesAndPermission  $rolesAndPermission
     * @return \Illuminate\Http\Response
     */
    public function show(RolesAndPermission $rolesAndPermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RolesAndPermission  $rolesAndPermission
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('role-update');
        }

       $datas = RolesAndPermission::where('role_id',$request->id)->get();
       $moduleName=DB::table('module_management')->select('name_en','name_hi','uid','sort_order','prefix')->where([['soft_delete','=','0']])->orderby('sort_order','Asc')->get();
       $roleType=DB::table('role_type_users')->select('role_type','uid')->where([['soft_delete','=','0']])->orderby('uid','Asc')->get();
       
        if(isset($datas)){
            $data = $datas;
        }else{
            return view('cms-view.errors.500');
        }
        //dd($datas);
        return view('cms-view.roles-and-permission.role-edit',
        [
            'crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'datases' => $datas,
            'module'=>$moduleName,
            'roleType' =>$roleType
        ]);
    }
    public function newRoleEdit(Request $request)
    {

        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('new-role-update');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

       $datas = DB::table('role_type_users')->where('uid',$request->id)->first();
        if(isset($datas)){
            $data = $datas;
        }else{
            abort(404);
        }
        //dd($datas);
        return view('cms-view.roles-and-permission.new-role-edit',
        [
            'crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'data' => $datas,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RolesAndPermission  $rolesAndPermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RolesAndPermission $rolesAndPermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RolesAndPermission  $rolesAndPermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(RolesAndPermission $rolesAndPermission)
    {
        //
    }
}
