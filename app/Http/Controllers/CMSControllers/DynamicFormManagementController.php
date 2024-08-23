<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\DynamicFormManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class DynamicFormManagementController extends Controller
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
        $data=DynamicFormManagement::all();
        return view('cms-view.dynamic-form-management.dynamic-add',compact('data'));
    }

    public function faqIndex()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('faq-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('faq-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('faq.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('faq-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('faq-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('faq-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

        return view('cms-view.dynamic-form-management.faq-list',
             [
                'crudUrlTemplate' =>  json_encode($crudUrlTemplate),    
                'textMessage' =>$accessPermission??''
            
            ]);
    }
    public function faqCreate()
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
        $crudUrlTemplate['create'] = route('faq-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        
        return view('cms-view.dynamic-form-management.faq-add',
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),    
            'textMessage' =>$accessPermission??''
         ]);
    }
    public function faqEdit(Request $request)
    {
        $crudUrlTemplate['update'] = route('faq-update');

        $results = DB::table('faq')->where('uid', $request->id)->first();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        return view('cms-view.dynamic-form-management.faq-edit',
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
        'data'=> $result,
         ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\DynamicFormManagement  $dynamicFormManagement
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicFormManagement $dynamicFormManagement)
    {
       return view('cms-view.dynamic-form-management.list'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DynamicFormManagement  $dynamicFormManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicFormManagement $dynamicFormManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DynamicFormManagement  $dynamicFormManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DynamicFormManagement $dynamicFormManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicFormManagement  $dynamicFormManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicFormManagement $dynamicFormManagement)
    {
        //
    }
}
