<?php

namespace App\Http\Controllers\Admin\Groups;

use App\Models\Groups\Group;
use Illuminate\Http\Request;
use App\Models\Farmers\Farmer;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\LocalBody;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Groups\Group\StoreGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::latest()->paginate(10);
        return view('admin.groups.group.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $options= Farmer::all();
        // $farmers= $options->pluck('first_name')->toArray();
        return view('admin.groups.group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        Group::create($request->validated()+ ['user_id'=>Auth::user()->id]);
        toast('Group added Successfully','success');
        return to_route('admin.group.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        // Retrieve necessary data for the form
        $provinces = Province::all(); // Adjust as per your setup
        $districts = District::where('province_id', $group->province_id)->get(); // Adjust to filter by selected province
        $localBodies = LocalBody::where('district_id', $group->district_id)->get(); // Adjust to filter by selected district

        // Pass the $group and other data to the view
        return view('admin.groups.group.edit', compact('group', 'provinces', 'districts', 'localBodies'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
