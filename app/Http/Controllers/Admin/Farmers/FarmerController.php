<?php

namespace App\Http\Controllers\Admin\Farmers;

use App\Enums\GenderEnums;
use Illuminate\Http\Request;
use App\Models\Farmers\Farmer;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Http\Controllers\Controller;
use App\Http\Requests\Farmers\StoreFarmerRequest;
use App\Http\Requests\Farmers\UpdateFarmerRequest;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmers = Farmer::all();
        return view('admin.farmers.farmer.index',compact('farmers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.farmers.farmers.create');
        $provinces = Province::all();
        $options = $provinces->pluck('province','id')->toArray();

        return view('admin.farmers.farmer.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFarmerRequest $request)
    {
        dd($request->toArray());
        Farmer::create($request->validated());

        toast('Farmer Cooperative added Successfully','success');
        return to_route('admin.farmers.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farmer $farmerCooperative)
    {
        return view('admin.farmers.farmer.edit',compact('farmerCooperative'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $request, Farmer $farmerCooperative)
    {
        $farmerCooperative->update($request->validated());
        toast('Farmer Cooperative updated successfully','success');
        return to_route('admin.farmers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farmer $farmerCooperative)
    {
        $farmerCooperative->delete();
        toast('Grant Office deleted successfully','success');
        return back();
    }
}
