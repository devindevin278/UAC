<?php

namespace App\Http\Controllers;

use App\Models\Temp;
use App\Http\Requests\StoreTempRequest;
use App\Http\Requests\UpdateTempRequest;

class TempController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTempRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Temp $temp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Temp $temp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTempRequest $request, Temp $temp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temp $temp)
    {
        //
    }
}
