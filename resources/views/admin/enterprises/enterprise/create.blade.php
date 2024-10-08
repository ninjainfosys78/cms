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
                                        class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none ">Enterprise
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
                    <a href="{{ route('admin.enterprise.index') }}"
                        class="btn font-medium bg-blue-600 hover:bg-red-600 py-1 text-white"
                        aria-current="page">Enterprises</a>
                </div>
            </nav>
        </div>
        <div class="">
            <div class="flex flex-col gap-6">
                <h6 class="text-lg text-gray-600 font-semibold">Forms</h6>
                <div class="card">
                    <div class="card-body">
                        <form class="flex flex-col gap-6" action="{{ route('admin.enterprise.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.TextInput label="Enterprise Name" id="name" name="name"
                                    placeholder="Enter name" />
                                <x-forms.TextInput label="Vat Pan" id="vat_pan" name="vat_pan"
                                    placeholder="Enter vat pan" />
                                <!-- Province Dropdown -->
                                <x-forms.SelectInput label="Province" id="province_id" name="province_id">
                                    <option value="">Select Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </x-forms.SelectInput>

                                <!-- District Dropdown -->
                                <x-forms.SelectInput label="District" id="district_id" name="district_id">
                                    <option value="">Select District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </x-forms.SelectInput>

                                <!-- Local Body Dropdown -->
                                <x-forms.SelectInput label="Local Body" id="localbody_id" name="localbody_id">
                                    <option value="">Select Local Body</option>
                                    @foreach ($localbodies as $localbody)
                                        <option value="{{ $localbody->id }}">{{ $localbody->name }}</option>
                                    @endforeach
                                </x-forms.SelectInput>

                                <x-forms.TextInput label="Ward" id="ward_no" name="ward_no"
                                    placeholder="Enter ward no." />
                                <x-forms.TextInput label="Village " id="village" name="village"
                                    placeholder="Enter Village" />
                                <x-forms.TextInput label="Tole" id="tole" name="tole" placeholder="Enter Tole" />

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
