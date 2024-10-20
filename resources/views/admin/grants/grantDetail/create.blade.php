@extends('layouts.app')
@section('content')
    <div class="container full-container py-5 flex flex-col gap-6">
        <div class="card flex items-center p-5">
            <nav class=" w-full  flex items-center justify-between" aria-label="Global">
                <ul class="icon-nav flex items-center gap-4">
                    <li class="relative xl:hidden">
                        <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                            data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                            aria-label="Toggle navigation" href="javascript:void(0)">
                            <i class="ti ti-menu-2 relative z-1"></i>
                        </a>
                    </li>

                    <li class="relative">
                        <nav class="w-full rounded-md" aria-label="breadcrumb">
                            <ol class="list-reset ms-2 flex">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none ">Home</a>
                                </li>
                                <li>
                                    <span class="mx-2 text-black/60">/</span>
                                </li>
                                <li>
                                    <a href="#"
                                        class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none ">Grant Detail
                                        List</a>
                                </li>
                                <li>
                                    <span class="mx-2 text-black/60">/</span>
                                </li>
                                <li>
                                    <a href="#"
                                        class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none">Data</a>
                                </li>
                            </ol>
                        </nav>
                    </li>
                </ul>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.grant.index') }}"
                        class="btn font-medium bg-blue-600 hover:bg-red-600 py-1 text-white" aria-current="page">Grant Detail List</a>
                </div>
            </nav>
        </div>
        <div class="">
            <div class="flex flex-col gap-6">
                <h6 class="text-lg text-gray-600 font-semibold">Forms</h6>
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form class="flex flex-col gap-6" action="{{route('admin.grantDetail.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.SelectInput
                                type="number"
                                label="Grant"
                                id="grant_id"
                                name="grant_id"
                                placeholder="Enter Grant"
                                :options="$grant"
                                />

                                <!-- Model Type Selection -->
                                    <x-forms.SelectInput
                                    type="text"
                                    label="Model Type"
                                    id="model_type"
                                    name="model_type"
                                    :options="$modelTypes"
                                    onchange="this.form.submit()"
                                />

                                <!-- Model ID Selection -->
                                <x-forms.SelectInput
                                    label="Model"
                                    id="model_id"
                                    name="model_id"
                                    :options="$model_id"
                                    />

                                <x-forms.TextInput
                                 type="number"
                                 label="Personal Investment"
                                 id="personal_investment"
                                 name="personal_investment"
                                 placeholder='Enter personal investment'
                                />

                                <x-forms.SelectInput
                                    label="Previous Fiscal Year "
                                    id="prev_fisical_year_id"
                                    name="prev_fisical_year_id"
                                    placeholder="Enter prev fisical year"
                                    :options="$options"
                                />

                                <x-forms.TextInput
                                    type="number"
                                    label="Investment Amount"
                                    id="investment_amount"
                                    name="investment_amount"
                                    placeholder="Enter investment amount"
                                />

                            </div>

                            <livewire:dependent-dropdown
                            :selectedProvince="$grant->province_id ?? null"
                            :selectedDistrict="$grant->district_id ?? null"
                            :selectedLocalBody="$grant->local_body_id ?? null"
                            />

                            <div class="grid grid-cols-2 gap-4">


                                <x-forms.TextInput
                                type="number"
                                label="Ward"
                                id="ward_no"
                                name="ward_no"
                                placeholder="Enter ward"
                                />

                                <x-forms.TextInput
                                label="Vilage"
                                id="village"
                                name='village'
                                placeholder="Enter village"
                                />

                                <x-forms.TextInput
                                label="Tole"
                                id="tole"
                                name="tole"
                                placeholder="Enter tole"

                                />

                                <x-forms.TextInput
                                label="Kitta No."
                                id="kitta_no"
                                name="kitta_no"
                                placeholder="Enter kitta no."

                                />

                                <x-forms.TextInput
                                label="Contact Person"
                                id="contact_person"
                                name="contact_person"
                                placeholder="Enter contact person"
                                />

                                <x-forms.TextInput
                                label="Contact No."
                                id="contact"
                                name="contact"
                                placeholder="Enter contact"
                                />

                                <x-forms.TextInput
                                label="Remarks"
                                id="remarks"
                                name="remarks"
                                placeholder="Enter remarks"
                                />


                            </div>


                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>






    </div>
@endsection
