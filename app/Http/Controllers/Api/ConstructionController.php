<?php

namespace App\Http\Controllers\Api;

use App\Models\Construction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'eae';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Construction $construction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Construction $construction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Construction $construction)
    {
        //
    }
}
