<?php

namespace App\Http\Controllers;

use App\Models\Moment;
use App\Http\Requests\StoreMomentRequest;
use App\Http\Requests\UpdateMomentRequest;

class MomentController extends Controller
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
     * @param  \App\Http\Requests\StoreMomentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMomentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moment  $moment
     * @return \Illuminate\Http\Response
     */
    public function show(Moment $moment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moment  $moment
     * @return \Illuminate\Http\Response
     */
    public function edit(Moment $moment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMomentRequest  $request
     * @param  \App\Models\Moment  $moment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMomentRequest $request, Moment $moment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moment  $moment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moment $moment)
    {
        //
    }
}
