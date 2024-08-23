<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;
use App\Http\Requests\ImagesMimesCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Ramsey\Uuid\Uuid;
use Validator;
use DB;

class CommonAPIController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function imageMimeCheck(Request $request)
    {
        //dd($request->file('file'));
        try{
            $validator=Validator::make($request->all(),
                [
                'file' => "required|mimes:jpeg,bmp,png,gif,svg|max:10000"
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }else{
                $notification =[
                    'status'=>200,
                    'message'=>'Matches file extension.'
                ];
            }
            }catch(Throwable $e)
            {
                report($e);
                return false;
            }
        //dd($request->file);
        return response()->json($notification);
    }

    public function pdfMimeCheck(Request $request)
    {
        try{
            $validator=Validator::make($request->all(),
                [
                'file' => "required|mimes:pdf|max:10000"
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }else{
                $notification =[
                    'status'=>200,
                    'message'=>'Matches file extension.'
                ];
            }
            }catch(Throwable $e)
            {
                report($e);
                return false;
            }
        //dd($request->file);
        return response()->json($notification);
    }

    /**
     * Store analytics data.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
    }
    
}