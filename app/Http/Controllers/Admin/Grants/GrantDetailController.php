<?php

namespace App\Http\Controllers\Admin\Grants;

use App\Http\Controllers\Controller;
use App\Models\Grants\Grant;
use App\Models\Grants\GrantDetail;
use App\Models\Setting\FisicalYear;
use Illuminate\Http\Request;

class GrantDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grantDetails = GrantDetail::all();
        return view('admin.grants.grantDetail.index',compact('grantDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $fisicalYears = FisicalYear::all();
        // $options = $fisicalYears->pluck('year','id')->toArray();
        // $grants = Grant::all();
        // $grantOptions =

        return view('admin.grants.grantDetail.create');
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
    public function show(GrantDetail $grantDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrantDetail $grantDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrantDetail $grantDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrantDetail $grantDetail)
    {
        //
    }
}
