<?php

namespace App\Http\Controllers\Admin\Grants;

use App\Models\Grants\Grant;
use Illuminate\Http\Request;
use App\Models\Setting\FisicalYear;
use App\Models\Setting\GrantOffice;
use App\Http\Controllers\Controller;
use App\Models\Setting\GrantProgram;
use App\Models\Setting\Types\GrantType;
use App\Http\Requests\Grants\Grant\StoreGrantRequest;
use App\Http\Requests\Grants\Grant\UpdateGrantRequest;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grants = Grant::with('grantType','grantProgram')->get();
        return view('admin.grants.grant.index',compact('grants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option1 = FisicalYear::latest()->get();
        $fisicalYears = $option1->pluck('year','id')->toArray();
        $option2 = GrantType::latest()->get();
        $grantTypes = $option2->pluck('title','id')->toArray();
        $option3 = GrantOffice::latest()->get();
        $grantOffice = $option3->pluck('office_name','id')->toArray();
        $option4 = GrantProgram::latest()->get();
        $grantProgram = $option4->pluck('Program_name','id')->toArray();
        return view('admin.grants.grant.create',compact('fisicalYears','grantTypes','grantOffice','grantProgram'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrantRequest $request)
    {
        // dd($request->toArray());
        Grant::create($request->validated());
        toast('Grant created Successfully','success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Grant $grant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        $option1 = FisicalYear::latest()->get();
        $fisicalYears = $option1->pluck('year','id')->toArray();
        $option2 = GrantType::latest()->get();
        $grantTypes = $option2->pluck('title','id')->toArray();
        $option3 = GrantOffice::latest()->get();
        $grantOffice = $option3->pluck('office_name','id')->toArray();
        $option4 = GrantProgram::latest()->get();
        $grantProgram = $option4->pluck('Program_name','id')->toArray();
        return view('admin.grants.grant.edit',compact('fisicalYears','grantTypes','grantOffice','grantProgram','grant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrantRequest $request, Grant $grant)
    {
        $grant->update($request->validated());
        toast('Grant updated Successfully','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        $grant->delete();
        toast('Grant deleted Successfully','success');
    }
}
