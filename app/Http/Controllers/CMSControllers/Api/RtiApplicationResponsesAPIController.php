<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\RtiApplicationResponses;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use DB, Validator;
use App\Http\Traits\PdfImageSizeTrait;
use Carbon\Carbon;

class RtiApplicationResponsesAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=RtiApplicationResponses::where('soft_delete','0')->get();
        $totalRecords = RtiApplicationResponses::where('soft_delete','0')->count();
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
        
        $exitValue = RtiApplicationResponses::where([['registration_number', $request->registration_number],['soft_delete',0]])->count() > 0;
        // $max_size = $document->getMaxFileSize() / 1024 / 1024;
         if($exitValue == 'false'){
             DB::rollback();
             $notification =[
                 'status'=>201,
                 'message'=>'registration number is duplicate value.'
             ];
         }else{
             try{
                 $validator=Validator::make($request->all(),
                     [
                     'registration_number'=>'required|max:50',
                     'request_name_en'=>'required|string',
                     'request_name_hi'=>'required|string',
                     'pio_name_en'=>'required|string',
                     'pio_name_hi'=>'required|',
                     'request_document'=>'required|mimes:pdf|max:10000',
                     'reply_document'=>'required|mimes:pdf|max:10000',
                 ]);
                 if($validator->fails())
                 {
                     $notification =[
                         'status'=>201,
                         'message'=> $validator->errors()
                     ];
                 }
                 else{
                    if($request->hasFile('request_document')){    
                        $size1 = $this->getFileSize($request->file('request_document')->getSize());
                        $extension1 = $request->file('request_document')->getClientOriginalExtension();
                        $file=$request->file('request_document');
                        $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                        $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/RtiApplicationResponses');
                        $file->move($path,$newname);
                    }
                    if($request->hasFile('reply_document')){    
                        $size2 = $this->getFileSize($request->file('reply_document')->getSize());
                        $extension2 = $request->file('reply_document')->getClientOriginalExtension();
                        $file=$request->file('reply_document');
                        $newname2=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                        $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/RtiApplicationResponses');
                        $file->move($path,$newname2);
                    }
                     $result= RtiApplicationResponses::insert([
                             'uid' => Uuid::uuid4(),
                             'tab_type' => $request->tabtype,
                             'registration_number' => $request->registration_number,
                             'request_name_en' => $request->request_name_en,
                             'request_name_hi' => $request->request_name_hi,
                             'pio_name_en' => $request->pio_name_en,
                             'pio_name_hi' => $request->pio_name_hi,
                             'start_date'=> $request->startdate,
                             'short_order' => $request->short_order,
                             'request_document' => $newname,
                             'reply_document' => $newname2,
                             'request_doc_pdfimage_size' => $size1,
                             'request_doc_file_extension' => $extension1,
                             'reply_doc_pdfimage_size' => $size2,
                             'reply_doc_file_extension' => $extension2,
                         ]);
                     
                 if($result == true)
                 {
                     $notification =[
                         'status'=>200,
                         'message'=>'Added successfully.'
                     ];
                 }
                 else{
                    // DB::rollback();
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
     *
     * @param  \App\Models\RtiApplicationResponses  $RtiApplicationResponses
     * @return \Illuminate\Http\Response
     */
    public function show(RtiApplicationResponses $RtiApplicationResponses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RtiApplicationResponses  $RtiApplicationResponses
     * @return \Illuminate\Http\Response
     */
    public function edit(RtiApplicationResponses $RtiApplicationResponses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RtiApplicationResponses  $RtiApplicationResponses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RtiApplicationResponses $RtiApplicationResponses)
    {
        $data=RtiApplicationResponses::where('uid',$request->id)->first();
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
                'registration_number'=>'required|max:50',
                'request_name_en'=>'required|string',
                'request_name_hi'=>'required|string',
                'pio_name_en'=>'required|string',
                'pio_name_hi'=>'required|',
                //'request_document'=>'required|mimes:pdf|max:10000',
                //'reply_document'=>'required|mimes:pdf|max:10000',
        ]);
        if($validator->fails())
        {
            $notification =[
                'status'=>200,
                'message'=> $validator->errors()
            ];
        }
        else{
            if($request->hasFile('request_document') !=false){    
                $size1 = $this->getFileSize($request->file('request_document')->getSize());
                $extension1 = $request->file('request_document')->getClientOriginalExtension();
                $file=$request->file('request_document');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/RtiApplicationResponses');
                $file->move($path,$newname);
            }else{
                $imag=RtiApplicationResponses::where('uid',$request->id)->first();
                $newname=$imag->request_document;
                $size1=$imag->request_doc_pdfimage_size;
                $extension1=$imag->request_doc_file_extension;
            }
            if($request->hasFile('reply_document') !=false){    
                $size2 = $this->getFileSize($request->file('reply_document')->getSize());
                $extension2 = $request->file('reply_document')->getClientOriginalExtension();
                $file=$request->file('reply_document');
                $newname2=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/RtiApplicationResponses');
                $file->move($path,$newname2);
            }else{
                $imag=RtiApplicationResponses::where('uid',$request->id)->first();
                $newname2=$imag->reply_document;
                $size2=$imag->reply_doc_pdfimage_size;
                $extension2=$imag->reply_doc_file_extension;
            }
            $result= RtiApplicationResponses::where('uid',$request->id)->update([
                        'tab_type' => $request->tabtype,
                        'registration_number' => $request->registration_number,
                        'request_name_en' => $request->request_name_en,
                        'request_name_hi' => $request->request_name_hi,
                        'pio_name_en' => $request->pio_name_en,
                        'pio_name_hi' => $request->pio_name_hi,
                        'start_date'=> $request->startdate,
                        'short_order' => $request->short_order,
                        'request_document' => $newname,
                        'reply_document' => $newname2,
                        'request_doc_pdfimage_size' => $size1,
                        'request_doc_file_extension' => $extension1,
                        'reply_doc_pdfimage_size' => $size2,
                        'reply_doc_file_extension' => $extension2,
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
     *
     * @param  \App\Models\RtiApplicationResponses  $RtiApplicationResponses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=RtiApplicationResponses::where('uid',$id)->first();
        if($data)
        {
            RtiApplicationResponses::where('uid',$id)->update(['soft_delete'=>'1']);
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
