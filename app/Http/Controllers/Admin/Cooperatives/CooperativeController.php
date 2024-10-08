<?php

namespace App\Http\Controllers\Admin\Cooperatives;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cooperatives\Cooperative;
use App\Models\Setting\Types\CooperativeType;

class CooperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cooperatives = Cooperative::all();
        return view('admin.cooperatives.cooperative.index',compact('cooperatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options1 = CooperativeType::all();
        $cooperativeTypes = $options1->pluck('title','id')->toArray();
        return view('admin.cooperatives.cooperative.create',compact('cooperativeTypes'));
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
    public function show(Cooperative $cooperative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cooperative $cooperative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cooperative $cooperative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cooperative $cooperative)
    {
        //
    }
}
