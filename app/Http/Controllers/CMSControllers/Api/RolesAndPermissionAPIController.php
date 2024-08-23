<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\CMSModels\RolesAndPermission;
use Illuminate\Http\Request;
use App\Http\Requests\Roles\AddRoleValidation;
use App\Http\Requests\Roles\EditRoleValidation;
use Ramsey\Uuid\Uuid;
use DB, Validator;
use Carbon\Carbon;

class RolesAndPermissionAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function permissionIndex()
    {
        $data=DB::table('roles_and_permissions')->where('soft_delete','0')->get();
        $totalRecords = DB::table('roles_and_permissions')->where('soft_delete','0')->count();
        $resp = new \stdClass;
        $resp->iTotalRecords = $totalRecords;
        $resp->iTotalDisplayRecords = $totalRecords;
        $resp->aaData = $data;
        if($resp)
            {
                return response()->json($resp,200);
            }
            else{
                return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }

    public function indexNewRole()
    {
        $data=DB::table('role_type_users')->where('soft_delete','0')->get();
        $totalRecords = DB::table('role_type_users')->where('soft_delete','0')->count();
        $resp = new \stdClass;
        $resp->iTotalRecords = $totalRecords;
        $resp->iTotalDisplayRecords = $totalRecords;
        $resp->aaData = $data;
        if($resp)
            {
                return response()->json($resp,200);
            }
            else{
                return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function index()
    {
        $data=RolesAndPermission::where('soft_delete','0')->get();
        $totalRecords = RolesAndPermission::where('soft_delete','0')->count();
        $resp = new \stdClass;
        $resp->iTotalRecords = $totalRecords;
        $resp->iTotalDisplayRecords = $totalRecords;
        $resp->aaData = $data;
        if($resp)
            {
                return response()->json($resp,200);
            }
            else{
                return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $exitValue = RolesAndPermission::where([['google_link', $request->google_link],['soft_delete',0]])->count() > 0;
        // $max_size = $document->getMaxFileSize() / 1024 / 1024;
         if($exitValue == 'false'){
             $notification =[
                 'status'=>201,
                 'message'=>'This is duplicate value.'
             ];
         }else{
            try{
                $validator=Validator::make($request->all(),
                    [
                    'google_link'=>'required',
                    'linkedin'=>'required',
                    'facebook'=>'required',
                ]);
                if($validator->fails())
                {
                    //$status = 201;
                    $notification =[
                        'status'=>201,
                        'message'=> $validator->errors()
                    ];
                }
                else{
                    $result= RolesAndPermission::insert([
                            'uid' => Uuid::uuid4(),
                            'google_link' => $request->google_link,
                            'linkedin' => $request->linkedin,
                            'facebook' => $request->facebook,
                            'twitter' => isset($request->twitter)?$request->twitter:'0',
                            'instagram' => isset($request->instagram)?$request->instagram:'0',
                            'github' => isset($request->github)?$request->github:'0',
                        ]);
                if($result == true)
                {
                    $notification =[
                        'status'=>200,
                        'message'=>'Added successfully.'
                    ];
                }
                else{
                    $notification = [
                            'status'=>201,
                            'message'=>'some error accoured.'
                        ];
                    } 
                }      
            }catch(Throwable $e){report($e);
                return false;
            }
        }
        return response()->json($notification);
    }
    public function newRoleAdd(AddRoleValidation $request)
    {
            try{
                $result= DB::table('role_type_users')->insert([
                    'uid' => Uuid::uuid4(),
                    'role_type' => $request->role_type,
                    'sort_order' => $request->sort_order,
                    ]);
                if($result == true)
                {
                    $notification =[
                        'status'=>200,
                        'message'=>'Added successfully.'
                    ];
                }
                else{
                    $notification = [
                            'status'=>201,
                            'message'=>'some error accoured.'
                        ];
                    } 
            }catch(Throwable $e){report($e);
                return false;
            }
        return response()->json($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(RolesAndPermissions $RolesAndPermissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=RolesAndPermission::where('uid',$id)->first();
      if($data)
            {
                return response()->json(['data'=>$data],200);
            }
            else{
                return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=RolesAndPermission::where('uid',$id)->first();
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
            'google_link'=>'required',
            'linkedin'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'github'=>'required'
        ]);
        if($validator->fails())
        {
            $notification =([
                'status'=>201,
                'message'=> $validator->errors()
            ]);
        }
        else{
            $result= RolesAndPermission::where('uid',$id)->update([
                    'uid' => Uuid::uuid4(),
                    'google_link' => $request->google_link,
                    'linkedin' => $request->linkedin,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'github' => $request->github,
                ]);
            
        if($result == true)
        {
            $notification =[
                'status'=>200,
                'message'=>'Added successfully.'
            ];
        }
        else{
            $notification = ([
                'status'=>201,
                'message'=>'some error accoured.'
            ]);
            } 
        }
        return response()->json($notification);
       }
    }
    public function newRoleUpdate(EditRoleValidation $request)
    {   
        try{
            $result= DB::table('role_type_users')->where('uid',$request->id)->update([
                'role_type' => $request->role_type,
                'sort_order' => $request->sort_order,
                'status' => 1,
            ]);
            if($result == true)
            {
                $notification =[
                    'status'=>200,
                    'message'=>'Added successfully.'
                ];
            }
            else{
                $notification = [
                        'status'=>201,
                        'message'=>'some error accoured.'
                    ];
                 } 
           }catch(Throwable $e){report($e);
            return false;
           }
            return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=RolesAndPermission::where('uid',$id)->first();
        if($data)
        {
            RolesAndPermission::where('uid',$id)->update(['soft_delete'=>1]);
            return response()->json([
                'status'=>200,
                'message'=>'deleted successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function newRoleDestroy($id)
    {
        $data=DB::table('role_type_users')->where('uid',$id)->first();
        if($data)
        {
            DB::table('role_type_users')->where('uid',$id)->update(['soft_delete'=>1]);
            return response()->json([
                'status'=>200,
                'message'=>'deleted successfully.'
            ],200);
        }
        else{
            return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }

    public function permissionAdd(Request $request){
		$data=$request->all();
		$arr=$this->generateData($data);
        $role_id=explode(',',$data['role_name'])[0];
        $flag='';
		foreach ($arr as $list) {
			$wordlist = DB::table('roles_and_permissions')->where(["module_name"=>$list['module_name'],"role_id"=>$role_id])->count();
            if($wordlist == 0){
				$list['role_id']=explode(',',$data['role_name'])[0];  
				$list['role_name']=explode(',',$data['role_name'])[1];  
                $flag= DB::table('roles_and_permissions')->insert($list);
			}else{
				$list['role_id']=explode(',',$data['role_name'])[0];
				$list['role_name']=explode(',',$data['role_name'])[1];

                $flag= DB::table('roles_and_permissions')->where('module_name',$list['module_name'])->where('role_id',$role_id)->update($list);
			}
		}  
		//dd($flag);
		if ($flag !='') {
            $notification =[
                'status'=>200,
                'message'=>'Added successfully.'
            ];
		} else {
            $notification = [
                'status'=>201,
                'message'=>'some error accoured.'
            ];
         } 
		return response()->json($notification);
	}
	private function generateData($data){
		$arr=array();
		$i=0; 
		foreach($data['module_name'] as $key=>$val){
            $mudule = explode(',',$data['module_name'][$key]);
			$arr[$i]['module_name']=$mudule[0];
			$arr[$i]['sort_order']=$mudule[1];
			$arr[$i]['prefix']=$mudule[2];
           // $arr[$i]['uid']= Uuid::uuid4();
			if(!empty($data['delete'][$key])){
			  $arr[$i]['delete']=$data['delete'][$key];
			}else{
				$arr[$i]['delete']='N';
			}
			if(!empty($data['update'][$key])){
				$arr[$i]['update']=$data['update'][$key];
			 }else{
				 $arr[$i]['update']='N';
			 }
			if(!empty($data['read'][$key])){
			   $arr[$i]['view']=$data['read'][$key];
			}else{
				$arr[$i]['view']='N';
			}
            if(!empty($data['read'][$key])){
                $arr[$i]['read']=$data['read'][$key];
             }else{
                 $arr[$i]['read']='N';
             }
			if(!empty($data['create'][$key])){
			   $arr[$i]['create']=$data['create'][$key];
			}else{
				$arr[$i]['create']='N';
			}
             if(!empty($data['approver'][$key])){
				$arr[$i]['approver']=$data['approver'][$key];
			 }else{
				 $arr[$i]['approver']='N';
			 }
             if(!empty($data['publisher'][$key])){
				$arr[$i]['publisher']=$data['publisher'][$key];
			 }else{
				 $arr[$i]['publisher']='N';
			 }
             if(!empty($data['publisher'][$key])){
				$arr[$i]['publisher']=$data['publisher'][$key];
			 }else{
				 $arr[$i]['publisher']='N';
			 }
			$i++;
		}  
		return $arr;
	  }
      
}
