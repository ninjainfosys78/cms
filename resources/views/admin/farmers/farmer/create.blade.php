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
                                        class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none ">Farmers List</a>
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
                    <a href="{{ route('admin.farmer.index') }}"
                        class="btn font-medium bg-blue-600 hover:bg-red-600 py-1 text-white" aria-current="page">Farmers List</a>
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
                        <form class="flex flex-col gap-6" action="{{route('admin.farmer.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.TextInput
                                    label="First Name"
                                    id="first_name"
                                    name="first_name"
                                    placeholder="Enter first name"
                                />
                                <x-forms.TextInput
                                    label="Middle Name"
                                    id="middle_name"
                                    name="middle_name"
                                    placeholder="Enter last name"
                                />
                                <x-forms.TextInput
                                    label="Last Name"
                                    id="last_name"
                                    name="last_name"
                                    placeholder="Enter last name"
                                />
                                <x-forms.PhotoInput
                                label="Photo"
                                id="photo"
                                name="photo"
                                />
                                <x-forms.SelectInput
                                    label="Gender"
                                    id="gender"
                                    name="gender"
                                    :options="\App\Enums\Gender::cases()"
                                />

                                <x-forms.SelectInput
                                    label="Relationship Status"
                                    id="relationship_status"
                                    name="relationship_status"
                                    :options="\App\Enums\RelationshipStatus::cases()"
                                />
                                <x-forms.TextInput
                                    label="Spouse Name"
                                    id="spouse_name"
                                    name="spouse_name"
                                    placeholder="Enter spouse name"
                                />
                                <x-forms.TextInput
                                    label="Father Name"
                                    id="father_name"
                                    name="father_name"
                                    placeholder="Enter Father name"
                                />
                                <x-forms.TextInput
                                    label="Grandfather Name"
                                    id="grandfather_name"
                                    name="grandfather_name"
                                    placeholder="Enter Grandfather name"
                                /><x-forms.TextInput
                                    label="Citizenship Number"
                                    id="citizenship_no"
                                    name="citizenship_no"
                                    placeholder="Enter citizenship number"
                                />
                                <x-forms.TextInput
                                    label="Farmer ID Card Number"
                                    id="farmer_id_card_no"
                                    name="farmer_id_card_no"
                                    placeholder="Enter id card number"
                                />
                                <x-forms.TextInput
                                    label="National ID Card Number"
                                    id="national_id_card_no"
                                    name="national_id_card_no"
                                    placeholder="Enter national id card number"
                                />
                                <x-forms.TextInput
                                    label="Phone Number"
                                    id="phone_no"
                                    name="phone_no"
                                    placeholder="Enter Phone number"
                                />

                                <livewire:dependent-dropdown
                                />

                                <x-forms.TextInput
                                    label="Ward No"
                                    id="ward_no"
                                    type="number"
                                    min='1'
                                    name="ward_no"
                                    placeholder="Enter Ward No"
                                />
                                <x-forms.TextInput
                                    label="Village"
                                    id="village"
                                    name="village"
                                    placeholder="Enter Village"
                                />
                                <x-forms.TextInput
                                    label="Tole"
                                    id="tole"
                                    name="tole"
                                    placeholder="Enter tole"
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
