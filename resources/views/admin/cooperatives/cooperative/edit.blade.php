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
                                       class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none ">Cooperative
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
                    <a href="{{ route('admin.fisicalYear.index') }}"
                       class="btn font-medium bg-blue-600 hover:bg-red-600 py-1 text-white" aria-current="page">Cooperative
                        List</a>
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
                        <form class="flex flex-col gap-6" action="{{route('admin.fisicalYear.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.TextInput
                                    label="Name"
                                    id="name"
                                    name="name"
                                    placeholder="Enter cooperative name"
                                    value="{{ old('name',$cooperative->name) }}"
                                />
                                {{-- {{ $cooperative->cooperative_type_id }} --}}
                                <x-forms.SelectInput
                                    label="Cooperative Type"
                                    id="cooperative_type_id"
                                    name="cooperative_type_id"
                                    :options="$cooperativeTypes"
                                    selected="{{ $cooperative->cooperative_type_id }}"
                                />
                                <x-forms.TextInput
                                    label="Registration Number"
                                    id="registration_no"
                                    name="registration_no"
                                    placeholder="Enter registration no"
                                    value="{{ old('name',$cooperative->registration_no) }}"
                                />
                                <x-forms.TextInput
                                    label="Registration Date"
                                    id="registration_date"
                                    name="registration_date"
                                    placeholder="Enter registration date"
                                    value="{{ old('name',$cooperative->registration_date) }}"
                                />
                                <x-forms.TextInput
                                    label="Vat/Pan"
                                    id="vat_pan"
                                    name="vat_pan"
                                    placeholder="Enter vat/pan"
                                    value="{{ old('name',$cooperative->vat_pan) }}"
                                />
                                <x-forms.TextInput
                                    label="Objective"
                                    id="objective"
                                    name="objective"
                                    placeholder="Enter objective"
                                    value="{{ old('name',$cooperative->objective) }}"
                                />
                                <x-forms.TextInput
                                    label="Affiliation ID"
                                    id="affiliation_id"
                                    name="affiliation_id"
                                    placeholder="Enter affiliation id"
                                    value="{{ old('name',$cooperative->affiliation_id) }}"
                                />

                                <livewire:dependent-dropdown
                                    :selectedProvince="$cooperative->province_id ?? null"
                                    :selectedDistrict="$cooperative->district_id ?? null"
                                    :selectedLocalBody="$cooperative->local_body_id ?? null"
                                />
                                {{-- @livewire('dependent-dropdown') --}}
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
