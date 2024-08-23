<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\PurchaseWorksCommittee;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class PurchaseWorksCommitteeController extends Controller
{
    use AccessModelTrait;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'purchase-works-committee.purchase-works-committee-create';
    protected $update = 'purchase-works-committee.purchase-works-committee-edit';
    protected $list = 'purchase-works-committee.purchase-works-committee-list';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('purchaseworkscommittee-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('purchaseworkscommittee-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('purchaseworkscommittee.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('purchaseworkscommittee-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('purchaseworkscommittee-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('purchaseworkscommittee-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        $createURL = route('purchaseworkscommittee.create');
        
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
            $crudUrlTemplate['create'] = route('purchaseworkscommittee-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        $assetType=DB::table('purchase_works_committees_type')->select('pwc_type','uid')->where([['soft_delete','=','0']])->orderby('sort_order','asc')->get();
        
        return view('cms-view.'.$this->create,
         ['type' =>$assetType,
         'crudUrlTemplate' =>  json_encode($crudUrlTemplate),
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
     * @param  \App\Models\PurchaseWorksCommittee  $purchaseWorksCommittee
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseWorksCommittee $purchaseWorksCommittee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseWorksCommittee  $purchaseWorksCommittee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PurchaseWorksCommittee $purchaseWorksCommittee)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('purchaseworkscommittee-update');
            $crudUrlTemplate['deletepdfimg'] = route('pdf-delete');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

        $results = PurchaseWorksCommittee::where('uid',$request->id)->where([['soft_delete','=','0']])->first();
        if($results){
            $result = $results;
        }else{
            return view('cms-view.errors.500');
        }
        $assetType=DB::table('purchase_works_committees_type')->select('pwc_type','uid')->where([['soft_delete','=','0']])->orderby('sort_order','asc')->get();
        
        return view('cms-view.'.$this->update,
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
                'data'=> $result??'',
                'type' =>$assetType,
                'textMessage' =>$accessPermission??''
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseWorksCommittee  $purchaseWorksCommittee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseWorksCommittee $purchaseWorksCommittee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseWorksCommittee  $purchaseWorksCommittee
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseWorksCommittee $purchaseWorksCommittee)
    {
        //
    }
}
