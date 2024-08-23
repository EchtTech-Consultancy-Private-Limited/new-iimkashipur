<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\PopupAdvertising;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;

class PopupAdvertisingController extends Controller
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
     * @param  \App\Models\PopupAdvertising  $popupAdvertising
     * @return \Illuminate\Http\Response
     */
    public function show(PopupAdvertising $popupAdvertising)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PopupAdvertising  $popupAdvertising
     * @return \Illuminate\Http\Response
     */
    public function edit(PopupAdvertising $popupAdvertising)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PopupAdvertising  $popupAdvertising
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PopupAdvertising $popupAdvertising)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PopupAdvertising  $popupAdvertising
     * @return \Illuminate\Http\Response
     */
    public function destroy(PopupAdvertising $popupAdvertising)
    {
        //
    }
}
