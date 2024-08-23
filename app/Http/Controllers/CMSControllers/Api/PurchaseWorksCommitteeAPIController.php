<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\PurchaseWorksCommittee;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\PdfImageSizeTrait;
use DB, Validator;
use Carbon\Carbon;

class PurchaseWorksCommitteeAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=PurchaseWorksCommittee::where('soft_delete','0')->get();
        $totalRecords = PurchaseWorksCommittee::where('soft_delete','0')->count();
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
        
        $exitValue = PurchaseWorksCommittee::where([['order_contract_no', $request->order_contract_no],['soft_delete',0]])->count() > 0;
        // $max_size = $document->getMaxFileSize() / 1024 / 1024;
         if($exitValue == 'false'){
             DB::rollback();
             $notification =[
                 'status'=>201,
                 'message'=>'order contract no is duplicate value.'
             ];
         }else{
             try{
                 $validator=Validator::make($request->all(),
                     [
                     'title_name_en'=>'required|string',
                     'name_of_supplier_party_en'=>'required|string',
                     'order_contract_no'=>'required|string',
                     'startdate'=>'required',
                    //'related_document'=>'required|mimes:pdf|max:10000',
                     'amount' => 'required|numeric'
                 ]);
                 if($validator->fails())
                 {
                     $notification =[
                         'status'=>201,
                         'message'=> $validator->errors()
                     ];
                 }
                 else{
                    if($request->hasFile('related_document')){    
                        $size = $this->getFileSize($request->file('related_document')->getSize());
                        $extension = $request->file('related_document')->getClientOriginalExtension();
                        $file=$request->file('related_document');
                        $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                        $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/purchaseworkscommittee');
                        $file->move($path,$newname);
                    }
                     $result= PurchaseWorksCommittee::insert([
                             'uid' => Uuid::uuid4(),
                             'tab_type' => $request->tabtype,
                             'title_name_en' => $request->title_name_en,
                             'title_name_hi' => $request->title_name_hi,
                             'description_en' => $request->kt_description_en,
                             'description_hi' => $request->kt_description_hi,
                             'name_of_supplier_party_en' => $request->name_of_supplier_party_en,
                             'name_of_supplier_party_hi' => $request->name_of_supplier_party_hi,
                             'quality_supplied_en' => $request->quality_supplied_en,
                             'quality_supplied_hi' => $request->quality_supplied_hi,
                             'order_contract_no' =>$request->order_contract_no??'',
                             'amount' => $request->amount??'',
                             'public_url' => $newname??'',
                             'short_order' => $request->short_order,
                             'start_date' => $request->startdate,
                             'pdfimage_size' => $request->size??'',
                             'file_extension' => $request->extension??'',
                             'asset_type' => $request->type_id
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
     * @param  \App\Models\PurchaseWorksCommittee  $PurchaseWorksCommittee
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseWorksCommittee $PurchaseWorksCommittee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseWorksCommittee  $PurchaseWorksCommittee
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseWorksCommittee $PurchaseWorksCommittee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseWorksCommittee  $PurchaseWorksCommittee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseWorksCommittee $PurchaseWorksCommittee)
    {
        $data=PurchaseWorksCommittee::where('uid',$request->id)->first();
        if($data)
        {
         $validator=Validator::make($request->all(),
            [
                'title_name_en'=>'required|string',
                'name_of_supplier_party_en'=>'required|string',
                'order_contract_no'=>'required|string',
                'startdate'=>'required',
                //'related_document'=>'required|mimes:pdf|max:10000',
                'amount' => 'required|numeric'
        ]);
        if($validator->fails())
        {
            $notification =[
                'status'=>200,
                'message'=> $validator->errors()
            ];
        }
        else{
            if($request->hasFile('related_document')){    
                $size = $this->getFileSize($request->file('related_document')->getSize());
                $extension = $request->file('related_document')->getClientOriginalExtension();
                $file=$request->file('related_document');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/purchaseworkscommittee');
                $file->move($path,$newname);
            }else{
                $imag=PurchaseWorksCommittee::where('uid',$request->id)->first();
                $newname=$imag->public_url;
                $size=$imag->pdfimage_size;
                $extension=$imag->file_extension;
            }
            $result= PurchaseWorksCommittee::where('uid',$request->id)->update([
                        'tab_type' => $request->tabtype,
                        'title_name_en' => $request->title_name_en,
                        'title_name_hi' => $request->title_name_hi,
                        'description_en' => $request->kt_description_en,
                        'description_hi' => $request->kt_description_hi,
                        'name_of_supplier_party_en' => $request->name_of_supplier_party_en,
                        'name_of_supplier_party_hi' => $request->name_of_supplier_party_hi,
                        'quality_supplied_en' => $request->quality_supplied_en,
                        'quality_supplied_hi' => $request->quality_supplied_hi,
                        'order_contract_no' =>$request->order_contract_no??'',
                        'amount' => $request->amount??'',
                        'public_url' => $newname,
                        'short_order' => $request->short_order,
                        'start_date' => $request->startdate,
                        'pdfimage_size' => $request->size,
                        'file_extension' => $request->extension,
                        'asset_type' => $request->type_id,
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
     * @param  \App\Models\PurchaseWorksCommittee  $PurchaseWorksCommittee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=PurchaseWorksCommittee::where('uid',$id)->first();
        if($data)
        {
            PurchaseWorksCommittee::where('uid',$id)->update(['soft_delete'=>'1']);
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
