<?php

namespace App\Http\Controllers\Admin\Farmers;

use App\Enums\GenderEnums;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Farmers\Farmer;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Farmers\Farmer\StoreFarmerRequest;
use App\Http\Requests\Farmers\Farmer\UpdateFarmerRequest;

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
    // public function store(StoreFarmerRequest $request)
    // {
    //     // dd($request->toArray());
    //     Farmer::create($request->validated()+['user_id'=>Auth::user()->id,'unique_id'=>Str::isUuid(),]);
    //     toast('Farmer added Successfully','success');
    //     return to_route('admin.farmers.index');
    // }
    public function store(StoreFarmerRequest $request)
    {
        // dd($request->toArray());
        Farmer::create(array_merge(
            $request->validated(),
            [
                'user_id' => Auth::user()->id,
                'unique_id' => Str::random(8), // This generates a unique UUID
            ]
        ));

        toast('Farmer added Successfully', 'success');
        return to_route('admin.farmer.index');
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farmer $farmer)
    {
        return view('admin.farmers.farmer.edit',compact('farmer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFarmerRequest $request, Farmer $farmer)
    {
        $farmer->update($request->validated());
        toast('Farmer updated successfully','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farmer $farmer)
    {
        $farmer->delete();
        toast('Farmer deleted successfully','success');
        return back();
    }
}
