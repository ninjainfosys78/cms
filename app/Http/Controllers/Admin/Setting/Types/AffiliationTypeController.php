<?php

namespace App\Http\Controllers\Admin\Setting\Types;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Types\Affilitaion\StoreAffilitationTypeRequest;
use App\Http\Requests\Setting\Types\Affilitaion\UpdateAffilitationTypeRequest;
use App\Models\Setting\Types\AffiliationType;
use Illuminate\Http\Request;

class AffiliationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affiliationTypes = AffiliationType::latest()->paginate(10);
        return view('admin.setting.Types.affiliationType.index',compact('affiliationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.Types.affiliationType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAffilitationTypeRequest $request)
    {
        AffiliationType::create($request->validated());
        toast('Affiliation Type created successfully','success');
        return to_route('admin.affiliationType.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AffiliationType $affiliationType)
    {
        return view('admin.setting.Types.affiliationType.edit',compact('affiliationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAffilitationTypeRequest $request, AffiliationType $affiliationType)
    {
        $affiliationType->update($request->validated());
        toast('Affiliation Type updated successfully','success');
        return to_route('admin.affiliationType.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AffiliationType $affiliationType)
    {
        $affiliationType->delete();
        toast('Affiliation Type deleted successfully','success');
        return back();
    }
}
