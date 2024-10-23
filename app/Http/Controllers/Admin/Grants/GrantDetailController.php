<?php

namespace App\Http\Controllers\Admin\Grants;

use App\Models\Grants\Grant;
use Illuminate\Http\Request;
use App\Models\Grants\GrantDetail;
use App\Models\Setting\FisicalYear;
use App\Http\Controllers\Controller;
use App\Models\Setting\GrantProgram;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Grants\GrantDetail\StoreGrantDetailRequest;
use App\Http\Requests\Grants\GrantDetail\UpdateGrantDetailRequest;

class GrantDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grantDetails = GrantDetail::all();
        return view('admin.grants.grantDetail.index',compact('grantDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $option= Grant::with('grantProgram')->get();
        $grant= $option->pluck('grantProgram.Program_name','id')->toArray();

        $fisicalYears = FisicalYear::all();
        $options = $fisicalYears->pluck('year','id')->toArray();
        // dd($grant);

        return view('admin.grants.grantDetail.create',compact('options','grant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrantDetailRequest $request)
    {
        GrantDetail::create($request->validated());
        toast('Grant Detail added Successfully','success');
        return to_route('admin.grantDetail.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(GrantDetail $grantDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrantDetail $grantDetail)
    {
        $option= Grant::get();
        $grant= $option->pluck('id')->toArray();

        $fisicalYears = FisicalYear::all();
        $options = $fisicalYears->pluck('year','id')->toArray();
        // dd($grantDetail);
        return view('admin.grants.grantDetail.edit',compact('grantDetail','options','grant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrantDetailRequest $request, GrantDetail $grantDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrantDetail $grantDetail)
    {
        $grantDetail->delete();
        toast('Grant Detail deleted successfully','success');
        return back();
    }
}
