<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\EmpDepartDesignation;
use App\Http\Requests\DepartmentDesignation\AddDepartmentValidation;
use App\Http\Requests\DepartmentDesignation\EditDepartmentValidation;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use DB, Validator;
use Carbon\Carbon;

class EmpDepartDesignationAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=EmpDepartDesignation::where('soft_delete','0')->get();
        $totalRecords = EmpDepartDesignation::where('soft_delete','0')->count();
        $resp = new \stdClass;
        $resp->iTotalRecords = $totalRecords;
        $resp->iTotalDisplayRecords = $totalRecords;
        $resp->aaData = $data;
        if($resp)
            {
                return response()->json($resp,200);
            }
            else{
                return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
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
    public function store(AddDepartmentValidation $request)
    {
            try{
                $result= EmpDepartDesignation::insert([
                        'uid' => Uuid::uuid4(),
                        'name_en' => $request->name_en,
                        'name_hi' => $request->name_hi,
                        'parent_id' => isset($request->parent_id)?$request->parent_id:'0',
                    ]);
                
                if($result == true)
                {
                    $notification =[
                        'status'=>200,
                        'message'=>'Added successfully.'
                    ];
                }
                else{
                   // DB::rollback();
                    $notification = [
                            'status'=>201,
                            'message'=>'some error accoured.'
                        ];
                    } 
            }catch(Throwable $e)
            {
                report($e);
                return false;
            }
        //}
        return response()->json($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpDepartDesignation  $empDepartDesignation
     * @return \Illuminate\Http\Response
     */
    public function show(EmpDepartDesignation $empDepartDesignation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpDepartDesignation  $empDepartDesignation
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpDepartDesignation $empDepartDesignation)
    {
        $crudUrlTemplate['update'] = route('departmentdesignation-update');

        $results = EmpDepartDesignation::where('uid', $request->id)->first();
        if($results){
            $result = $results;
        }else{
            abort(404);
        }
        //dd($result);
        // return view('department-designation.edit',
        // ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
        //     'data'=> $result,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpDepartDesignation  $empDepartDesignation
     * @return \Illuminate\Http\Response
     */
    public function update(EditDepartmentValidation $request, EmpDepartDesignation $empDepartDesignation)
    {
        try{
            if($request->parent_id){
                $parentId = $request->parent_id;
            }
            $result= EmpDepartDesignation::where('uid',$request->id)->update([
                'name_en' => $request->name_en,
                'name_hi' => $request->name_hi,
                'parent_id' => $parentId??'0',
                'status' => 1,
            ]);
            
            if($result == true)
            {
                $notification =[
                    'status'=>200,
                    'message'=>'Added successfully.'
                ];
            }
            else{
                $notification = [
                        'status'=>201,
                        'message'=>'some error accoured.'
                    ];
                 } 
           }catch(Throwable $e){report($e);
            return false;
           }
            return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpDepartDesignation  $empDepartDesignation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=EmpDepartDesignation::where('uid',$id)->first();
        if($data)
        {
            EmpDepartDesignation::where('uid',$id)->update(['soft_delete'=>'1']);
            return response()->json([
                'status'=>200,
                'message'=>'deleted successfully.'
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
