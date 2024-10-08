<?php

namespace App\Http\Controllers\Admin\Cooperatives;

use Illuminate\Http\Request;
use App\Models\Setting\FisicalYear;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use App\Models\Cooperatives\Cooperative;
use App\Models\Setting\Types\CooperativeType;
use App\Models\Cooperatives\CooperativePerson;
use App\Http\Requests\Cooperatives\CooperativePerson\StoreCooperativePersonRequest;
use App\Http\Requests\Cooperatives\CooperativePerson\UpdateCooperativePersonRequest;

class CooperativePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cooperativePeople = CooperativePerson::all();
        return view('admin.cooperatives.cooperativePerson.index',compact('cooperativePeople'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options1 = Cooperative::all();
        $cooperatives = $options1->pluck('title','id')->toArray();

        $years = FisicalYear::all();
        $fisicalYears = $years->pluck('year','id')->toArray();
        // dd($fisicalYears);
        return view('admin.cooperatives.cooperativePerson.create',compact('cooperatives','fisicalYears'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCooperativePersonRequest $request)
    {
        // dd($request->toArray());
        CooperativePerson::create($request->validated());
        toast('Cooperative person created Successfully','success');
        return to_route('admin.cooperativePerson.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CooperativePerson $cooperativePerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CooperativePerson $cooperativePerson)
    {
        $years = FisicalYear::all();
        $fisicalYears = $years->pluck('year','id')->toArray();
        return view('admin.cooperatives.cooperativePerson.edit',compact('cooperativePerson','fisicalYears'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCooperativePersonRequest $request, CooperativePerson $cooperativePerson)
    {
        $cooperativePerson->update($request->validated());
        toast('Cooperative Person updated Successfully','success');
        to_route('admin.cooperativePerson.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CooperativePerson $cooperativePerson)
    {
        //
    }
}
