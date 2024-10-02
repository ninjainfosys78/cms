<?php

namespace App\Http\Controllers\Admin\Setting\Types;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Types\Enterprise\StoreEnterpriseTypeRequest;
use App\Http\Requests\Setting\Types\Enterprise\UpdateEnterpriseTypeRequest;
use App\Models\Setting\Types\EnterpriseType;
use Illuminate\Http\Request;

class EnterpriseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enterpriseTypes = EnterpriseType::latest()->paginate(10);
        return view('admin.setting.types.enterpriseType.index', compact('enterpriseTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.types.enterpriseType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnterpriseTypeRequest $request)
    {
        EnterpriseType::create($request->validated());
        toast('Enterprise Type created successfully', 'success');
        return to_route('admin.enterpriseType.index');
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
    public function edit(EnterpriseType $enterpriseType)
    {
        return view('admin.setting.types.enterpriseType.edit', compact('enterpriseType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnterpriseTypeRequest $request, EnterpriseType $enterpriseType)
    {
        $enterpriseType->update($request->validated());
        toast('Enterprise Type updated successfully', 'success');
        return to_route('admin.enterpriseType.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnterpriseType $enterpriseType)
    {
        $enterpriseType->delete();
        toast('Enterprise Type deleted successfully', 'success');
        return back();
    }
}
