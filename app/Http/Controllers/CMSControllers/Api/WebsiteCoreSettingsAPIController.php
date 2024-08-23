<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\CMSModels\WebsiteCoreSettings;
use App\Models\CMSModels\FooterManagement;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use DB,Validator;
use Carbon\Carbon;

class WebsiteCoreSettingsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexLogo()
    {
        
        $data=WebsiteCoreSettings::where('soft_delete','0')->get();
        $totalRecords = WebsiteCoreSettings::where('soft_delete','0')->count();
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
    public function indexFooterContent()
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

    public function indexSocialLink()
    {
        
        $data=DB::table('social_links')->where('soft_delete','0')->get();
        $totalRecords = DB::table('social_links')->where('soft_delete','0')->count();
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
    public function indexSocialMediaCards()
    {
        
        $data=DB::table('social_media_enbed')->where('soft_delete','0')->get();
        $totalRecords = DB::table('social_media_enbed')->where('soft_delete','0')->count();
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
    public function indexHeaderRightLogo()
    {
        
        $data=DB::table('header_right_logo')->where('soft_delete','0')->get();
        $totalRecords = DB::table('header_right_logo')->where('soft_delete','0')->count();
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
         //dd($request->logo_title);
        $exitValue = WebsiteCoreSettings::where([['logo_title',$request->logo_title],['soft_delete',0]])->count() > 0;
        if($exitValue == 'false'){
            $notification =[
                'status'=>201,
                'message'=>'This is duplicate value.'
            ];
        }else{
            try{
                $validator=Validator::make($request->all(),
                    [
                    //'logo_title'=>'required|unique:website_core_settings',
                    'logo_title'=>'required',
                    'header_logo' => "required|mimes:jpeg,bmp,png,gif,svg|max:10000"
                    //'position_check'=>'required',
                // 'footer_check'=>'required'
                ]);
                if($validator->fails())
                {
                    $notification =[
                        'status'=>201,
                        'message'=> $validator->errors()
                    ];
                }
                else{
                    if($request->hasFile('header_logo')){    
                        $file=$request->file('header_logo');
                        $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                        $path=resource_path('uploads/WebsiteCoreSettings');
                        $file->move($path,$newname);
                    }
                    $result= WebsiteCoreSettings::insert([
                            'uid' => Uuid::uuid4(),
                            'logo_title' => $request->logo_title,
                            'header_logo' => $newname,
                            'footer_logo' => $newname,
                            'position_check' => isset($request->position_check)?$request->position_check:'0',
                            'footer_check' => isset($request->footer_check)?$request->footer_check:'0',
                        ]);
                    
                if($result == true)
                {
                    $notification =[
                        'status'=>200,
                        'message'=>'New Logo Added successfully.'
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
    public function storeFooterContent(Request $request)
    {
        
        }
    /**
     * Display the specified resource.
     */
    public function show(WebsiteCoreSettings $websiteCoreSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=WebsiteCoreSettings::where('uid',$id)->first();
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
    public function headerLogoUpdate(Request $request)
    {
        $data=WebsiteCoreSettings::where('uid',$request->id);
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
            'logo_title'=>'required',
            'header_logo'=>"required|mimes:jpeg,bmp,png,gif,svg|max:10000",
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
                $path=resource_path('uploads/WebsiteCoreSettings');
                $file->move($path,$newname);
            }else{
                $newname = WebsiteCoreSettings::where('uid',$request->id)->first()->header_logo;
            }
            $result= WebsiteCoreSettings::where('uid',$request->id)->update([
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
        $data=WebsiteCoreSettings::where('uid',$id)->first();
        if($data)
        {
         WebsiteCoreSettings::where('uid',$id)->update(['soft_delete'=>'1']);
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