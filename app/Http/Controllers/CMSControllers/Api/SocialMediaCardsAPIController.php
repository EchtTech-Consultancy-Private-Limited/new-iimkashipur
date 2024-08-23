<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Validator, DB;
use Carbon\Carbon;

class SocialMediaCardsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('social_media_enbed as m')
                                    ->where('m.soft_delete','0')
                                    ->get();
        $totalRecords = DB::table('social_media_enbed as m')
                                    ->where('m.soft_delete','0')
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
        $exitValue = DB::table('social_media_enbed as m')->where([['facebook', $request->facebook],['soft_delete',0]])->count() > 0;
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
                    'linkedin'=>'required',
                    //'facebook'=>'required',
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
                    $result=DB::table('social_media_enbed')->insert([
                            'uid' => Uuid::uuid4(),
                            'linkedin' => $request->linkedin,
                            'facebook' => $request->facebook??'0',
                            'twitter' => isset($request->twitter)?$request->twitter:'0',
                            'instagram' => isset($request->instagram)?$request->instagram:'0',
                            'youtube' => isset($request->youtube)?$request->youtube:'0',
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
     */
    public function show(SocialLinks $socialLinks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=DB::table('social_media_enbed')->where('uid',$id)->first();
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
        $data=DB::table('social_media_enbed')->where('uid',$request->id)->first();
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
            'linkedin'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'youtube'=>'required'
        ]);
        if($validator->fails())
        {
            $notification =([
                'status'=>201,
                'message'=> $validator->errors()
            ]);
        }
        else{
            $result=DB::table('social_media_enbed')->where('uid',$request->id)->update([
                    'linkedin' => $request->linkedin,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'youtube' => isset($request->youtube)?$request->youtube:'0',
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
            $notification = ([
                'status'=>201,
                'message'=>'some error accoured.'
            ]);
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
        $data=DB::table('social_media_enbed as m')->where('uid',$id)->first();
        if($data)
        {
            DB::table('social_media_enbed as m')->where('uid',$id)->update(['soft_delete'=>1]);
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
