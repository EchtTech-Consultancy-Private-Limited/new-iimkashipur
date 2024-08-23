<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\RtiAssets;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class RtiAssetsController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'rti-management.rti-add';
    protected $edit = 'rti-management.rti-edit';
    protected $list = 'rti-management.rti-list';
    
    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('rtiassets-list');
        }
        
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('rtiassets.edit', ['id' => 'xxxx']);
        }
        
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('rtiassets-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('rtiassets-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('rtiassets-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }

        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');
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
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create_rti'] = route('rtiassets-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

       return view('cms-view.'.$this->create,
       ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),    
        'textMessage' =>$accessPermission??''
    
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
        //
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
    public function edit(Request $request, RtiAssets $rtiAssets)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('rtiassets-update');
            $crudUrlTemplate['deletepdfimg'] = route('pdf-delete-rtiassets');
        }

        $results=DB::table('rti_assets')->where('uid',$request->id)->where([['soft_delete','=','0']])->first();
        $pdfData = DB::table('rti_assets_details')->where('rti_assets_id',$results->uid)->where([['soft_delete','=','0']])->get();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        return view('cms-view.'.$this->edit,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
        'data'=> $result,
        'pdfData' => isset($pdfData)?$pdfData:'',
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RtiAssets  $rtiAssets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RtiAssets $rtiAssets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RtiAssets  $rtiAssets
     * @return \Illuminate\Http\Response
     */
    public function destroy(RtiAssets $rtiAssets)
    {
        //
    }
}
