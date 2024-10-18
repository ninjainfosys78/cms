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
                                        class="motion-reduce:transition-none-none text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition motion-reduce:transition-none ">Grant
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
                        class="btn font-medium bg-blue-600 hover:bg-red-600 py-1 text-white" aria-current="page">Grant List</a>
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
                        <form class="flex flex-col gap-6" action="{{route('admin.grant.update',$grant)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.SelectInput
                                    label="Fisical Year"
                                    id="fisical_year_id"
                                    name="fisical_year_id"
                                    :options="$fisicalYears"
                                    selected="{{ $grant->fisical_year_id }}"
                                />
                                <x-forms.SelectInput
                                    label="Grant Type"
                                    id="grant_type_id"
                                    name="grant_type_id"
                                    :options="$grantTypes"
                                    selected="{{ $grant->grant_type_id }}"
                                    />
                                    <x-forms.SelectInput
                                    label="Grant Office"
                                    id="grant_office_id"
                                    name="grant_office_id"
                                    :options="$grantOffice"
                                    selected="{{ $grant->grant_office_id }}"
                                    />
                                    <x-forms.SelectInput
                                    label="Grant Program"
                                    id="grant_program_id"
                                    name="grant_program_id"
                                    :options="$grantProgram"
                                    selected="{{ $grant->grant_program_id }}"
                                />
                                <x-forms.TextInput
                                    label="Grant amount"
                                    {{-- type="number" --}}
                                    id="grant_amount"
                                    name="grant_amount"
                                    placeholder="Enter grant amount"
                                    value="{{ old('grant_amount',$grant->grant_amount) }}"
                                />
                                <x-forms.TextInput
                                    label="Grant for"
                                    id="grant_for"
                                    name="grant_for"
                                    placeholder="Enter name"
                                    value="{{ old('grant_for',$grant->grant_for) }}"
                                />
                                <x-forms.TextInput
                                    label="Other"
                                    id="other"
                                    name="other"
                                    placeholder='other'
                                    value="{{ old('grant_for',$grant->other) }}"
                                />

                                <x-forms.TextInput
                                    label="Main activity"
                                    id="main_activity"
                                    name="main_activity"
                                    placeholder="Enter main activity"
                                    value="{{ old('main_activity',$grant->main_activity) }}"
                                />
                                <x-forms.TextInput
                                    label="Remarks"
                                    id="remarks"
                                    name="remarks"
                                    placeholder="Enter remarks"
                                    value="{{ old('remarks',$grant->remarks) }}"
                                />
                            </div>
                            {{-- <div class="">
                                <livewire:DependentDropdown />
                            </div> --}}
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
