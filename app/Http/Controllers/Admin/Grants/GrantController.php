<?php

namespace App\Http\Controllers\Admin\Grants;

use App\Http\Controllers\Controller;
use App\Models\Grants\Grant;
use Illuminate\Http\Request;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grants = Grant::all();
        return view('admin.grants.grant.index',compact('grants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.grants.grant.create');
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
    public function show(Grant $grant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grant $grant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        //
    }
}
