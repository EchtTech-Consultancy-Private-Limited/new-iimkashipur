<?php

namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\CMSBasicSetting;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class CMSBasicSettingController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }
    
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
     * @param  \App\Models\CMSBasicSetting  $cMSBasicSetting
     * @return \Illuminate\Http\Response
     */
    public function show(CMSBasicSetting $cMSBasicSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CMSBasicSetting  $cMSBasicSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(CMSBasicSetting $cMSBasicSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CMSBasicSetting  $cMSBasicSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CMSBasicSetting $cMSBasicSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CMSBasicSetting  $cMSBasicSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(CMSBasicSetting $cMSBasicSetting)
    {
        //
    }
}
