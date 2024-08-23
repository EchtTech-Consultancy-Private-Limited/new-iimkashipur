<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\CMSModels\UserManagement;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use DB, Validator, Auth;
use Carbon\Carbon;

class UserManagementAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('users')->where('soft_delete','0')->whereNotIn('role_id', ['1','2'])->orderby('id','asc')->get();
        $totalRecords = DB::table('users')->where('soft_delete','0')->whereNotIn('role_id', ['1','2'])->count();
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

        $exitValue = DB::table('users')->where('email', $request->user_email)->count() > 0;
        // $max_size = $document->getMaxFileSize() / 1024 / 1024;
         if($exitValue == 'false'){
            return response()->json(['email' => 'This email address already exists in our system']);
         }else{
            try{
                // if($request->hasFile('avatar')){
                //     $request['avatar'] = $request->hasFile('avatar');
                // }
                $validator=Validator::make($request->all(),
                    [
                    'user_name'=>'required|string',
                    'user_email'=>'required',
                    'user_role'=>'required',
                    //'avatar' => 'required|mimes:jpeg,png,jpg|max:10000'
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
                    if($request->hasFile('avatar')){    
                        //$size = $this->getFileSize($request->file('avatar')->getSize());
                        $file=$request->file('avatar');
                        $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                        $path=resource_path('uploads/userImage');
                        $file->move($path,$newname);
                    }
                    $result= DB::table('users')->insert([
                            'name' => strip_tags($request->user_name),
                            'email' => $request->user_email,
                            'role_id' => explode(',',$request->user_role)[0],
                            'role_name' => explode(',',$request->user_role)[1],
                            'email_verified_at' => now(),
                            'login_status' => 0,
                            'avatar' => isset($newname)?$newname:'',
                            'password' => Hash::make(isset($request->password)?$request->password:'welcome@123'),
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


    public function updateAccount(Request $request){

        $exitValue = DB::table('users')->where('id', Auth::user()->id)->count() > 0;
        //dd($exitValue);
         if($exitValue == false){
            return response()->json(['email' => 'This Account is not exists in our system']);
         }else{
            try{
                $validator=Validator::make($request->all(),
                    [
                    'user_name'=>'required|string',
                    'avatar' => 'required|mimes:jpeg,png,jpg|max:10000'
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
                    if($request->hasFile('avatar')){    
                        //$size = $this->getFileSize($request->file('avatar')->getSize());
                        $file=$request->file('avatar');
                        $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                        $path=resource_path('uploads/userImage');
                        $file->move($path,$newname);
                    }
                    $result= DB::table('users')->where('id',Auth::user()->id)->update([
                            'name' => strip_tags($request->user_name),
                            'avatar' => isset($newname)?$newname:'',
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

    public function updatePassword(Request $request){
            $request['currentpassword']= base64_decode(strrev($request->currentpassword));
            $request['newpassword']= base64_decode(strrev($request->newpassword));
            $request['confirmpassword']= base64_decode(strrev($request->confirmpassword));
            $user = auth()->user();
            try{
                $request->validate(
                    [
                        'currentpassword' => 'required',
                        'newpassword' => 'required',
                        'confirmpassword' => 'required|same:newpassword'
                    ],
                  );
                  if(!Hash::check($request->currentpassword, $user->password)){
                    return response()->json(['message' => "Your password was not updated, since the provided current password does not match.",'status'=>401],401);
                  }else{
                  if(Hash::check($request->newpassword, $user->password)){
                    return response()->json(['message' => "Your current password can't be same as old password.",'status'=>401],401);
                  }else{
                //$validator=Validator::make($request->all(),
                     //[
                    // 'currentpassword' =>[
                    //     'required',
                    //     function ($attribute, $value, $fail) use ($user) {
                    //         if (!Hash::check($value, $user->password)) {
                    //             $fail('Your password was not updated, since the provided current password does not match.');
                    //         }
                    //     }
                    // ],
                    // 'newpassword' => [
                    //     'required',
                    //     function ($attribute, $value, $fail) use ($user) {
                    //         if (!Hash::check($value, $user->password)) {
                    //             $fail("Your current password can't be same as old password.");
                    //         }
                    //     }
                    // ],
                    // 'currentpassword' => 'required',
                    // 'newpassword' => 'required',
                    // 'confirmpassword' => 'required|same:newpassword'
               // ]);
                // if($validator->fails())
                // {
                //     //$status = 201;
                //     $notification =[
                //         'status'=>201,
                //         'message'=> $validator->errors()
                //     ];
                // }
                // else{
                    $result= DB::table('users')->where('id',Auth::user()->id)->update([
                            'password' => Hash::make(isset($request->newpassword)?$request->newpassword:'welcome@123'),
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
                    } }}
               // }      
            }catch(Throwable $e){report($e);
                return false;
            }
            return response()->json($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(UserManagements $UserManagements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=DB::table('users')->where('id',$id)->first();
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
    public function update(Request $request)
    {
       // dd($request->user_email);
        $data=DB::table('users')->where('id',$request->id)->first();
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
                'user_name'=>'required',
                'user_email'=>'required',
                'user_role'=>'required',
        ]);
        if($validator->fails())
        {
            $notification =[
                'status'=>200,
                'message'=> $validator->errors()
            ];
        }
        else{
            if($request->hasFile('avatar')){    
                //$size = $this->getFileSize($request->file('avatar')->getSize());
                $file=$request->file('avatar');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=resource_path('uploads/userImage');
                $file->move($path,$newname);
            }else{
                $newname=DB::table('users')->where('id',$request->id)->first()->avatar;
            }
            if($request->password !=''){
                $password= Hash::make(isset($request->password)?$request->password:'welcome@123');
            }else{
                $password=DB::table('users')->where('id',$request->id)->first()->password;
            }
            $result= DB::table('users')->where('id',$request->id)->update([
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'role_id' => explode(',',$request->user_role)[0],
                    'role_name' => explode(',',$request->user_role)[1],
                    'email_verified_at' => now(),
                    'avatar' => $newname,
                    'password' => $password,
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
        return response()->json($notification);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=DB::table('users')->where('id',$id)->first();
        if($data)
        {
            DB::table('users')->where('id',$id)->update(['soft_delete'=> 1]);
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
}
