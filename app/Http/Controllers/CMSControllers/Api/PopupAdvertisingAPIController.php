<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\PopupAdvertising;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\PdfImageSizeTrait;
use DB, Validator;
use Carbon\Carbon;

class PopupAdvertisingAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=PopupAdvertising::where('soft_delete','0')->get();
        $totalRecords = PopupAdvertising::where('soft_delete','0')->count();
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
        $exitValue = PopupAdvertising::where([['title_name_en', $request->popupadvertising_title],['soft_delete',0]])->count() > 0;
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
                    'popupadvertising_title'=>'required',
                    //'linkedin'=>'required',
                    'popupadvertising_file' => "required|mimes:jpeg,jpg,bmp,png,gif,svg|max:10000"
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
                    if($request->hasFile('popupadvertising_file')){    
                        $size = $this->getFileSize($request->file('popupadvertising_file')->getSize());
                        $extension = $request->file('popupadvertising_file')->getClientOriginalExtension();
                        $file=$request->file('popupadvertising_file');
                        $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                        $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/popupadvertising');
                        $file->move($path,$newname);
                    }
                    $result= PopupAdvertising::insert([
                            'uid' => Uuid::uuid4(),
                            'title_name_en' => $request->popupadvertising_title,
                            'images' => $newname,
                            "pdfimage_size" => isset($size)?$size:'0',
                            "file_extension" => isset($extension)?$extension:'0',
                            'start_date' => $request->popupadvertising_from,
                            'end_date' => $request->popupadvertising_to,
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
     * @param  \App\Models\PopupAdvertising  $popupAdvertising
     * @return \Illuminate\Http\Response
     */
    public function show(PopupAdvertising $popupAdvertising)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PopupAdvertising  $popupAdvertising
     * @return \Illuminate\Http\Response
     */
    public function edit(PopupAdvertising $popupAdvertising)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PopupAdvertising  $popupAdvertising
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PopupAdvertising $popupAdvertising)
    {
        $data=PopupAdvertising::where('uid',$request->id)->first();
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
                'popupadvertising_title'=>'required',
                //'linkedin'=>'required',
        ]);
        if($validator->fails())
        {
            $notification =([
                'status'=>201,
                'message'=> $validator->errors()
            ]);
        }
        else{
            if($request->hasFile('popupadvertising_file')){    
                $size = $this->getFileSize($request->file('popupadvertising_file')->getSize());
                $extension = $request->file('popupadvertising_file')->getClientOriginalExtension();
                $file=$request->file('popupadvertising_file');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/popupadvertising');
                $file->move($path,$newname);
            }else{
                $olddata=PopupAdvertising::where('uid',$request->id)->first();
                $newname = $olddata->images;
                $size = $olddata->pdfimage_size;
                $extension = $olddata->file_extension;
            }
            $result= PopupAdvertising::where('uid',$request->id)->update([
                    'title_name_en' => $request->popupadvertising_title,
                    'images' => $newname,
                    "pdfimage_size" => isset($size)?$size:'0',
                    "file_extension" => isset($extension)?$extension:'0',
                    'start_date' => $request->popupadvertising_from,
                    'end_date' => $request->popupadvertising_to,
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
     *
     * @param  \App\Models\PopupAdvertising  $popupAdvertising
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=PopupAdvertising::where('uid',$id)->first();
        if($data)
        {
            PopupAdvertising::where('uid',$id)->update(['soft_delete'=>1]);
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
