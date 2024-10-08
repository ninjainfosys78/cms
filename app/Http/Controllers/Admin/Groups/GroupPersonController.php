<?php

namespace App\Http\Controllers\Admin\Groups;

use App\Http\Controllers\Controller;
use App\Http\Requests\Groups\GroupPerson\StoreGroupPersonRequest;
use App\Http\Requests\Groups\GroupPerson\UpdateGroupPersonRequest;
use App\Models\Groups\Group;
use App\Models\Groups\GroupPerson;
use App\Models\Setting\FisicalYear;
use Illuminate\Http\Request;

class GroupPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupPeople = GroupPerson::all();
        return view('admin.groups.groupPerson.index',compact('groupPeople'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fisicalYears = FisicalYear::all();
        $options = $fisicalYears->pluck('year','id')->toArray();
        $groups = Group::all();
        $groupOptions = $groups->pluck('name','id')->toArray();

        return view('admin.groups.groupPerson.create',compact('options','groupOptions'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupPersonRequest $request)
    {
        GroupPerson::create($request->validated());
        toast('Group Person added Successfully','success');
        return to_route('admin.groupPerson.create');


    }

    /**
     * Display the specified resource.
     */
    public function show(GroupPerson $groupPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupPerson $groupPerson)
    {
        $fisicalYears = FisicalYear::all();
        $options = $fisicalYears->pluck('year','id')->toArray();
        $groups = Group::all();
        $groupOptions = $groups->pluck('name','id')->toArray();

        return view('admin.groups.groupPerson.edit',compact('groupPerson','options','groupOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupPersonRequest $request, GroupPerson $groupPerson)
    {
        $groupPerson->update($request->validated());
        toast('Group Person updated Successfully','success');

        return view('admin.groups.groupPerson.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupPerson $groupPerson)
    {
        $groupPerson->delete();
        toast('Group Person deleted Successfully','success');
        return back();
    }
}
