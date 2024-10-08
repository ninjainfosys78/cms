<?php

namespace App\Http\Controllers\Admin\Enterprises;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enterprises\EnterprisePerson\StoreEnterprisePersonRequest;
use App\Http\Requests\Enterprises\EnterprisePerson\UpdateEnterprisePersonRequest;
use App\Models\Enterprises\EnterprisePerson;
use App\Models\Setting\FisicalYear;
use Illuminate\Http\Request;

class EnterprisePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enterprisePeople = EnterprisePerson::all();
        return view('admin.enterprises.enterprisePerson.index',compact('enterprisePeople'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fisicalYears = FisicalYear::all();

        $options = $fisicalYears->pluck('year','id')->toArray();

        return view('admin.enterprises.enterprisePerson.create',compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnterprisePersonRequest $request)
    {
        EnterprisePerson::create($request->validated());
        toast('Enterprise Person added Successfully','success');
        return to_route('admin.enterprisePerson.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(EnterprisePerson $enterprisePerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EnterprisePerson $enterprisePerson)
    {

        $fisicalYears = FisicalYear::all();

        $options = $fisicalYears->pluck('year','id')->toArray();
        return view("admin.enterprises.enterprisePerson.edit",compact('enterprisePerson','options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnterprisePersonRequest $request, EnterprisePerson $enterprisePerson)
    {
        $enterprisePerson->update($request->validated());
        toast('Enterprise Person updated successfully','success');
        return to_route('admin.enterprisePerson.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnterprisePerson $enterprisePerson)
    {
        $enterprisePerson->delete();
        toast('Enterprise Person deleted successfully','success');
        return back();
    }
}
