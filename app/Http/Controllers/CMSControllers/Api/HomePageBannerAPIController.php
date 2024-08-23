<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\HomePageBannerManagement;
use Illuminate\Http\Request;
use App\Http\Traits\PdfImageSizeTrait;
use App\Http\Requests\HomePageBanner\AddHomePageBannerValidation;
use Ramsey\Uuid\Uuid;
use Validator;
use Carbon\Carbon;

class HomePageBannerAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=HomePageBannerManagement::where('soft_delete','0')->get();
        $totalRecords = HomePageBannerManagement::where('soft_delete','0')->count();
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
    public function store(AddHomePageBannerValidation $request)
    {
        try{
                if($request->hasFile('image')){    
                    $size = $this->getFileSize($request->file('image')->getSize());
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $file=$request->file('image');
                    $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                    $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/banner');
                    $file->move($path,$newname);
                }
                
                $result= HomePageBannerManagement::insert([
                        'uid' => Uuid::uuid4(),
                        'tab_type' => $request->tabtype,
                        'title_name_en' => $request->title_name_en,
                        'title_name_hi' => $request->title_name_hi,
                        'description_en' => $request->kt_description_en,
                        'description_hi' => $request->kt_description_hi,
                        'banner_title' => $request->bannertitle,
                        'sort_order' => $request->sort_order,
                        "banner_collection" => json_encode([$request->bannertitle.','.$newname]),
                        "pdfimage_size" => isset($size)?$size:'0',
                        "file_extension" => isset($extension)?$extension:'0',
                        'start_date'=> $request->startdate,	
                        'end_date' => $request->enddate,
                        'public_url' => $newname,
                        'private_url' => $newname,
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
           // }
       }catch(Throwable $e){report($e);
        return false;
       }
        return response()->json($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(HomePageBannerManagement $homepagebannermanagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=HomePageBannerManagement::where('uid',$id)->first();
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
                'title_name_en'=>'required',
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
                    $newnames = HomePageBannerManagement::where('uid',$request->id)->first();
                    $newname = $newnames->public_url;
                }
                $result= HomePageBannerManagement::where('uid',$request->id)->update([
                        'tab_type' => $request->tabtype,
                        'title_name_en' => $request->title_name_en,
                        'title_name_hi' => $request->title_name_hi,
                        'description_en' => $request->kt_description_en,
                        'description_hi' => $request->kt_description_hi,
                        'banner_title' => $request->bannertitle,
                        'sort_order' => $request->sort_order,
                        "banner_collection" => json_encode([$request->bannertitle.','.$newname]),
                        "pdfimage_size" => isset($size)?$size:'0',
                        "file_extension" => isset($extension)?$extension:'0',
                        'start_date'=> $request->startdate,	
                        'end_date' => $request->enddate,
                        'public_url' => $newname,
                        'private_url' => $newname,
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
        $data=HomePageBannerManagement::where('uid',$id)->first();
        if($data)
        {
            HomePageBannerManagement::where('uid',$id)->update(['soft_delete'=>'1']);
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
