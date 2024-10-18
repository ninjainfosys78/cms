<?php

namespace App\Http\Controllers\Admin\Cooperatives;

use Illuminate\Http\Request;
use App\Models\Address\Province;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cooperatives\Cooperative;
use App\Models\Setting\Types\Affiliation;
use App\Models\Setting\Types\CooperativeType;
use App\Http\Requests\Cooperatives\Cooperative\StoreCooperativeRequest;
use App\Http\Requests\Cooperatives\Cooperative\UpdateCooperativeRequest;

class CooperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cooperatives = Cooperative::with('cooperativeType')->get();
        return view('admin.cooperatives.cooperative.index',compact('cooperatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options0 = Affiliation::all();
        $affiliationTypes = $options0->pluck('id')->toArray();
        $options1 = CooperativeType::all();
        $cooperativeTypes = $options1->pluck('title','id')->toArray();
        return view('admin.cooperatives.cooperative.create',compact('cooperativeTypes','affiliationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCooperativeRequest $request)
    {
        // dd($request);
        Cooperative::create($request->validated()+["user_id"=>Auth::user()->id]);
        toast('Cooperative created Successfully','success');
        return back();

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
        $options0 = Affiliation::all();
        $affiliationTypes = $options0->pluck('id')->toArray();
        $options1 = CooperativeType::all();
        $cooperativeTypes = $options1->pluck('title','id')->toArray();
        return view('admin.cooperatives.cooperative.edit',compact('cooperative','cooperativeTypes','affiliationTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCooperativeRequest $request, Cooperative $cooperative)
    {
        //
        $cooperative->update($request->validated());
        toast('Cooperative updated successfully','success');
        return to_route('admin.cooperative.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cooperative $cooperative)
    {
        $cooperative->delete();
        toast('Cooperative updated successfully','success');
        return back();
    }
}
