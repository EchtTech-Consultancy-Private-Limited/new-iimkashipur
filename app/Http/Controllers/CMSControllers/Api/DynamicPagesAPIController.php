<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Http\Requests\Faq\AddFAQValidation;
use App\Http\Requests\Faq\EditFAQValidation;
use Ramsey\Uuid\Uuid;
use DB, Validator;
use Carbon\Carbon;

class DynamicPagesAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=EventsManagement::where('soft_delete','0')->get();
        $totalRecords = EventsManagement::where('soft_delete','0')->count();
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
    public function faqIndex()
    {
        //dd('Hi');
        $data=DB::table('faq')->where('soft_delete','0')->get();
        $totalRecords = DB::table('faq')->where('soft_delete','0')->count();
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
    public function faqStore(AddFAQValidation $request)
    {
            try{
                $result= DB::table('faq')->insert([
                        'uid' => Uuid::uuid4(),
                        'question_en' => $request->question_en,
                        'question_hi' => $request->question_hi,
                        'answer_en' => $request->kt_description_en,
                        'answer_hi' => $request->kt_description_hi,
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
    public function faqUpdate(EditFAQValidation $request)
    {
        try{
            $result= DB::table('faq')->where('uid',$request->id)->update([
                    'question_en' => $request->question_en,
                    'question_hi' => $request->question_hi,
                    'answer_en' => $request->kt_description_en,
                    'answer_hi' => $request->kt_description_hi,
                    'status' => 0,
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

    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(EventsManagement $eventsManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function faqDestroy($id)
    {
        $data=DB::table('faq')->where('uid',$id)->first();
        if($data)
        {
            DB::table('faq')->where('uid',$id)->update(['soft_delete'=>1]);
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
