<?php

namespace App\Http\Controllers\Admin\Setting\Types;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting\Types\Affiliation;
use App\Http\Requests\Setting\Types\Affilitaion\StoreAffilitationRequest;
use App\Http\Requests\Setting\Types\Affilitaion\UpdateAffilitationRequest;

class AffiliationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affiliations = Affiliation::latest()->paginate(10);
        return view('admin.setting.Types.affiliation.index',compact('affiliations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.Types.affiliation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAffilitationRequest $request)
    {
        // dd($request);
        Affiliation::create($request->validated());
        toast('Affiliationcreated successfully','success');
        return to_route('admin.affiliation.create');
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
    public function edit(Affiliation $affiliation)
    {
        return view('admin.setting.Types.affiliation.edit',compact('affiliation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAffilitationRequest $request, Affiliation $affiliation)
    {
        $affiliation->update($request->validated());
        toast('Affiliation  updated successfully','success');
        return to_route('admin.affiliation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Affiliation $affiliation)
    {
        $affiliation->delete();
        toast('Affiliation  deleted successfully','success');
        return back();
    }
}
