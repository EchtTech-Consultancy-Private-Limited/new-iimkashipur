<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\CMSModels\FooterManagement;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Validator;
use Carbon\Carbon;

class FooterManagementAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data=FooterManagement::where('soft_delete','0')->get();
        $totalRecords = FooterManagement::where('soft_delete','0')->count();
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
        try{
            $validator=Validator::make($request->all(),
                [
                'kt_description_en'=>'required',
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                $result= FooterManagement::insert([
                        'uid' => Uuid::uuid4(),
                        // 'tab_type' => $request->tabtype,
                        // 'title_name_en' => $request->title_name_en,
                        // 'title_name_hi' => $request->title_name_hi,
                        'content_html_en' => $request->kt_description_en,
                        'content_html_hi' => $request->kt_description_hi,
                        "locate_map_link" => $request->locate_map_links,
                        //'public_url' => json_encode($imgData),
                        //'start_date'=> $request->startdate,
                        //'end_date' => $request->enddate,
                        //'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('TENDER_ARCHIVEL')),
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
     * Display the specified resource.
     */
    public function show(FooterManagement $FooterManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=FooterManagement::where('uid',$id)->first();
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
        $data=FooterManagement::where('uid',$request->id);
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
            'logo_title'=>'required',
            'header_logo'=>'required',
            //'position_check'=>'required',
            //'footer_check'=>'required'
        ]);
        if($validator->fails())
        {
            $notification =[
                'status'=>200,
                'message'=> $validator->errors()
            ];
        }
        else{
            if($request->hasFile('header_logo')){    
                $file=$request->file('header_logo');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=resource_path('uploads/FooterManagement');
                $file->move($path,$newname);
            }
            $result= FooterManagement::where('uid',$request->id)->update([
                    'logo_title' => $request->logo_title,
                    'header_logo' => $request->newname,
                    'footer_logo' => $request->newname,
                    'position_check' => $request->position_check,
                    'footer_check' => $request->footer_check,
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
        $data=FooterManagement::where('uid',$id)->first();
        if($data)
        {
         FooterManagement::where('uid',$id)->update(['soft_delete'=>'1']);
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
