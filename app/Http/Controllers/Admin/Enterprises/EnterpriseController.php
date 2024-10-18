<?php

namespace App\Http\Controllers\Admin\Enterprises;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Enterprises\Enterprise;
use App\Models\Setting\Types\EnterpriseType;
use App\Http\Requests\Enterprises\Enterprise\StoreEnterpriseRequest;
use App\Http\Requests\Enterprises\EnterprisePerson\UpdateEnterpriseRequest;
use App\Http\Requests\Setting\Types\Enterprise\UpdateEnterpriseTypeRequest;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enterprises = Enterprise::with('enterpriseType')->get();
        return view('admin.enterprises.enterprise.index',compact('enterprises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options = EnterpriseType::all();
        $enterpriseTypes = $options->pluck('title','id')->toArray();
        return view('admin.enterprises.enterprise.create',compact('enterpriseTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnterpriseRequest $request)
    {
        Enterprise::create($request->validated()+["user_id"=>Auth::user()->id]);
        toast('Enterprise added Successfully','success');
        return to_route('admin.enterprise.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enterprise $enterprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enterprise $enterprise)
    {
        $options = EnterpriseType::all();
        $enterpriseTypes = $options->pluck('title','id')->toArray();
        return view('admin.enterprises.enterprise.edit',compact('enterpriseTypes','enterprise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnterpriseRequest $request, Enterprise $enterprise)
    {
        $enterprise->update($request->validated());
        toast('Enterprise updated successfully','success');
        return to_route('admin.enterprise.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enterprise $enterprise)
    {
        $enterprise->delete();
        toast('Enterprise deleted successfully','success');
        return back();
    }
}
