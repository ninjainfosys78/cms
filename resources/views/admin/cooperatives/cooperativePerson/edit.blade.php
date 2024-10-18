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
                                        class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none ">Cooperative Person
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
                    <a href="{{ route('admin.cooperativePerson.index') }}"
                        class="btn font-medium bg-blue-600 hover:bg-red-600 py-1 text-white" aria-current="page">Cooperative Person List</a>
                </div>
            </nav>
        </div>
        <div class="">
            <div class="flex flex-col gap-6">
                <h6 class="text-lg text-gray-600 font-semibold">Forms</h6>
                <div class="card">
                    <div class="card-body">
                        <form class="flex flex-col gap-6" action="{{route('admin.cooperativePerson.update',$cooperativePerson)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.SelectInput
                                    label="Cooperative"
                                    id="cooperative_id"
                                    name="cooperative_id"
                                    :options="$cooperativeTypes"
                                    selected="{{ $cooperativePerson->cooperative_id }}"
                                    />
                                    <x-forms.SelectInput
                                    label="Fisical Year"
                                    id="fisical_year_id"
                                    name="fisical_year_id"
                                    :options="$fisicalYears"
                                    selected="{{ $cooperativePerson->fisical_year_id }}"
                                />
                                <x-forms.TextInput
                                    label="Name"
                                    id="name"
                                    name="name"
                                    placeholder="Enter name"
                                    value="{{ old('name',$cooperativePerson->name) }}"
                                />
                                <x-forms.TextInput
                                    label="Phone"
                                    id="phone"
                                    name="phone"
                                    placeholder="Enter phone"
                                    value="{{ old('phone',$cooperativePerson->phone) }}"
                                />
                                <x-forms.TextInput
                                    label="Email"
                                    id="email"
                                    name="email"
                                    placeholder="Enter email"
                                    value="{{ old('email',$cooperativePerson->email) }}"
                                />
                                <x-forms.TextInput
                                    label="Designation"
                                    id="designation"
                                    name="designation"
                                    placeholder="Enter designation"
                                    value="{{ old('designation',$cooperativePerson->designation) }}"
                                />
                                <x-forms.TextInput
                                    label="Position"
                                    id="position"
                                    name="position"
                                    placeholder="Enter position"
                                    value="{{ old('position',$cooperativePerson->position) }}"
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
