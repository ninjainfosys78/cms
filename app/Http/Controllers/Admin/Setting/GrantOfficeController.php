<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\GrantOffice\StoreGrantOfficeRequest;
use App\Http\Requests\Setting\GrantOffice\UpdateGrantOfficeRequest;
use App\Models\Setting\GrantOffice;
use Illuminate\Http\Request;

class GrantOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grantOffices = GrantOffice::latest()->paginate(5);
        return view('admin.setting.grantOffice.index',compact('grantOffices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.grantOffice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrantOfficeRequest $request)
    {
        GrantOffice::create($request->validated());
        toast('Grant Office created successfully','success');
        return to_route('admin.grantOffice.index');
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
    public function edit(GrantOffice $grantOffice)
    {
        return view('admin.setting.grantOffice.edit',compact('grantOffice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrantOfficeRequest $request, GrantOffice $grantOffice)
    {
        $grantOffice->update($request->validated());
        toast('Grant Office updated successfully','success');
        return to_route('admin.grantOffice.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrantOffice $grantOffice)
    {
        $grantOffice->delete();
        toast('Grant Office deleted successfully','success');
        return back();
    }
}
