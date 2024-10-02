<?php

namespace App\Http\Controllers\Admin\Enterprises;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enterprises\Enterprise\StoreEnterpriseRequest;
use App\Models\Enterprises\Enterprise;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enterprises = Enterprise::all();
        return view('admin.enterprises.enterprise.index',compact('enterprises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.enterprises.enterprise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnterpriseRequest $request)
    {
        Enterprise::create($request->validated());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enterprise $enterprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enterprise $enterprise)
    {
        //
    }
}
