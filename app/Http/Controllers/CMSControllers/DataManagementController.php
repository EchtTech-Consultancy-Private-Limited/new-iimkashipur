<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\AccessModelTrait;
use DB;

class DataManagementController extends Controller
{
    use AccessModelTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $create = '';
    protected $edit = '';
    protected $list = '';

    public function __construct()
    {

    }
    public function FeedbackIndex()
    {
        $crudUrlTemplate = array();

        
        if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
            $crudUrlTemplate['list'] = route('dm-list-feedback');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
                //$crudUrlTemplate['edit'] = route('');
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
             // $crudUrlTemplate['delete'] = route('');
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('recentactivity-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('recentactivity-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        
        return view('cms-view.commonPages.feedback-list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }
    public function otherIndex()
    {
        $crudUrlTemplate = array();

        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
            $crudUrlTemplate['list'] = route('other-list');
        }
        //$crudUrlTemplate['edit'] = route('dm-list-contactus');
        //$crudUrlTemplate['delete'] = route('dm-list-contactus');
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

        return view('cms-view.commonPages.other-list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }
    public function contactUSIndex()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['view']) && $this->abortIfAccessNotAllowed()['view'] !=''){
            $crudUrlTemplate['list'] = route('dm-list-contactus');
        }
        //$crudUrlTemplate['edit'] = route('dm-list-contactus');
        //$crudUrlTemplate['delete'] = route('dm-list-contactus');
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

        return view('cms-view.commonPages.contactus-list',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
        
        ]);
    }
    /**
     * Store analytics data.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
    }
}