<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Advs;
use Illuminate\Http\Request;


/**
 * Class AdvsController
 * @package App\Http\Controllers
 */
class AdvsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //to get all post
        return  Advs::all();
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
       // $request->validate([]);
        //create an adv
        return  Advs::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advs  $advs
     * @return \Illuminate\Http\Response
     */
    public function show(Advs $advs)
    {
        return  Advs::find($advs->getKey());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advs  $advs
     * @return \Illuminate\Http\Response
     */
    public function edit(Advs $advs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advs  $advs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advs $advs)
    {
         return Advs::find($advs->getKey() )->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advs  $advs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advs $advs)
    {
        return Advs::destroy($advs);
    }
}
