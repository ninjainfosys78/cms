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
                                        class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none ">Group
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
                    <a href="{{ route('admin.group.index') }}"
                        class="btn font-medium bg-blue-600 hover:bg-red-600 py-1 text-white" aria-current="page">Group Detail</a>
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
                        <form class="flex flex-col gap-6" action="{{route('admin.group.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.TextInput
                                    label="Name"
                                    id="name"
                                    name="name"
                                    placeholder='Enter name'
                                />
                                {{-- <x-forms.TextInput
                                    type="tel"
                                    label="Phone"
                                    id="phone"
                                    name="phone"
                                    placeholder="Enter  phone"
                                /> --}}
                                <x-forms.TextInput
                                    label="Registered Office"
                                    id="registered_office"
                                    name="registered_office"
                                    placeholder="Enter  Office"
                                />
                                <x-forms.TextInput
                                    label="Registered Date"
                                    id="registered_date"
                                    name="registration_date"
                                    type="date"
                                    placeholder="Enter  registered date"
                                />
                                <x-forms.TextInput
                                    label="Monthly Meeting"
                                    id="monthly_meeting"
                                    name="monthly_meeting"
                                    value="{{ old('monthly_meeting') }}"
                                    placeholder="Enter Monthly meeting"
                                />
                                <x-forms.TextInput

                                    label="Vat/Pan"
                                    id="vat_pan"
                                    name="vat_pan"

                                    placeholder="Enter Vat Pan"
                                />
                         </div>
                              @livewire('address',['group' => $group])

                                <x-forms.SelectInput
                                label="Select District"
                                id="district_id"
                                name="district_id"
                                {{-- :options="$options" --}}
                                />

                                <x-forms.SelectInput
                                label="Select Local Body"
                                id="local_body_id"
                                name="local_body_id"
                                {{-- :options="$options" --}}
                                />

                                <x-forms.TextInput
                                type="number"
                                label="Select Ward No."
                                id="ward_no"
                                name="ward_no"/>

                                <x-forms.TextInput
                                label="Vilage"
                                id="village"
                                name='village'
                                placeholder="Enter village Name"
                                />

                                <x-forms.TextInput
                                label="Tole"
                                id="tole"
                                name="tole"
                                />
                                {{-- <x-forms.SelectInput
                                label="Farmer"
                                id="farmers"
                                name="farmers"
                                :options="$farmers"
                                /> --}}

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
