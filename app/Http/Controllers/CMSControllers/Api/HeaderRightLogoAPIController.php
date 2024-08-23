<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Validator, DB;
use Carbon\Carbon;

class HeaderRightLogoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('header_right_logo as m')
                                    ->where('m.soft_delete','0')
                                    ->get();
        $totalRecords = DB::table('header_right_logo as m')
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
        // $exitValue = DB::table('header_right_logo as m')->where([['logo_title', $request->logo_title],['soft_delete',0]])->count() > 0;
        // // $max_size = $document->getMaxFileSize() / 1024 / 1024;
        //  if($exitValue == 'false'){
        //      $notification =[
        //          'status'=>201,
        //          'message'=>'This is duplicate value.'
        //      ];
        //  }else{
            try{
                $result =false;
                if(!empty($request->kt_hedaerrightlogo_add_multiple_options)){
                    foreach($request->kt_hedaerrightlogo_add_multiple_options as $key=>$value)
                    {
                        if(!empty($value['image'])){
                            
                            //$size = $this->getFileSize($value['image']->getSize());
                           // $extension = $value['image']->getClientOriginalExtension();
                            $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                            $value['image']->move(resource_path().'/uploads/HeaderRightLogo', $name);
                            $imgData[] = $name;
                        
                        $result= DB::table('header_right_logo')->insert([
                            'uid' => Uuid::uuid4(),
                            'logo_title' => $value['imgtitle'],
                            'web_link'=> $value['url']??'',
                            'sort_order' => $value['sortorder']??'',
                            'tab_type' => $value['tabtype']??'',
                            'logo_path' => $name,
                          //  'archivel_date' => Carbon::createFromFormat('Y-m-d',$value['enddate'])->addDays(env('TENDER_ARCHIVEL')),
                            ]);
                        }else{
                            $notification =[
                                'status'=>201,
                                'message'=>'This is duplicate value.'
                            ];
                        }
                    }
                }
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
                            'message'=>'some error accoured or Field Require'
                        ];
                    } 
                
            }catch(Throwable $e){report($e);
                return false;
            }
        //}
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
        $data=DB::table('header_right_logo')->where('uid',$id)->first();
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
        try{
            $validator=Validator::make($request->all(),
                [
                'tabtype'=>'required',
                'imgtitle'=>'required',
                //'image' => "required|mimes:jpeg,bmp,png,gif,svg|max:10000"
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                if($request->hasFile('image')){    
                    $size = $this->getFileSize($request->file('image')->getSize());
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $file=$request->file('image');
                    $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                    $path=resource_path('uploads/banner');
                    $file->move($path,$newname);
                }else{
                    $newnames = DB::table('header_right_logo')->where('uid',$request->id)->first();
                    $newname = $newnames->logo_path;
                }
                $result= DB::table('header_right_logo')->where('uid',$request->id)->update([
                    'logo_title' => $request->imgtitle,
                    'web_link'=> $request->url??'',
                    'sort_order' => $request->sortorder??'',
                    'tab_type' => $request->tabtype??'',
                    'logo_path' => $newname,
                    'status' => 1,
                    // 'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('TENDER_ARCHIVEL')),
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
     */
    public function destroy($id)
    {
        $data=DB::table('header_right_logo as m')->where('uid',$id)->first();
        if($data)
        {
            DB::table('header_right_logo as m')->where('uid',$id)->update(['soft_delete'=>1]);
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
