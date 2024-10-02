<?php

namespace App\Http\Controllers\Admin\Farmers;

use Illuminate\Http\Request;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Http\Controllers\Controller;
use App\Models\Farmers\FarmerCooperatives;
use App\Http\Requests\Farmers\StoreFarmerCooperativesRequest;
use App\Http\Requests\Farmers\UpdateFarmerCooperativesRequest;

class FarmerCooperativesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmerCooperatives = FarmerCooperatives::all();
        return view('admin.farmers.farmerCooperatives.index',compact('farmerCooperatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.farmers.farmerCooperatives.create');
        $provinces = Province::all(); // Assuming you have a Province model
        return view('admin.farmers.farmerCooperatives.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFarmerCooperativesRequest $request)
    {
        FarmerCooperatives::create($request->validated());

        toast('Farmer Cooperative added Successfully','success');
        return to_route('admin.farmerCooperatives.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerCooperatives $farmerCooperative)
    {
        return view('admin.farmers.farmerCooperatives.edit',compact('farmerCooperative'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFarmerCooperativesRequest $request, FarmerCooperatives $farmerCooperative)
    {
        $farmerCooperative->update($request->validated());
        toast('Farmer Cooperative updated successfully','success');
        return to_route('admin.farmerCooperatives.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerCooperatives $farmerCooperative)
    {
        $farmerCooperative->delete();
        toast('Grant Office deleted successfully','success');
        return back();
    }
}
