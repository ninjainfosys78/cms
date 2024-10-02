<?php

namespace App\Http\Controllers\Admin\Enterprises;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enterprises\EnterprisePerson\StoreEnterprisePersonRequest;
use App\Models\Enterprises\EnterprisePerson;
use Illuminate\Http\Request;

class EnterprisePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enterprisePersons = EnterprisePerson::all();
        return view('admin.enterprises.enterprisePerson.index',compact('enterprisePersons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.enterprises.enterprisePerson.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EnterprisePerson $enterprisePerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnterprisePerson $enterprisePerson)
    {
        //
    }
}
