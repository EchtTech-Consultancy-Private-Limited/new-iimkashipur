<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\EventsManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class EventsManagementController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'events-management.event_add';
    protected $edit = 'events-management.event-edit';
    protected $list = 'events-management.event_list';
    protected $view = 'events-management.event_view';

    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
            $crudUrlTemplate['list'] = route('event-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('event.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
            $crudUrlTemplate['view'] = route('event.show', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('event-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('event-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('event-approve', ['id' => 'xxxx']);
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
            $crudUrlTemplate['create_event'] = route('event-save');
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
     * @param  \App\Models\EventsManagement  $eventsManagement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
       
        $dataVal=DB::table('events_management')->where('uid',$request->id)->where('soft_delete','0')->first();
        if($dataVal !=null){
            $dataV =$dataVal;
        }else{
            return view('cms-view.errors.500');
        }
        $details=DB::table('events_details')->where('events_id',$request->id)->where('soft_delete','0')->get();

        $data = new \StdClass;
        $data->list = $dataV??'';
        $data->details = $details??'';
        
        return view('cms-view.'.$this->view,['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventsManagement  $eventsManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('event-update');
            $crudUrlTemplate['deletepdfimg'] = route('pdf-delete-event');
        }

        $results = EventsManagement::where('uid', $request->id)->first();
        $pdfimagesData = DB::table('events_details')->where('events_id', $results->uid)->where([['soft_delete','=','0']])->get();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        //dd($result);
        return view('cms-view.'.$this->edit,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'data'=> $result,
            'pdfData' => isset($pdfimagesData)?$pdfimagesData:'',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventsManagement  $eventsManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventsManagement $eventsManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventsManagement  $eventsManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventsManagement $eventsManagement)
    {
        //
    }
}
