<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\RtiApplicationResponses;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;

class RtiApplicationResponsesController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'rti-application-responses.rti-application-responses-create';
    protected $list = 'rti-application-responses.rti-application-responses-list';
    protected $update = 'rti-application-responses.rti-application-responses-edit';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('rtiapplicationresponses-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('rtiapplicationresponses-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('rtiapplicationresponses.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('rtiapplicationresponses-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('rtiapplicationresponses-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('rtiapplicationresponses-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        
        $createURL = route('rtiapplicationresponses.create');

        return view('cms-view.'.$this->list,
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'createUrl' =>$createURL
        
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
            $crudUrlTemplate['create'] = route('rtiapplicationresponses-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        
        return view('cms-view.'.$this->create,[
            'crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'textMessage' =>$accessPermission??''
            ]
        );
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
     * @param  \App\Models\RtiApplicationResponses  $rtiApplicationResponses
     * @return \Illuminate\Http\Response
     */
    public function show(RtiApplicationResponses $rtiApplicationResponses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RtiApplicationResponses  $rtiApplicationResponses
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RtiApplicationResponses $rtiApplicationResponses)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('rtiapplicationresponses-update');
            $crudUrlTemplate['deletepdfimg'] = route('pdf-delete');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

        $results = RtiApplicationResponses::where('uid',$request->id)->where([['soft_delete','=','0']])->first();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        return view('cms-view.'.$this->update,
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
                'data'=> $result??'',
                'textMessage' =>$accessPermission??''
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RtiApplicationResponses  $rtiApplicationResponses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RtiApplicationResponses $rtiApplicationResponses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RtiApplicationResponses  $rtiApplicationResponses
     * @return \Illuminate\Http\Response
     */
    public function destroy(RtiApplicationResponses $rtiApplicationResponses)
    {
        //
    }
}
