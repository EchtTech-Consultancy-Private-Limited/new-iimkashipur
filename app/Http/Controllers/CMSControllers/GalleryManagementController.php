<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\GalleryManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class GalleryManagementController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'photo-video-gallery-management.gallery-management-add';
    protected $edit = 'photo-video-gallery-management.gallery-management-edit';
    protected $editVideo = 'photo-video-gallery-management.gallery-video-edit';
    protected $list = 'photo-video-gallery-management.list';

    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('photovideo-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('photovideo.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('photovideo-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('photovideo-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('photovideo-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
       // $crudUrlTemplate['edit'] = route('event.edit', ['id' => 'xxxx']);
        //$crudUrlTemplate['delete'] = route('event-delete', ['id' => 'xxxx']);
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');
        //$data=GalleryManagement::where('')->where()->get();

        return view('cms-view.'.$this->list,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create_photo'] = route('photo-save');
            $crudUrlTemplate['create_video'] = route('video-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        $now = date('Y');
        $then = $now - 14;
        $years = range( $now, $then );

        return view('cms-view.'.$this->create,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),    
            'textMessage' =>$accessPermission??'',
            'years'=>$years,
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function photoStore(Request $request)
    {
        $request->validate([
          'logo_title'=>'required'              
        ]);
            $data=new WebsiteCoreSettings;   
            if($request->hasFile('header_logo')){
                $file=$request->file('header_logo');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=public_path('uploads/websitesetting_logo');
                $file->move($path,$newname);
                $data->header_logo=$newname;
            }
            $data->id=Uuid::uuid4();
            $data->logo_title=$request->logo_title;
            $data->save();
            if($data)
            {
                return response()->json([
                'status'=>200,
                'message'=>'Added successfully.'
            ],200);
            }
            else{
                return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
    public function videoStore(Request $request)
    {
        $request->validate([
          'logo_title'=>'required'              
        ]);
            $data=new WebsiteCoreSettings;   
            if($request->hasFile('header_logo')){
                $file=$request->file('header_logo');
                $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                $path=public_path('uploads/websitesetting_logo');
                $file->move($path,$newname);
                $data->header_logo=$newname;
            }
            $data->id=Uuid::uuid4();
            $data->logo_title=$request->logo_title;
            $data->save();
            if($data)
            {
                return response()->json([
                'status'=>200,
                'message'=>'Added successfully.'
            ],200);
            }
            else{
                return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GalleryManagement  $galleryManagement
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryManagement $galleryManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GalleryManagement  $galleryManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryManagement $galleryManagement,Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update_photo'] = route('photo-update');
            $crudUrlTemplate['update_video'] = route('photo-update');
            $crudUrlTemplate['remove_multiple'] = route('gallery-multiple');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

        $results = GalleryManagement::where('uid', $request->id)->first();
        $pdfimagesData = DB::table('gallery_details')->where('gallery_id', $results->uid)->where([['soft_delete','=','0']])->get();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        if($results->type == 1){
            $fileName = $this->editVideo;
        }else{
            $fileName = $this->edit;
        }
        //dd($result);
        $now = date('Y');
        $then = $now - 14;
        $years = range( $now, $then );

        return view('cms-view.'.$fileName,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'data'=> $result,
            'pdfData' => isset($pdfimagesData)?$pdfimagesData:'',
            'textMessage' =>$accessPermission??'',
            'years'=>$years,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GalleryManagement  $galleryManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryManagement $galleryManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryManagement  $galleryManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryManagement $galleryManagement)
    {
        //
    }
}
