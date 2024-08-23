<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\RtiAssets;
use Illuminate\Http\Request;
use App\Http\Requests\RTIAssets\AddRTIAssetsValidation;
use App\Http\Requests\RTIAssets\EditRTIAssetsValidation;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\PdfImageSizeTrait;
use DB, Validator;
use Carbon\Carbon;

class RtiAssetsAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=RtiAssets::where('soft_delete','0')->get();
        $totalRecords = RtiAssets::where('soft_delete','0')->count();
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
    public function store(AddRTIAssetsValidation $request)
    {
       
            try{
                $extId =  Uuid::uuid4();
                $lastInsertID= RtiAssets::insertGetId([
                        'uid' => $extId,
                        'tab_type' => $request->tabtype,
                        'title_name_en' => $request->title_name_en,
                        'title_name_hi' => $request->title_name_hi,
                        'description_en' => $request->kt_description_en,
                        'description_hi' => $request->kt_description_hi,
                        
                    ]);
                if(!empty($request->kt_rti_add_multiple_options)){
                    foreach($request->kt_rti_add_multiple_options as $key=>$value)
                        {
                            if(!empty($value['pdfname'])){
                            $size = $this->getFileSize($value['pdfname']->getSize());
                            $extension = $value['pdfname']->getClientOriginalExtension();
                            $name = time().rand(10,99).'.'.$value['pdfname']->getClientOriginalExtension();
                            $value['pdfname']->move(resource_path().'/uploads/rti', $name);
                            
                        $result= DB::table('rti_assets_details')->insert([
                                'uid' => Uuid::uuid4(),
                                'rti_assets_id' => $extId,
                                'title' => $value['pdftitle'],
                                'start_date'=> $value['startdate'],
                                'end_date' => $value['enddate'],
                                'pdfimage_file' => $name,
                                'pdfimage_size' => $size,
                                'file_extension' => $extension??'',
                                'public_url' => $name,
                                'private_url' => $name,
                                'archivel_date' => Carbon::createFromFormat('Y-m-d',$value['enddate'])->addDays(env('RTI_ARCHIVEL')),
                            ]);
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
     * @param  \App\Models\RtiAssets  $rtiAssets
     * @return \Illuminate\Http\Response
     */
    public function show(RtiAssets $rtiAssets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RtiAssets  $rtiAssets
     * @return \Illuminate\Http\Response
     */
    public function edit(RtiAssets $rtiAssets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RtiAssets  $rtiAssets
     * @return \Illuminate\Http\Response
     */
    public function update(EditRTIAssetsValidation $request, RtiAssets $rtiAssets)
    {
            try{
                $result=RtiAssets::where('uid',$request->id)->update([
               // $lastInsertID= TenderManagement::insertGetId([
                        'tab_type' => $request->tabtype,
                        'title_name_en' => $request->title_name_en,
                        'title_name_hi' => $request->title_name_hi,
                        'description_en' => $request->kt_description_en,
                        'description_hi' => $request->kt_description_hi,
                        'status' => 1,
                    ]);

                if(!empty($request->kt_tender_add_multiple_options)){
                foreach($request->kt_tender_add_multiple_options as $key=>$value)
                {
                if(!empty($value['uid'])){
                    $uid=DB::table('rti_assets_details')->where('uid',$value['uid'])->first();
                    if(!empty($value['uid']) && !empty($value['image'])){
                        $size = $this->getFileSize($value['pdfname']->getSize());
                        $extension = $value['pdfname']->getClientOriginalExtension();
                        $name = time().rand(10,99).'.'.$value['pdfname']->getClientOriginalExtension();
                        $value['pdfname']->move(resource_path().'/uploads/rti', $name);

                        $result= DB::table('rti_assets_details')->where('uid',$value['uid'])->update([
                            'pdf_title' => $value['pdftitle'],
                            'start_date'=> $value['startdate'],
                            'end_date' => $value['enddate'],
                            'public_url' => isset($name)?$name:$uid->public_url,
                            'private_url' => isset($name)?$name:$uid->public_url,
                            'pdfimage_size' => isset($size)?$size:$uid->pdfimage_size,
                            'file_extension' => isset($extension)?$extension:$uid->file_extension,
                            'archivel_date' => Carbon::createFromFormat('Y-m-d',$value['enddate'])->addDays(env('RTI_ARCHIVEL')),
                        ]);
                    }   
                    $result= DB::table('rti_assets_details')->where('uid',$value['uid'])->update([
                            'pdf_title' => $value['pdftitle'],
                            'start_date'=> $value['startdate'],
                            'end_date' => $value['enddate'],
                            // 'public_url' => isset($name)?$name:$uid->public_url,
                            // 'private_url' => isset($name)?$name:$uid->public_url,
                            // 'pdfimage_size' => isset($size)?$size:$uid->pdfimage_size,
                            // 'file_extension' => isset($extension)?$extension:$uid->file_extension,
                            'archivel_date' => Carbon::createFromFormat('Y-m-d',$value['enddate'])->addDays(env('RTI_ARCHIVEL')),
                        ]);
                    }else{
                        if(!empty($value['pdfname'])){
                            $size = $this->getFileSize($value['pdfname']->getSize());
                            $extension = $value['pdfname']->getClientOriginalExtension();
                            $name = time().rand(10,99).'.'.$value['pdfname']->getClientOriginalExtension();
                            $value['pdfname']->move(resource_path().'/uploads/rti', $name);
                            
                        $result= DB::table('rti_assets_details')->insert([
                                'uid' => Uuid::uuid4(),
                                'tender_id' => $request->id,
                                'pdf_title' => $value['pdftitle'],
                                'start_date'=> $value['startdate'],
                                'end_date' => $value['enddate'],
                                'pdfimage_size' => $size,
                                'file_extension' => $extension??'',
                                'public_url' => $name,
                                'private_url' => $name,
                                'archivel_date' => Carbon::createFromFormat('Y-m-d',$value['enddate'])->addDays(env('TENDER_ARCHIVEL')),
                            ]);
                        }
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
                        'message'=>'some error accoured.'
                    ];
                 } 
           }catch(Throwable $e){report($e);
            return false;
           }
            return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RtiAssets  $rtiAssets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=RtiAssets::where('uid',$id)->first();
        if($data)
        {
            RtiAssets::where('uid',$id)->update(['soft_delete'=>1]);
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
    public function deletePDFIMG(Request $request)
    {
        //dd($request->id);
        $data=DB::table('rti_assets_details')->where('uid',$request->id)->first();
        //dd($data);
        if($data !='null')
        {
            DB::table('rti_assets_details')->where('uid',$request->id)->update(['soft_delete'=>1]);
            return response()->json([
                'status'=>200,
                'message'=>'deleted successfully.'
            ],200);
        }
        else{
            abort(404);
        }
    }
}
