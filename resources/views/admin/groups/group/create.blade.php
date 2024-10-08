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
                        <form class="flex flex-col gap-6" action="{{route('admin.group.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">

                                <x-forms.TextInput
                                    label="Name"
                                    id="name"
                                    name="name"
                                    placeholder="Enter  name"
                                />
                                <x-forms.TextInput
                                    type="tel"
                                    label="Phone"
                                    id="phone"
                                    name="phone"
                                    placeholder="Enter  phone"
                                />

                                <x-forms.TextInput
                                    type="date"
                                    label="Registered Date"
                                    id="registered_date"
                                    name="registered_date"
                                    placeholder="Enter  Date"
                                />

                                <x-forms.TextInput
                                    label="Registered Office"
                                    id="registered_office"
                                    name="registered_office"
                                    placeholder="Enter  office  name"
                                />

                                <x-forms.TextInput
                                    label="Monthly Meeting"
                                    id="monthly_meeting"
                                    name="monthly_meeting"
                                    placeholder="Enter  monthly meeting"
                                />

                                <x-forms.TextInput
                                    type="number"
                                    label="Vat Pan"
                                    id="vat_pan"
                                    name="vat_pan"
                                    placeholder="Enter  vat pan"
                                />

                                <x-forms.SelectInput
                                label="Select Province"
                                id="province_id"
                                name="province_id"
                                {{-- :options="$options" --}}
                                />

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
                                label="Ward No."
                                id="ward_no"
                                name="ward_no"
                                min="1"
                                max="100"
                                />

                                <x-forms.TextInput
                                label="Village"
                                id="village"
                                name="village"
                                />

                                <x-forms.TextInput
                                label="Tole"
                                id="tole"
                                name="tole"
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
