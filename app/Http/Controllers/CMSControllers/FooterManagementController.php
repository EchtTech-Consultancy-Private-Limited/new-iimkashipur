<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\FooterManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use Ramsey\Uuid\Uuid;

class FooterManagementController extends Controller
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
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=FooterManagement::all(); 
       $crudUrlTemplate = array();
       if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
            $crudUrlTemplate['read'] = route('websitecoresetting-list');
            $crudUrlTemplate['list'] = route('websitecoresetting-list');
            $crudUrlTemplate['delete'] = route('websitecoresetting-list');
            $crudUrlTemplate['view'] = route('websitecoresetting-list');
       }
       if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
        $crudUrlTemplate['approver'] = route('websitecoresetting-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('websitecoresetting-approve', ['id' => 'xxxx']);
        }
        else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
       
       if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
       
       }
       
       if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
       
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
        $request->validate([
          'address'=>'required'              
        ]);       
            $data=new FooterManagement();
            $data->id=Uuid::uuid4();
            $data->address=$request->address;
            $data->phone_number=$request->phone_number;
            $data->email=$request->email;
            $data->fax_number=$request->fax_number;
            $data->locate_map_link=$request->locate_map_link;
            $data->copyright_name=$request->copyright_name;
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
     * @param  \App\Models\FooterManagement  $footerManagement
     * @return \Illuminate\Http\Response
     */
    public function show(FooterManagement $footerManagement)
    {
        $data=FooterManagement::all();
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
     * @param  \App\Models\FooterManagement  $footerManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterManagement $footerManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FooterManagement  $footerManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterManagement $footerManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FooterManagement  $footerManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterManagement $footerManagement)
    {
        //
    }
}
