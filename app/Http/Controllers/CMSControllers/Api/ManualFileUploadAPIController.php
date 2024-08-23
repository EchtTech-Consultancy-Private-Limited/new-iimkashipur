<?php

namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


use App\Models\CMSModels\ManualFileUpload;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\PdfImageSizeTrait;
use App\Http\Requests\ManualFileUpload\AddManualFileUploadValidation;
use App\Http\Requests\ManualFileUpload\EditManualFileUploadValidation;
use DB, Validator;
use Carbon\Carbon;

class ManualFileUploadAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=ManualFileUpload::where('soft_delete','0')->get();
        $totalRecords = ManualFileUpload::where('soft_delete','0')->count();
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
    public function store(AddManualFileUploadValidation $request)
    {
            try{
                if($request->hasFile('file_path')){    
                    $size = $this->getFileSize($request->file('file_path')->getSize());
                    $extension = $request->file('file_path')->getClientOriginalExtension();
                    $file=$request->file('file_path');
                    $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                    $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/uploadManualfile');
                    $file->move($path,$newname);
                }
                
                $result= ManualFileUpload::insert([
                        'uid' => Uuid::uuid4(),
                        'title_name' => $request->title_name,
                        'file_path' => $newname,
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
       }catch(Throwable $e){report($e);
        return false;
       }
        return response()->json($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManualFileUpload  $manualFileUpload
     * @return \Illuminate\Http\Response
     */
    public function show(ManualFileUpload $manualFileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManualFileUpload  $manualFileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(ManualFileUpload $manualFileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManualFileUpload  $manualFileUpload
     * @return \Illuminate\Http\Response
     */
    public function update(EditManualFileUploadValidation $request, ManualFileUpload $manualFileUpload)
    {
            try{
                if($request->hasFile('file_path')){    
                    $size = $this->getFileSize($request->file('file_path')->getSize());
                    $extension = $request->file('file_path')->getClientOriginalExtension();
                    $file=$request->file('file_path');
                    $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                    $path=resource_path('uploads/uploadManualfile');
                    $file->move($path,$newname);
                }else{
                    $newnames = ManualFileUpload::where('uid',$request->id)->first();
                    $newname = $newnames->file_path;
                }
                $result= ManualFileUpload::where('uid',$request->id)->update([
                        'title_name' => $request->title_name,
                        'file_path' => $newname,
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
           // }
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
        $data=ManualFileUpload::where('uid',$id)->first();
        if($data)
        {
            ManualFileUpload::where('uid',$id)->update(['soft_delete'=>'1']);
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
