<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\GrantOffice\StoreGrantOfficeRequest;
use App\Http\Requests\Setting\GrantProgram\StoreGrantProgramRequest;
use App\Http\Requests\Setting\GrantProgram\UpdateGrantProgramRequest;
use App\Models\Setting\GrantProgram;
use Illuminate\Http\Request;

class GrantProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grantPrograms= GrantProgram::latest()->paginate(10);
        return view('admin.setting.grantProgram.index', compact('grantPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.grantProgram.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrantProgramRequest $request)
    {

        GrantProgram::create($request->validated());
        toast('Grant Program created successfully','success');
        return to_route('admin.grantProgram.index');

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
    public function edit(GrantProgram $grantProgram)
    {
        return view('admin.setting.grantProgram.edit',compact('grantProgram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrantProgramRequest $request, GrantProgram $grantProgram)
    {
        $grantProgram->update($request->validated());
        toast('Grant Program updated successfully','success');
        return to_route('admin.grantProgram.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrantProgram $grantProgram)
    {
        $grantProgram->delete();
        toast('Grant Program deleted successfully','success');
        return back();
    }
}
