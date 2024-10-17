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
                                        class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none ">Enterprise Person
                                        Edit</a>
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
                    <a href="{{ route('admin.fisicalYear.index') }}"
                        class="btn font-medium bg-blue-600 hover:bg-red-600 py-1 text-white" aria-current="page">Enterprise Person List</a>
                </div>
            </nav>
        </div>
        <div class="">
            <div class="flex flex-col gap-6">
                <h6 class="text-lg text-gray-600 font-semibold">Forms</h6>
                <div class="card">
                    <div class="card-body">
                        <form class="flex flex-col gap-6" action="{{route('admin.group.update', $group)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.TextInput
                                    label="Name"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $group->name) }}"
                                    placeholder='Enter name'
                                />
                                {{-- <x-forms.TextInput
                                    type="tel"
                                    label="Phone"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone', $group->phone) }}"
                                    placeholder="Enter phone"
                                /> --}}
                                <x-forms.TextInput
                                    label="Registered Office"
                                    id="registered_office"
                                    name="registered_office"
                                    value="{{ old('registered_office', $group->registered_office) }}"
                                    placeholder="Enter Office"
                                />
                                <x-forms.TextInput
                                    label="Registered Date"
                                    id="registered_date"
                                    name="registration_date"
                                    type="date"
                                    value="{{ old('registration_date', $group->registration_date) }}"
                                    placeholder="Enter registered date"
                                />
                                <x-forms.TextInput
                                    label="Monthly Meeting"
                                    id="monthly_meeting"
                                    name="monthly_meeting"
                                    value="{{ old('monthly_meeting', $group->monthly_meeting) }}"
                                    placeholder="Enter Monthly meeting"
                                />
                                <x-forms.TextInput
                                    label="Vat/Pan"
                                    id="vat_pan"
                                    name="vat_pan"
                                    value="{{ old('vat_pan', $group->vat_pan) }}"
                                    placeholder="Enter Vat Pan"
                                />
                            </div>

                            @livewire('address')

                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.TextInput
                                    label="Ward No."
                                    type='number'
                                    id="ward_no"
                                    name="ward_no"
                                    value="{{ old('ward_no', $group->ward_no) }}"
                                />
                                <x-forms.TextInput
                                    label="Village Name"
                                    id="village"
                                    name='village'
                                    value="{{ old('village', $group->village) }}"
                                    placeholder="Enter village Name"
                                />
                                <x-forms.TextInput
                                    label="Tole"
                                    id="tole"
                                    name="tole"
                                    value="{{ old('tole', $group->tole) }}"
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
