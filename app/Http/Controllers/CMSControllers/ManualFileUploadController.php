<?php

namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\ManualFileUpload;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class ManualFileUploadController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'file-upload-manual.upload-file-add';
    protected $edit = 'file-upload-manual.upload-file-edit';
    protected $list = 'file-upload-manual.upload-file-list';

    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('mfu-save');
        }
        if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
            $crudUrlTemplate['list'] = route('mfu-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('mfu.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('mfu-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('mfu-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('mfu-approve', ['id' => 'xxxx']);
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
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('mfu-save');
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
     * @param  \App\Models\ManualFileUpload  $manualFileUpload
     * @return \Illuminate\Http\Response
     */
    public function show(ManualFileUpload $manualFileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManualFileUpload  $manualFileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(ManualFileUpload $manualFileUpload, Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('mfu-update');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

        $results = ManualFileUpload::where('uid', $request->id)->first();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        //dd($result);
        return view('cms-view.'.$this->edit,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'data'=> $result,
            'textMessage' =>$accessPermission??''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManualFileUpload  $manualFileUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManualFileUpload $manualFileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManualFileUpload  $manualFileUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManualFileUpload $manualFileUpload)
    {
        //
    }
}
