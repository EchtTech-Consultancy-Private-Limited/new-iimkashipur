<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\NewsManagement;
use Illuminate\Http\Request;
use App\Http\Requests\News\AddNewsValidation;
use App\Http\Requests\News\EditNewsValidation;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\PdfImageSizeTrait;
use DB,Validator;
use Carbon\Carbon;

class NewsManagementAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=NewsManagement::where('soft_delete','0')->get();
        $totalRecords = NewsManagement::where('soft_delete','0')->count();
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
    public function store(AddNewsValidation $request)
    {
            try{
                $extId =  Uuid::uuid4();
                $result= NewsManagement::insert([
                        'uid' => $extId,
                        'tab_type' => $request->tab_type,
                        'title_name_en' => $request->title_name_en,
                        'title_name_hi' => $request->title_name_hi,
                        'description_en' => $request->kt_description_en,
                        'description_hi' => $request->kt_description_hi,
                        'public_url' => $request->url,
                        'start_date'=> $request->startdate,
                        'end_date' => $request->enddate,
                        'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('NEWS_ARCHIVEL')),
                    ]);
                if(!empty($request->kt_news_add_multiple_options)){
                    foreach($request->kt_news_add_multiple_options as $key=>$value)
                    {
                        if(!empty($value['image'])){
                            $size = $this->getFileSize($value['image']->getSize());
                            $extension = $value['image']->getClientOriginalExtension();
                            $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                            $value['image']->move(resource_path().'/uploads/NewsManagement', $name);
                            $imgData[] = $name;
                        
                        $result= DB::table('news_details')->insert([
                            'uid' => Uuid::uuid4(),
                            'news_id' => $extId,
                            'title' => $value['imagetitle'],
                            'start_date'=> $value['startdate']??'',
                            'end_date' => $value['enddate']??'',
                            'pdfimage_size' => $size??'',
                            'file_extension' => $extension??'',
                            'public_url' => $name,
                            'private_url' => $name,
                            'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('NEWS_ARCHIVEL')),
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
     */
    public function show(NewsManagement $newsManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=NewsManagement::where('uid',$id)->first();
        if($data->soft_delete==0)
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
    public function update(EditNewsValidation $request)
    {
            try{
                $result= NewsManagement::where('uid',$request->id)->update([
                        'tab_type' => $request->tabtype,
                        'title_name_en' => $request->title_name_en,
                        'title_name_hi' => $request->title_name_hi,
                        'description_en' => $request->kt_description_en,
                        'description_hi' => $request->kt_description_hi,
                        'public_url' => $request->url,
                        'start_date'=> $request->startdate,
                        'end_date' => $request->enddate,
                        'status' => 1,
                        'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('TENDER_ARCHIVEL')),
                    ]);
            if(!empty($request->kt_news_edit_multiple_options)){
                foreach($request->kt_news_edit_multiple_options as $key=>$value)
                {   
                    //dd($value['image']);
                    if(!empty($value['uid'])){
                        $uid=DB::table('news_details')->where('uid',$value['uid'])->first();
                        if(!empty($value['uid']) && !empty($value['image'])){
                            $size = $this->getFileSize($value['image']->getSize());
                            $extension = $value['image']->getClientOriginalExtension();
                            $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                            $value['image']->move(resource_path().'/uploads/NewsManagement', $name);

                        
                        $result= DB::table('news_details')->where('uid',$value['uid'])->update([
                            'title' => $value['imagetitle'],
                            'start_date'=> $value['startdate']??'',
                            'end_date' => $value['enddate']??'',
                            'public_url' => isset($name)?$name:$uid->public_url,
                            'private_url' => isset($name)?$name:$uid->public_url,
                            'pdfimage_size' => isset($size)?$size:$uid->pdfimage_size,
                            'file_extension' => isset($extension)?$extension:$uid->file_extension,
                            'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('TENDER_ARCHIVEL')),
                        ]);
                        }
                        $result= DB::table('news_details')->where('uid',$value['uid'])->update([
                            'title' => $value['imagetitle'],
                            'start_date'=> $value['startdate']??'',
                            'end_date' => $value['enddate']??'',
                            // 'public_url' => isset($name)?$name:$uid->public_url,
                            // 'private_url' => isset($name)?$name:$uid->public_url,
                            // 'pdfimage_size' => isset($size)?$size:$uid->pdfimage_size,
                            // 'file_extension' => isset($extension)?$extension:$uid->file_extension,
                            'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('TENDER_ARCHIVEL')),
                        ]);
                    }else{
                        if(!empty($value['image'])){
                            $size = $this->getFileSize($value['image']->getSize());
                            $extension = $value['image']->getClientOriginalExtension();
                            $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                            $value['image']->move(resource_path().'/uploads/NewsManagement', $name);
                            $imgData[] =  $name;
                        
                        $result= DB::table('news_details')->insert([
                            'uid' => Uuid::uuid4(),
                            'news_id' => $request->id,
                            'title' => $value['imagetitle'],
                            'start_date'=> $value['startdate']??'',
                            'end_date' => $value['enddate']??'',
                            'pdfimage_size' => $size??'',
                            'file_extension' => $extension??'',
                            'public_url' => $name,
                            'private_url' => $name,
                            'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('TENDER_ARCHIVEL')),
                        ]);
                     }}
            }}
                
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
     */
    public function destroy($id)
    {
        $data=NewsManagement::where('uid',$id)->first();
        if($data)
        {
         NewsManagement::where('uid',$id)->update(['soft_delete'=>1]);
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
        $data=DB::table('news_details')->where('uid',$request->id)->first();
        //dd($data);
        if($data !='null')
        {
            DB::table('news_details')->where('uid',$request->id)->update(['soft_delete'=>1]);
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
