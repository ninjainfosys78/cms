<?php

namespace App\Http\Controllers\Admin\Setting\Types;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Types\Cooperative\StoreCooperativeTypeRequest;
use App\Http\Requests\Setting\Types\Cooperative\UpdateCooperativeTypeRequest;
use App\Models\Setting\Types\CooperativeType;
use Illuminate\Http\Request;

class CooperativeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cooperativeTypes=CooperativeType::latest()->paginate(10);
        return view('admin.setting.types.cooperativeType.index', compact('cooperativeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.types.cooperativeType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCooperativeTypeRequest $request)
    {
        CooperativeType::create($request->validated());
        toast('Cooperative Type created successfully','success');
        return to_route('admin.cooperativeType.create');
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
    public function edit(CooperativeType $cooperativeType)
    {
        return view('admin.setting.types.cooperativeType.edit',compact('cooperativeType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCooperativeTypeRequest $request, CooperativeType $cooperativeType)
    {
        $cooperativeType->update($request->validated());
        toast('Cooperative Type updated successfully','success');
        return to_route('admin.cooperativeType.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CooperativeType $cooperativeType)
    {
        $cooperativeType->delete();
        toast('Cooperative Type deleted successfully','success');
        return back();
    }
}
