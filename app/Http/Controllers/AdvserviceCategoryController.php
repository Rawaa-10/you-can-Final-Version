<?php

namespace App\Http\Controllers;

use App\Models\AdvserviceCategory;
use Illuminate\Http\Request;

class AdvserviceCategoryController extends Controller
{
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
        $request->validate([
            'advservice_id' => 'required|integer',
            'category_id' => 'required|integer'
        ]);
       $new = AdvserviceCategory::create([
            'advservice_id' => $request['advservice_id'] ,
            'category_id' => $request['category_id']
        ]);

        return response()->json([ 'status ' => 'true' , 'message' => ' category to this service add successfully !!!!'
            , 'data' =>$new]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvserviceCategory $dc
     * @return \Illuminate\Http\Response
     */
    public function show(AdvserviceCategory $dc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvserviceCategory $dc
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvserviceCategory $dc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $advservice_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $advservice_id)
    {
        $advServiceCategory = AdvserviceCategory::where('advservice_id', $advservice_id)->first();
        $advServiceCategory->update(['category_id' => $request->input('category_id')]);

        return response()->json([ 'status ' => 'true' , 'message' => ' categories to this service updateded !!!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvserviceCategory $dc
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvserviceCategory $dc)
    {
        //
    }
}
