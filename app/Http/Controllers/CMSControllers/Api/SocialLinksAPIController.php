<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\CMSModels\SocialLink;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Validator;
use Carbon\Carbon;

class SocialLinksAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=SocialLink::where('soft_delete','0')->get();
        $totalRecords = SocialLink::where('soft_delete','0')->count();
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
        $exitValue = SocialLink::where([['google_link', $request->google_link],['soft_delete',0]])->count() > 0;
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
                    'google_link'=>'required|unique:social_links',
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
                    $result= SocialLink::insert([
                            'uid' => Uuid::uuid4(),
                            'google_link' => $request->google_link,
                            'linkedin' => $request->linkedin,
                            'facebook' => $request->facebook,
                            'twitter' => isset($request->twitter)?$request->twitter:'0',
                            'instagram' => isset($request->instagram)?$request->instagram:'0',
                            'github' => isset($request->github)?$request->github:'0',
                            'youtube' => isset($request->youtube)?$request->youtube:'0',
                            'whatsapp' => isset($request->whatsapp)?$request->whatsapp:'0',
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
        $data=SocialLink::where('uid',$id)->first();
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
        $data=SocialLink::where('uid',$request->id)->first();
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
            $result= SocialLink::where('uid',$request->id)->update([
                    'google_link' => $request->google_link,
                    'linkedin' => $request->linkedin,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'github' => $request->github,
                    'youtube' => isset($request->youtube)?$request->youtube:'0',
                    'whatsapp' => isset($request->whatsapp)?$request->whatsapp:'0',
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
        $data=SocialLink::where('uid',$id)->first();
        if($data)
        {
            SocialLink::where('uid',$id)->update(['soft_delete'=>1]);
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
