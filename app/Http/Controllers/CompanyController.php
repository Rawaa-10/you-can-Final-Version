<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::all();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'picture' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,bmp',
            'type_id' => 'required|integer'
        ], [
            'name.required' => 'PLEASE ENTER COMPANYS NAME',
            'location.required' => 'PLEASE ENTER COMPANYS LOCATION ',
            'picture.nullable' => 'THE MIMES OF PICTURE MUST BE ONE OF THIS "JPG,JPEG,PNG,BMP"',
            'type_id.required' => 'YOU HAVE TO CHOOSE TYPE FOR THIS COMPANY'
        ]);
        return Company::create([
            'name' => $request['name'],
            'location' => $request['location'],
            'picture' => $request['picture']->store('images', 'public'),
            'type_id' => $request['type_id']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return Company::query()->find($company['id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $comp = $request->only('location', 'name', 'picture', 'type_id');
        if ($request->hasFile('picture')) {
            ///store new picture in folder
            $image = $request['picture']->store('images', 'public');
            ////delete old picture
            Storage::disk('public')->delete($company['picture']);
            $company['picture'] = $image;
        }
        $company->update();
        return response()->json(['status ' => 'true', 'message' => 'the company information is updated !!!!'
            , 'data' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Company::destroy($company['id']);
        return response()->json(['status ' => 'true', 'message' => 'the company information is deleted !!']);
    }
}
