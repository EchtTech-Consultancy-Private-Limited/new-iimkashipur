<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\TenderManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class TenderManagementController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'tenders-management.tenders_add';
    protected $edit = 'tenders-management.tenders_edit';
    protected $list = 'tenders-management.tenders_list';
    protected $view = 'tenders-management.tender_view';

    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('tender-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
            $crudUrlTemplate['view'] = route('tender.show', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('tender.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('tender-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('tender-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('tender-approve', ['id' => 'xxxx']);
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
            $crudUrlTemplate['create_tender'] = route('tender-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        $tendertype=DB::table('tender_type')->where([['soft_delete','0'],['status','3']])->get();
        return view('cms-view.'.$this->create,
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),    
            'textMessage' =>$accessPermission??'',
            'tendertype'=>$tendertype
        
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
     * @param  \App\Models\TenderManagement  $tenderManagement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TenderManagement $tenderManagement)
    {
        $dataVal=DB::table('tender_management')->where('uid',$request->id)->where('soft_delete','0')->first();
        if($dataVal !=null){
            $dataV =$dataVal;
        }else{
            return view('cms-view.errors.500');
        }
        $details=DB::table('tender_details')->where('tender_id',$request->id)->where('soft_delete','0')->get();

        $data = new \StdClass;
        $data->list = $dataV??'';
        $data->details = $details??'';
        
        return view('cms-view.'.$this->view,['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TenderManagement  $tenderManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update_tender'] = route('tender-update');
            $crudUrlTemplate['deletepdfimg'] = route('pdf-delete-tender');
        }

        $results=DB::table('tender_management')->where('uid',$request->id)->where([['soft_delete','=','0']])->first();
        $pdfData = DB::table('tender_details')->where('tender_id',$results->uid)->where([['soft_delete','=','0']])->get();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        $tendertypeList = DB::table('tender_type')->where([['status',3],['soft_delete',0]])->get();
        return view('cms-view.'.$this->edit,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
        'data'=> $result,
        'pdfData' => isset($pdfData)?$pdfData:'',
        'tendertype'=>$tendertypeList
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TenderManagement  $tenderManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenderManagement $tenderManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TenderManagement  $tenderManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(TenderManagement $tenderManagement)
    {
        //
    }
}
