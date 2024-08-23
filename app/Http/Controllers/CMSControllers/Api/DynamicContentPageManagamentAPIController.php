<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\DynamicContentPageManagament;
use App\Http\Requests\PageContent\AddBasicInformationValidation;
use App\Http\Requests\PageContent\EditBasicInformationValidation;
use App\Http\Requests\PageContent\AddPageContentValidation;
use App\Http\Requests\PageContent\EditPageContentValidation;
use Illuminate\Http\Request;
use App\Http\Requests\ImagesMimesCheck;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\PdfImageSizeTrait;
use DB, Validator;
use Carbon\Carbon;

class DynamicContentPageManagamentAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('dynamic_content_page_metatag')->where('soft_delete','0')->get();
        $totalRecords = DB::table('dynamic_content_page_metatag')->where('soft_delete','0')->count();
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

        //return view('dynamic-content-page-managament.content-page-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crudUrlTemplate['create-tender'] = route('tender-save');
        
        return view('dynamic-content-page-managament.content-page-add',
        ['crudUrlTemplate' => $crudUrlTemplate
    
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function basicInformation(AddBasicInformationValidation $request)
    {
        try{
            
            $result=DB::table('dynamic_content_page_metatag')->insert([
                        'uid' => Uuid::uuid4(),
                        'menu_uid' => explode(',',$request->menu_id)[0],
                        'menu_slug' => explode(',',$request->menu_id)[1],
                        'page_title_en' => $request->page_title_en,
                        'page_title_hi' => $request->page_title_hi,
                        'meta_title' => $request->meta_title,
                        'meta_tag' => $request->meta_tag,
                        'meta_tag_description' => $request->meta_description,
                        'meta_keywords' => $request->meta_keywords,
                        'sort_order' => $request->sort_order??'0',
                        'custom_slug' => $request->custom_url??'NULL',
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
           }catch(Throwable $e)
           {
            report($e);
            return false;
           }
            return response()->json($notification);
    }
    public function pageContent(AddPageContentValidation $request)
    {
        try{
            // if($request->kt_summernote_en !='<p><br></p>'){
            //     $notification = [
            //         'status'=>201,
            //         'message'=>'page content empty.'
            //     ];
            // }
            $result=DB::table('dynamic_page_content')->insert([
                        'uid' => Uuid::uuid4(),
                        'page_content_en' => $request->kt_summernote_en,
                        'page_content_hi' => $request->kt_summernote_hi,
                        'dcpm_id' => $request->pageTitle_id,
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
           }catch(Throwable $e)
           {
            report($e);
            return false;
           }
            return response()->json($notification);
    }
    public function pageGallery(Request $request)
    {
        // /ImagesMimesCheck

        try{
            $validator=Validator::make($request->all(),
                [
                'pageTitle_id1'=>'required',
               // 'imagetitle'=>'required',
                //'image'=> "required|mimes:jpeg,bmp,png,gif,svg|max:10000",
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
            if(!empty($request->kt_Pagegallery_add_multiple_options)){
                foreach($request->kt_Pagegallery_add_multiple_options as $key=>$value)
                    {
                    if(!empty($value['image'])){
                        $size = $this->getFileSize($value['image']->getSize());
                        $extension = $value['image']->getClientOriginalExtension();
                        $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                        $value['image']->move(resource_path().'/uploads/PageContentGallery', $name);
            
                    $result=DB::table('dynamic_content_page_gallery')->insert([
                            'uid' => Uuid::uuid4(),
                            'image_title' => $value['imagetitle'],
                            'start_date' => $value['startdate'],
                            'end_date' => $value['enddate'],
                            'public_url' => $name,
                            'private_url' => $name,
                            'pdfimage_size' => $size,
                            'file_extension' => $extension,
                            'dcpm_id' => $request->pageTitle_id1,
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
            }      
           }catch(Throwable $e)
           {
            report($e);
            return false;
           }
            return response()->json($notification);
    }
    public function pagePdf(Request $request)
    {
       if(isset($request->kt_tablehead_add_multiple_options[0]['tablehead']) && $request->kt_tablehead_add_multiple_options[0]['tablehead'] !=null){
            $jsonData = json_encode($request->kt_tablehead_add_multiple_options);
       }
        try{
            $validator=Validator::make($request->all(),
                [
                'pageTitle_id2'=>'required',
               // 'page_title_hi'=>'required',
               /// 'is_parent'=>'required'
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                
            foreach($request->kt_PagePdf_add_multiple_options as $key=>$value)
            {
                $size = $this->getFileSize($value['image']->getSize());
                $extension = $value['image']->getClientOriginalExtension();
                $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                $value['image']->move(resource_path().'/uploads/PageContentPdf', $name);
    
                $result=DB::table('dynamic_content_page_pdf')->insert([
                    'uid' => Uuid::uuid4(),
                    'pdf_title' => $value['pdftitle'],
                    'start_date' => $value['startdate'],
                    'end_date' => $value['enddate'],
                    'pdfimage_size' => $size,
                    'file_extension' => $extension,
                    'public_url' => $name,
                    'private_url' => $name,
                    'table_head'=>$jsonData??'0',
                    'dcpm_id' => $request->pageTitle_id2,
                ]);
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
            }      
           }catch(Throwable $e)
           {
            report($e);
            return false;
           }
            return response()->json($notification);
    }
    public function pageBanner(Request $request)
    {
        try{
            $validator=Validator::make($request->all(),
                [
                'pageTitle_id3'=>'required',
                'bannertitle'=>'required',
                'image' => "required|mimes:jpeg,bmp,png,gif,svg|max:10000"
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
                    $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/pagebanner');
                    $file->move($path,$newname);
                }
    
                $result=DB::table('dynamic_page_banner')->insert([
                    'uid' => Uuid::uuid4(),
                    'banner_title_en' => $request->bannertitle??'banner',
                    'banner_title_hi' => $request->bannertitle??'banner',
                    'public_url' => $newname,
                    'dcpm_id' => $request->pageTitle_id3,
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
           }catch(Throwable $e)
           {
            report($e);
            return false;
           }
            return response()->json($notification);
    }
    //***** Update Content Pages Data********************** */
    public function updateBasicInformation(EditBasicInformationValidation $request)
    {
        try{
            $result=DB::table('dynamic_content_page_metatag')->where('uid',$request->id)->update([
                        'menu_uid' => explode(',',$request->menu_id)[0],
                        'menu_slug' => explode(',',$request->menu_id)[1],
                        'page_title_en' => $request->page_title_en,
                        'page_title_hi' => $request->page_title_hi,
                        'meta_title' => $request->meta_title,
                        'meta_tag' => $request->meta_tag,
                        'meta_tag_description' => $request->meta_description,
                        'meta_keywords' => $request->meta_keywords,
                        'sort_order' => $request->sort_order??'0',
                        'custom_slug' => $request->custom_url??'NULL',
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
           }catch(Throwable $e)
           {
            report($e);
            return false;
           }
            return response()->json($notification);
    }
    public function updatePageContent(EditPageContentValidation $request)
    {
        try{
            $result=DB::table('dynamic_page_content')->where('dcpm_id',$request->id)->update([
                        'page_content_en' => $request->kt_summernote_en,
                        'page_content_hi' => $request->kt_summernote_hi,
                        'dcpm_id' => $request->pageTitle_id,
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
           }catch(Throwable $e)
           {
            report($e);
            return false;
           }
            return response()->json($notification);
    }
    public function updatePageGallery(Request $request)
    {
        try{
            $validator=Validator::make($request->all(),
                [
                'pageTitle_id1'=>'required',
               // 'page_title_hi'=>'required',
               /// 'is_parent'=>'required'
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                
            foreach($request->kt_Pagegallery_add_multiple_options as $key=>$value)
            {
                if(!empty($value['uid'])){
                    $uid=DB::table('dynamic_content_page_gallery')->where('uid',$value['uid'])->first();
                        if(!empty($value['uid']) && !empty($value['image'])){
                            $size = $this->getFileSize($value['image']->getSize());
                            $extension = $value['image']->getClientOriginalExtension();
                            $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                            $value['image']->move(resource_path().'/uploads/PageContentGallery', $name);

                            $result=DB::table('dynamic_content_page_gallery')->where('uid',$value['uid'])->update([
                                'image_title' => $value['imagetitle'],
                                'start_date' => $value['startdate'],
                                'end_date' => $value['enddate'],
                                'public_url' => isset($name)?$name:$uid->public_url,
                                'private_url' => isset($name)?$name:$uid->public_url,
                                'pdfimage_size' => isset($size)?$size:$uid->pdfimage_size,
                                'file_extension' => isset($extension)?$extension:$uid->file_extension,
                                // 'public_url' => $name,
                                // 'private_url' => $name,
                                // 'pdfimage_size' => $size,
                                // 'file_extension' => $extension,
                            ]);
                        }
                        $result=DB::table('dynamic_content_page_gallery')->where('uid',$value['uid'])->update([
                                'image_title' => $value['imagetitle'],
                                'start_date' => $value['startdate'],
                                'end_date' => $value['enddate'],
                                // 'public_url' => isset($name)?$name:$uid->public_url,
                                // 'private_url' => isset($name)?$name:$uid->public_url,
                                // 'pdfimage_size' => isset($size)?$size:$uid->pdfimage_size,
                                // 'file_extension' => isset($extension)?$extension:$uid->file_extension,
                            ]);
                }else{
                    $size = $this->getFileSize($value['image']->getSize());
                    $extension = $value['image']->getClientOriginalExtension();
                    $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                    $value['image']->move(resource_path().'/uploads/PageContentGallery', $name);
        
                $result=DB::table('dynamic_content_page_gallery')->insert([
                        'uid' => Uuid::uuid4(),
                        'image_title' => $value['imagetitle'],
                        'start_date' => $value['startdate'],
                        'end_date' => $value['enddate'],
                        'public_url' => $name,
                        'private_url' => $name,
                        'pdfimage_size' => $size,
                        'file_extension' => $extension,
                        'dcpm_id'=> $request->id
                    ]);
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
            }      
           }catch(Throwable $e)
           {
            report($e);
            return false;
           }
            return response()->json($notification);
    }
    public function updatePagePdf(Request $request)
    {
        
        if(isset($request->kt_tablehead_add_multiple_options[0]['tablehead']) && $request->kt_tablehead_add_multiple_options[0]['tablehead'] !=null){
            $jsonData = json_encode($request->kt_tablehead_add_multiple_options);
        }else{
            $jsonData = json_encode($request->kt_tablehead_add_multiple_options);
        }
        //dd($jsonData);
        try{
            $validator=Validator::make($request->all(),
                [
                'pageTitle_id2'=>'required',
               // 'page_title_hi'=>'required',
               /// 'is_parent'=>'required'
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                foreach($request->kt_PagePdf_add_multiple_options as $key=>$value)
                {
                if(!empty($value['uid'])){
                    $uid=DB::table('dynamic_content_page_pdf')->where('uid',$value['uid'])->first();
                    if(!empty($value['uid']) && !empty($value['image'])){
                        $size = $this->getFileSize($value['image']->getSize());
                        $extension = $value['image']->getClientOriginalExtension();
                        $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                        $value['image']->move(resource_path().'/uploads/PageContentPdf', $name);

                        $result=DB::table('dynamic_content_page_pdf')->where('uid',$value['uid'])->update([
                            'pdf_title' => $value['pdftitle'],
                            'start_date' => $value['startdate'],
                            'end_date' => $value['enddate'],
                            'public_url' => isset($name)?$name:$uid->public_url,
                            'private_url' => isset($name)?$name:$uid->public_url,
                            'pdfimage_size' => isset($size)?$size:$uid->pdfimage_size,
                            'file_extension' => isset($extension)?$extension:$uid->file_extension,
                            'table_head'=>$jsonData??'0',
                        ]);
                    }else{
                    $result=DB::table('dynamic_content_page_pdf')->where('uid',$value['uid'])->update([
                            'pdf_title' => $value['pdftitle'],
                            'start_date' => $value['startdate'],
                            'end_date' => $value['enddate'],
                            'table_head'=>$jsonData??'0',
                        ]);
                    }
                }else{
                    if(!empty($value['image'])){
                        $size = $this->getFileSize($value['image']->getSize());
                        $extension = $value['image']->getClientOriginalExtension();
                        $name = time().rand(10,99).'.'.$value['image']->getClientOriginalExtension();
                        $value['image']->move(resource_path().'/uploads/PageContentPdf', $name);
            
                        $result=DB::table('dynamic_content_page_pdf')->insert([
                            'uid' => Uuid::uuid4(),
                            'pdf_title' => $value['pdftitle'],
                            'start_date' => $value['startdate'],
                            'end_date' => $value['enddate'],
                            'pdfimage_size' => $size,
                            'file_extension' => $extension,
                            'public_url' => $name,
                            'private_url' => $name,
                            'table_head'=>$jsonData??'0',
                            'dcpm_id'=> $request->id
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
            }      
           }catch(Throwable $e)
           {
            report($e);
            return false;
           }
            return response()->json($notification);
    }

    public function updatepageBanner(Request $request)
    {
        try{
            $validator=Validator::make($request->all(),
                [
                'pageTitle_id3'=>'required',
                'bannertitle'=>'required',
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
                    $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/pagebanner');
                    $file->move($path,$newname);
                }else{
                    $newname = DB::table('dynamic_page_banner')->where('dcpm_id',$request->id)->first()->public_url;
                }
                $result= DB::table('dynamic_page_banner')->where('dcpm_id',$request->id)->update([
                    'banner_title_en' => $request->bannertitle??'banner',
                    'banner_title_hi' => $request->bannertitle??'banner',
                    'public_url' => $newname,
                    'dcpm_id' => $request->pageTitle_id3,
                    //'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('TENDER_ARCHIVEL')),
                    ]);
             // dd($result);  
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
     * Display the specified resource.
     *
     * @param  \App\Models\DynamicContentPageManagament  $dynamicContentPageManagament
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicContentPageManagament $dynamicContentPageManagament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DynamicContentPageManagament  $dynamicContentPageManagament
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('dynamic_content_page_metatag')->where('soft_delete','0')->where('uid',$id)->first();
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
     * @param  \App\Models\DynamicContentPageManagament  $dynamicContentPageManagament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DynamicContentPageManagament $dynamicContentPageManagament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicContentPageManagament  $dynamicContentPageManagament
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicContentPageManagament $dynamicContentPageManagament, $id)
    {
        $data=DB::table('dynamic_content_page_metatag')->where('uid',$id)->first();
        if($data)
        {
            DB::table('dynamic_content_page_metatag')->where('uid',$id)->update(['soft_delete'=>1]);
           // DB::table('dynamic_page_content')->where('dcpm_id',$id)->update(['soft_delete'=>1]);
            //DB::table('dynamic_content_page_pdf')->where('dcpm_id',$id)->update(['soft_delete'=>1]);
           // DB::table('dynamic_content_page_gallery')->where('dcpm_id',$id)->update(['soft_delete'=>1]);
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
        $id = explode(',',trim($request->id))[0];
        $type = explode(',',trim($request->id))[1];
        
        if($type =='img'){
            $data=DB::table('dynamic_content_page_gallery')->where('uid',$id)->first();
        }elseif($type =='pdf'){
            $data=DB::table('dynamic_content_page_pdf')->where('uid',$id)->first();
        }else{
            abort(404);
        }
        //dd($data);
        if($data !='null' && $type =='img' || $type=='pdf')
        {
            if($type =='img'){
                DB::table('dynamic_content_page_gallery')->where('uid',$id)->update(['soft_delete'=>1]);
            }else{
                DB::table('dynamic_content_page_pdf')->where('uid',$id)->update(['soft_delete'=>1]);
            }
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
