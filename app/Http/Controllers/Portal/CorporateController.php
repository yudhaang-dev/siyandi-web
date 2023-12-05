<?php

namespace App\Http\Controllers;

use App\Models\Corporate;
use App\Http\Requests\StoreCorporateRequest;
use App\Http\Requests\UpdateCorporateRequest;

class CorporateController extends Controller
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
    public function store(StoreCorporateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Corporate $corporate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corporate $corporate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorporateRequest $request, Corporate $corporate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corporate $corporate)
    {
        //
    }
}
