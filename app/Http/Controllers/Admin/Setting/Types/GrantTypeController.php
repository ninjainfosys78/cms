<?php

namespace App\Http\Controllers\Admin\Setting\Types;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Types\Grant\StoreGrantTypeRequest;
use App\Http\Requests\Setting\Types\Grant\UpdateGrantTypeRequest;
use App\Models\Setting\Types\GrantType;
use Illuminate\Http\Request;

class GrantTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grantTypes=GrantType::latest()->paginate(10);
        return view('admin.setting.Types.grantType.index',compact('grantTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.Types.grantType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrantTypeRequest $request)
    {
        GrantType::create($request->validated());
        toast('Grant Type created successfully','success');
        return to_route('admin.grantType.create');
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
    public function edit(GrantType $grantType)
    {
    return view('admin.setting.types.grantType.edit',compact('grantType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrantTypeRequest $request, GrantType $grantType)
    {
        $grantType->update($request->validated());
        toast('Grant Type updated successfully','success');
        return to_route('admin.grantType.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrantType $grantType)
    {
        $grantType->delete();
        toast('Grant Type deleted successfully','success');
        return back();
    }
}
