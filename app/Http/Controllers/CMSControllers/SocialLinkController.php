<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\CMSModels\SocialLink;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\AccessModelTrait;

class SocialLinkController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = '';
    protected $edit = '';
    protected $list = '';
    
    public function index(Request $request,$id=null)
    {
        // if(websiteCoreSettings::where('id',$request->websiteCoreSettings_id)->exists())
        // {
        // $data=WebsiteCoreSettings::find($request->websiteCoreSettings_id);
        // return view('website-core-settings.websitesetting',compact('data','id'));  
        // }
        // else{
        //     $data=WebsiteCoreSettings::find($request->websiteCoreSettings_id);
        // return view('website-core-settings.websitesetting',compact('data','id'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data=SocialLink::all(); 
       $crudUrlTemplate = array();
       // xxxx to be replaced with ext_id to create valid endpoint
       if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['read'] = route('websitecoresetting-list');
            $crudUrlTemplate['list'] = route('websitecoresetting-list');
            $crudUrlTemplate['view'] = route('websitecoresetting-list');
       }
       if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
       
       }
       if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('websitecoresetting-list');
       }
       if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
             $crudUrlTemplate['approver'] = route('websitecoresetting-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('websitecoresetting-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }

       return view('cms-view.website-core-settings.websitecoresetting_list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->sociallink_id)
        {
        $title="Edit Details";
        $msg="Tender Details Edited Successfully!";
        $data=SocialLink::find($id);
        }
        else
        {

          $title="Add Details";
          $msg="Details Added Successfully!";
          $data=new SocialLink;
        }

        if($request->isMethod('post'))
        {   
            $data->id=Uuid::uuid4();   
            $data->google_link=$request->google_link;
            $data->linkedin=$request->linkedin;
            $data->facebook=$request->facebook;
            $data->twitter=$request->twitter;
            $data->instagram=$request->instagram;
            $data->github=$request->github;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteCoreSettings  $websiteCoreSettings
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteCoreSettings $websiteCoreSettings)
    {
        $data=SocialLink::all();
        $totalRecords = WebsiteCoreSettings::where('soft_delete',0)->count();
     

        $resp = new \stdClass;

        $resp->iTotalRecords = $totalRecords;
        $resp->iTotalDisplayRecords = $totalRecords;
        $resp->sEcho = (int)$request->input('draw');
        $resp->aaData = $data;
        
        return response()->json($resp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteCoreSettings  $websiteCoreSettings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $data = WebsiteCoreSettings::find($id);
       //  return view('website-core-settings.websitesetting',compact('data','id'));
    }

public function update(Request $request, WebsiteCoreSettings $websiteCoreSettings)
    {
        // $id = $request->id;
        // $core = WebsiteCoreSettings::findOrFail($id);
        // if($core)
        // {   
            
        //     $core->logo_title= $request->logo_title;
        //     if($request->hasFile('header_logo')){
        //         $file=$request->file('header_logo');
        //         $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
        //         $path=public_path('uploads/websitesetting_logo');
        //         $file->move($path,$newname);
        //     }
        //     $core->header_logo=$newname;
        //     $core->update();

        //     return response()->json([
        //         'status'=>200,
        //         'message'=>'Added successfully.'
        //     ],200);
        //     }
        //     else
        //     {
        //         return response()->json([
        //         'status'=>201,
        //         'message'=>'some error accoured.'
        //     ],201);
        //     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteCoreSettings  $websiteCoreSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteCoreSettings $websiteCoreSettings,Request $request)
    {
        // if(websiteCoreSettings::where('id',$request->websiteCoreSettings_id)->exists())
        // {
        // WebsiteCoreSettings::find($request->websiteCoreSettings_id)->delete();
        // return response()->json(['success'=>'Company Delete Successfully'],200);  
        // }
        // else{
        //     return response()->json(['success'=>'Record not exist.'],201);
        // }
    }
}
