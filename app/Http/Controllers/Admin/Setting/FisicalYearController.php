<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Models\Setting\FisicalYear;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\FisicalYear\StoreFisicalYearRequest;
use App\Http\Requests\Setting\FisicalYear\UpdateFisicalYearRequest;

class FisicalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fisicalYears=FisicalYear::latest()->paginate(5);
        return view('admin.setting.fisicalYear.index',compact('fisicalYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.fisicalYear.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFisicalYearRequest $request)
    {
        FisicalYear::create($request->validated());
        toast('Fisical year added Successfully','success');
        return to_route('admin.fisicalYear.create');
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
    public function edit(FisicalYear $fisicalYear)
    {
        return view('admin.setting.fisicalYear.edit',compact('fisicalYear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFisicalYearRequest $request, FisicalYear $fisicalYear)
    {
        $fisicalYear->update($request->validated());
        toast('Fisical year updated Successfully','success');
        return to_route('admin.fisicalYear.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FisicalYear $fisicalYear)
    {
        $fisicalYear->delete();
        toast('Fisical year deleted Successfully','success');
        return back();
    }
}
