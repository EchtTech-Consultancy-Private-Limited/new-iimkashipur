<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\TechnicalDocumentsManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;

class TechnicalDocumentsManagementController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\TechnicalDocumentsManagement  $technicalDocumentsManagement
     * @return \Illuminate\Http\Response
     */
    public function show(TechnicalDocumentsManagement $technicalDocumentsManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechnicalDocumentsManagement  $technicalDocumentsManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(TechnicalDocumentsManagement $technicalDocumentsManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TechnicalDocumentsManagement  $technicalDocumentsManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TechnicalDocumentsManagement $technicalDocumentsManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechnicalDocumentsManagement  $technicalDocumentsManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechnicalDocumentsManagement $technicalDocumentsManagement)
    {
        //
    }
}
