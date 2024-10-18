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
                    <a href="{{ route('admin.enterprise.create') }}"
                        class="btn font-medium bg-blue-600 hover:bg-red-600 py-2 text-white" aria-current="page">Add New</a>
                </div>
            </nav>
        </div>

        <div class="col-lg-12 overflow-hidden d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Enterprises</h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr class="border border-1">
                                    <th>
                                        <h6 class="fw-semibold mb-0">S.No.</h6>
                                    </th>
                                    <th class="border-right-1">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-right-1">
                                        <h6 class="fw-semibold mb-0">Enterprise Type</h6>
                                    </th>
                                    <th class="border-right-1">
                                        <h6 class="fw-semibold mb-0">Vat Pan</h6>
                                    </th>


                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enterprises as $enterprise)
                                    <tr>
                                        <td class="border-b border-gray-200">
                                            <h6 class=" mb-0">{{ $loop->iteration }}</h6>
                                        </td>
                                        <td class="border-b border-gray-200">
                                            <h6 class=" mb-1">{{ $enterprise->name ?? '' }}</h6>
                                        </td>
                                        <td class="border-b border-gray-200">
                                            <h6 class=" mb-1">{{ $enterprise->enterpriseType->title ?? '' }}</h6>
                                        </td>
                                        <td class="border-b border-gray-200">
                                            <h6 class=" mb-1">{{ $enterprise->vat_pan ?? '' }}</h6>
                                        </td>
                                        <td class="border-b border-gray-200 gap-2 flex">
                                            <a href="{{ route('admin.enterprise.edit', $enterprise) }}"><i
                                                    class="ti ti-edit text-[18px] text-white hover:bg-blue-500 bg-green-500 p-2 rounded-full"></i></a>
                                            <a href=""><i class=""></i></a>


                                            <form action="{{ route('admin.enterprise.destroy', $enterprise) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <i
                                                        class="ti ti-trash ti ti-trash text-[18px] text-white hover:bg-blue-500 bg-red-500 p-2 rounded-full"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        {{-- <div class="mt-4">
                            {{ $fisicalYears->onEachSide(5)->links('vendor.pagination.bootstrap-5') }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
