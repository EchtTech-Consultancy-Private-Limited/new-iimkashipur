<?php

namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Traits\PdfImageSizeTrait;
use Ramsey\Uuid\Uuid;
use Validator, DB;
use Carbon\Carbon;

class TenderTypeAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= DB::table('tender_type')->where('soft_delete','0')->get();
        $totalRecords = DB::table('tender_type')->where('soft_delete','0')->count();
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
        $exitValue = DB::table('tender_type')->where([['type_name_en', $request->name_en],['soft_delete',0]])->count() > 0;
        if($exitValue == 'false'){
            $notification =[
                'status'=>201,
                'message'=>'This is duplicate value.'
            ];
        }else{
        //dd($request->file('image'));
        try{
            
            $validator=Validator::make($request->all(),
                [

                'name_en' => 'required',
                'name_hi'=>'required',
                'sort_order'=>'required',
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                $patterns = array('/\s+/','/&/', '/;/', '/#/','/</','/>/','/\"/','/\(/','/\)/','/{/','/}/','/\`/','/\[/','/\]/','/\=/','/\//','/:/');
                $result= DB::table('tender_type')->insert([
                        'uid' => Uuid::uuid4(),
                        'type_name_en' => $request->name_en,
                        'type_name_hi' => $request->name_hi,
                        'type_slug' =>trim(preg_replace($patterns, '-', isset($request->name_en)?strtolower($request->name_en):'0'),'-'),
                        'sort_order' => $request->sort_order,
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
    }
        return response()->json($notification);
    }
  
      
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('tender_type')->where('uid',$id)->first();
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $validator=Validator::make($request->all(),
                [

                'name_en' => 'required',
                'name_hi'=>'required',
                'sort_order'=>'required',
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                $patterns = array('/\s+/','/&/', '/;/', '/#/','/</','/>/','/\"/','/\(/','/\)/','/{/','/}/','/\`/','/\[/','/\]/','/\=/','/\//','/:/');
                $result= DB::table('tender_type')->where('uid',$request->id)->update([
                    'type_name_en' => $request->name_en,
                    'type_name_hi' => $request->name_hi,
                    'type_slug' =>trim(preg_replace($patterns, '-', isset($request->name_en)?strtolower($request->name_en):'0'),'-'),
                    'sort_order' => $request->sort_order,
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
    //}
        return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=DB::table('tender_type')->where('uid',$id)->first();
        if($data)
        {
            DB::table('tender_type')->where('uid',$id)->update(['soft_delete'=>'1']);
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
