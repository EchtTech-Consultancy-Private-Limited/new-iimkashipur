<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\CMSModels\AdminLog;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Validator;
use Carbon\Carbon;

class SystemLogsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data=AdminLog::select("admin_logs.*", "users.name")
            ->join("users", "users.id", "=", "admin_logs.user_id")
            ->where('admin_logs.soft_delete','0')
            ->get();
        $totalRecords = AdminLog::where('admin_logs.soft_delete','0')
            ->join("users", "users.id", "=", "admin_logs.user_id")       
            ->count();
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
        $exitValue = AdminLog::where('name_en', $request->name_en)->count() > 0;
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
                        'name_en'=>'required|string|max:255',
                        'sort_order'=>'required',
                        //"file" => "required|mimes:pdf|max:10000"
                    ]);
                if($validator->fails())
                {
                    $notification =[
                        'status'=>201,
                        'message'=> $validator->errors()
                    ];
                }
                else{
                    $result= AdminLog::insert([
                            'uid' => Uuid::uuid4(),
                            'name_en' => $request->name_en,
                            'name_hi' => $request->name_hi,
                            'sort_order' => $request->sort_order,
                            'url' => preg_replace('/\s+/', '-', isset($request->url)?$request->url:'#'),
                            'is_parent' => isset($request->is_parent)?$request->is_parent:'0',
                            'parent_id' => isset($request->parent_id)?$request->parent_id:'0',
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
     */
    public function show(AdminLog $AdminLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=AdminLog::where('uid',$id)->first();
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
        $data=AdminLog::where('uid',$request->id)->first();
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
            'name_en'=>'required',
            'url'=>'required',
        ]);
        if($validator->fails())
        {
            $notification =[
                'status'=>200,
                'message'=> $validator->errors()
            ];
        }
        else{
            $result= AdminLog::where('uid',$request->id)->update([
                    'name_en' => $request->name_en,
                    'name_hi' => $request->name_hi,
                    'sort_order' => $request->sort_order,
                    'url' => preg_replace('/\s+/', '-', isset($request->url)?$request->url:'#'),
                    'is_parent' => isset($request->is_parent)?$request->is_parent:'0',
                    'parent_id' => isset($request->parent_id)?$request->parent_id:'0',
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
     */
    public function destroy($id)
    {
        $data=AdminLog::where('uid',$id)->first();
        if($data)
        {
         AdminLog::where('uid',$id)->update(['soft_delete'=>1]);
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
