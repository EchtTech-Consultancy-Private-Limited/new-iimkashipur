<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\UserManagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class UserManagementController extends Controller
{
    use AccessModelTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'user-management.user-add';
    protected $edit = 'user-management.user-edit';
    protected $list = 'user-management.user-list';
    protected $view = 'user-management.user-view';
    protected $accountSetting = 'account-setting.account-update';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('user-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('user-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
            $crudUrlTemplate['view'] = route('user.show', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('user.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('user-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('loginuser-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('loginuser-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
        }
        
       
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');
        $roleType=DB::table('role_type_users')->select('role_type','uid')->where([['soft_delete','=','0']])->orderby('sort_order','asc')->get();
        
        return view('cms-view.'.$this->list,
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'roleType' =>$roleType
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms-view.'.$this->create);
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
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserManagement $userManagement)
    {
        $dataVal=DB::table('users')->where('id',$request->id)->where('soft_delete','0')->first();
        if($dataVal !=null){
            $dataV =$dataVal;
        }else{
            return view('cms-view.errors.500');
        }

        return view('cms-view.'.$this->view,['data'=>$dataV??'']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
            $crudUrlTemplate = array();
            if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
                $crudUrlTemplate['update'] = route('user-update');
            }

            $results = DB::table('users')->where('id', $request->id)->first();
            $roleType=DB::table('role_type_users')->select('role_type','uid')->where([['soft_delete','=','0']])->orderby('sort_order','asc')->get();
            if($results){
                $result = $results;
            }else{
                return view('cms-view.errors.500');
            }
            return view('cms-view.'.$this->edit,
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'data'=> $result,
            'roleType' =>$roleType
        ]);
    }
    
    public function accountSettingsEdit(Request $request){
            $crudUrlTemplate = array();
            // if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            //     $crudUrlTemplate['update'] = route('user-update');
            // }
            $crudUrlTemplate['update_account'] = route('account-update');
            $crudUrlTemplate['password_change'] = route('password-update');
            $results = DB::table('users')->where('id', $request->id)->first();
            $Visitors = DB::table('visiting_counters')->count();
            $roleType=DB::table('role_type_users')->select('role_type','uid')->where([['soft_delete','=','0']])->orderby('sort_order','asc')->get();
            
            return view('cms-view.'.$this->accountSetting,
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
                'data'=> $results,
                'roleType' =>$roleType,
                'Visitors' =>$Visitors??'00'
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserManagement $userManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserManagement $userManagement)
    {
        //
    }
}
