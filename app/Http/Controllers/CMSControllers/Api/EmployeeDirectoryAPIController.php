<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\EmployeeDirectory;
use App\Models\CMSModels\EmpDepartDesignation;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use DB, Validator;
use Carbon\Carbon;

class EmployeeDirectoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=EmployeeDirectory::where('soft_delete','0')->get();
        $totalRecords = EmployeeDirectory::where('soft_delete','0')->count();
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(config('checkduplicate.mobile') == 'ON'){
            $exitValue = EmployeeDirectory::where('mobile', $request->mobileno)->count() > 0;
        }else{
            $exitValue ='true';
        }
        // $max_size = $document->getMaxFileSize() / 1024 / 1024;
         if($exitValue == 'false'){
             DB::rollback();
             $notification =[
                 'status'=>201,
                 'message'=>'Mobile or Email is duplicate value.'
             ];
         }else{
             try{
                 $validator=Validator::make($request->all(),
                     [
                     'fename'=>'required|string',
                     'mobileno'=>'required|max:10',
                     'email'=>'required|string|email|max:255',
                     'designation_id'=>'required',
                     'avatar'=>'required|mimes:jpeg,bmp,png,gif,svg|max:10000'
                 ]);
                 if($validator->fails())
                 {
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
                        $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/empDirectory');
                        $file->move($path,$newname);
                    }
                     $result= EmployeeDirectory::insert([
                             'uid' => Uuid::uuid4(),
                             'fname_en' => $request->fename,
                             'mname_en' => $request->mename,
                             'lname_en' => $request->lename,
                             'fname_hi' => $request->fhname,
                             'mname_hi' => $request->mhname,
                             'lname_hi' => $request->lhname,
                             'mobile' => $request->mobileno,
                             'email' => $request->email,
                             'landline_number' => $request->landlineNo,
                             'extention_number' => $request->extentionNo,
                             'description_en' => $request->description_e,
                             'description_hi' => $request->description_h,
                             'department_id' =>$request->deprt_id??'',
                             'designation_id' => $request->designation_id??'',
                             'public_url' => $newname,
                             'address' => $request->address??'',
                             'date_of_birth' => $request->dob??'',
                             'date_of_death' => $request->dod??'',
                             'short_order' => $request->short_order,
                             //Social Link
                             //'google_link' => $request->linkedin,
                             'linked_in' => $request->linkedin,
                             'facebook' => $request->facebook,
                             'twitter' => $request->twitter,
                             'instagram' => $request->instagram,
                             //'gitHub' => $request->gitHub,
                         ]);
                     
                 if($result == true)
                 {
                     $notification =[
                         'status'=>200,
                         'message'=>'Added successfully.'
                     ];
                 }
                 else{
                    // DB::rollback();
                     $notification = [
                             'status'=>201,
                             'message'=>'some error accoured.'
                         ];
                     } 
                 }      
             }catch(Throwable $e)
             {
                 report($e);
                 return false;
             }
         }
         return response()->json($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeDirectory  $employeeDirectory
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDirectory $employeeDirectory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeDirectory  $employeeDirectory
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeDirectory $employeeDirectory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeDirectory  $employeeDirectory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeDirectory $employeeDirectory)
    {
        $data=DB::table('employee_directories')->where('uid',$request->id)->first();
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
                'fename'=>'required|string',
                'mobileno'=>'required|max:10',
                'email'=>'required|string|email|max:255',
                'designation_id'=>'required',
                //'avatar'=>'required|mimes:jpeg,bmp,png,gif,svg|max:10000'
        ]);
        if($validator->fails())
        {
            $notification =[
                'status'=>200,
                'message'=> $validator->errors()
            ];
        }
        else{
            if($request->hasFile('avatar') !=false){    
                //$size = $this->getFileSize($request->file('avatar')->getSize());
                $file=$request->file('avatar');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/empDirectory');
                $file->move($path,$newname);
            }else{
                $imag=DB::table('employee_directories')->where('uid',$request->id)->first();
                $newname=$imag->public_url;
            }
            $result= EmployeeDirectory::where('uid',$request->id)->update([
                            'fname_en' => $request->fename,
                            'mname_en' => $request->mename,
                            'lname_en' => $request->lename,
                            'fname_hi' => $request->fhname,
                            'mname_hi' => $request->mhname,
                            'lname_hi' => $request->lhname,
                            'mobile' => $request->mobileno,
                            'email' => $request->email,
                            'landline_number' => $request->landlineNo,
                            'extention_number' => $request->extentionNo,
                            'description_en' => $request->description_e,
                            'description_hi' => $request->description_h,
                            'department_id' =>$request->deprt_id??'',
                            'designation_id' => $request->designation_id??'',
                            'public_url' => $newname,
                            'address' => $request->address??'',
                            'date_of_birth' => $request->dob??'',
                            'date_of_death' => $request->dod??'',
                            'short_order' => $request->short_order,
                            //Social Link
                            //'google_link' => $request->linkedin,
                            'linked_in' => $request->linkedin,
                            'facebook' => $request->facebook,
                            'twitter' => $request->twitter,
                            'instagram' => $request->instagram,
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
        }
        return response()->json($notification);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeDirectory  $employeeDirectory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=EmployeeDirectory::where('uid',$id)->first();
        if($data)
        {
            EmployeeDirectory::where('uid',$id)->update(['soft_delete'=>'1']);
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
