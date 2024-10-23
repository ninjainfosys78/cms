<?php

namespace App\Http\Controllers\Admin\Grants;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grants\GrantDetail\StoreGrantDetailRequest;
use App\Http\Requests\Grants\GrantDetail\UpdateGrantDetailRequest;
use App\Models\Grants\Grant;
use App\Models\Grants\GrantDetail;
use App\Models\Setting\FisicalYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $modelTypes = [
            'App\Models\Enterprises' => 'Enterprises',
            'App\Models\Farmers' => 'Farmers',
            'App\Models\Cooperatives' => 'Cooperatives',
            'App\Models\Groups' => 'Groups',
        ];

        $modelIds = [];

        if ($request->has('model_type')) {
            $modelType = $request->model_type;

        if (array_key_exists($modelType, $modelTypes)) {
            $modelIds = $modelType::pluck('name', 'id')->toArray(); // Adjust the field as necessary
            }
       }
//  dd($modelTypes);
        return view('admin.grants.grantDetail.create',compact('options','grant','modelTypes','modelIds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrantDetailRequest $request)
    {
        GrantDetail::create($request->validated()+ ['user_id'=>Auth::user()->id]);
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
        //
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
