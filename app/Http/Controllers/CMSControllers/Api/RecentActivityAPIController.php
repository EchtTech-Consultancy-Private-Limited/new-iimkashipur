<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\RecentActivity;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use DB, Validator;
use Carbon\Carbon;

class RecentActivityAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=RecentActivity::where('soft_delete','0')->get();
        $totalRecords = RecentActivity::where('soft_delete','0')->count();
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
        $exitValue = RecentActivity::where([['recent_activities_en', $request->title_name_en],['soft_delete',0]])->count() > 0;
        if($exitValue == 'false'){
            $notification =[
                'status'=>201,
                'message'=>'This is duplicate value.'
            ];
        }else{
        try{
        $validator=Validator::make($request->all(),
            [
            'title_name_en'=>'required',
            'tabtype'=>'required',
        ]);
        if($validator->fails())
        {
            $notification =[
                'status'=>201,
                'message'=> $validator->errors()
            ];
        }
        else{
            $result= RecentActivity::insert([
                'uid' => Uuid::uuid4(),
                'tab_type' => $request->tabtype,
                'recent_activities_en' => $request->title_name_en,
                'recent_activities_hi' => $request->title_name_hi,
                'description_en' => $request->kt_description_en,
                'description_hi' => $request->kt_description_hi,
                'url_link' => $request->link,
                'notification_others' => $request->notification_others,
                'start_date'=> $request->startdate,
                'end_date' => $request->enddate,
                'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('RECENT_ACTIVITY_ARCHIVEL')),
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecentActivity  $recentActivity
     * @return \Illuminate\Http\Response
     */
    public function show(RecentActivity $recentActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecentActivity  $recentActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(RecentActivity $recentActivity)
    {
        $crudUrlTemplate['update'] = route('recentactivity-update');

        $results = RecentActivity::where('uid', $request->id)->first();
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecentActivity  $recentActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecentActivity $recentActivity)
    {
        try{
            $validator=Validator::make($request->all(),
                [
                'tabtype'=>'required',
                'title_name_en'=>'required',
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                $result= RecentActivity::where('uid',$request->id)->update([
                    'tab_type' => $request->tabtype,
                    'recent_activities_en' => $request->title_name_en,
                    'recent_activities_hi' => $request->title_name_hi,
                    'description_en' => $request->kt_description_en,
                    'description_hi' => $request->kt_description_hi,
                    'url_link' => $request->link,
                    'notification_others' => $request->notification_others,
                    'start_date'=> $request->startdate,
                    'end_date' => $request->enddate,
                    'status' => 1,
                    'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('RECENT_ACTIVITY_ARCHIVEL')),
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
            return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecentActivity  $recentActivity
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $data=RecentActivity::where('uid',$id)->first();
        if($data)
        {
            RecentActivity::where('uid',$id)->update(['soft_delete'=>'1']);
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
