<?php

namespace App\Http\Controllers\Admin\Cooperatives;

use App\Http\Requests\Cooperatives\Cooperative\StoreCooperativeRequest;
use App\Models\Address\Province;
use App\Models\Address\District;
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
        $options2 = Province::all();
        // $options3 =  District::where('province_id')->get();
        $provinces = $options2->pluck('province','id')->toArray();
        $districts = District::where('province_id', 1)->pluck('district', 'id')->toArray();
        return view('admin.cooperatives.cooperative.create',compact('cooperativeTypes','provinces','districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCooperativeRequest $request)
    {
        Cooperative::create($request->validated());
        toast('Cooperative added Successfully','success');
        return to_route('admin.cooperatives.cooperative.index');
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
