<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center space-x-2">
                <img src="{{ asset('assets/backend/logo/logo.svg') }}" class="h-10 w-10" alt="Logo" />
                <h1 class="text-xl font-bold">CMS-Madhesh</h1>
            </a>
            <div class="close-btn xl:hidden block cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x text-lg"></i>
            </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">UI COMPONENTS</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Buttons</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link flex justify-between items-center cursor-pointer" aria-expanded="false"
                        onclick="toggleDropdown('enterprisesDropdown')">
                        <span class="flex items-center">
                            <i class="ti ti-building"></i>
                            <span class="hide-menu ml-2">Enterprises</span>
                        </span>
                        <i class="ti ti-chevron-down"></i>
                    </a>

                    <!-- Enterprise Dropdown -->
                    <ul id="enterprisesDropdown" class="ml-6 mt-2 space-y-2 hidden">

                     <li>
                            <a class="sidebar-link" href="{{ route('admin.enterprise.index') }}">
                                <i class="ti ti-building"></i> <span>Enterprise</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.enterprisePerson.index') }}">
                                <i class="ti ti-user"></i> <span>Enterprise Person</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link flex justify-between items-center cursor-pointer" aria-expanded="false"
                        onclick="toggleDropdown('cooperativesDropdown')">
                        <span class="flex items-center">
                            <i class="ti ti-heart-handshake"></i>
                            <span class="hide-menu ml-2">Cooperatives</span>
                        </span>
                        <i class="ti ti-chevron-down"></i>
                    </a>

                    <!-- Enterprise Dropdown -->
                    <ul id="cooperativesDropdown" class="ml-6 mt-2 space-y-2 hidden">

                     <li>
                            <a class="sidebar-link" href="{{ route('admin.cooperative.index') }}">
                                <i class="ti ti-building"></i> <span>Cooperative</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.cooperativePerson.index') }}">
                                <i class="ti ti-user"></i> <span>Cooperative Person</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-cards"></i>
                        </span>
                        <i class="ti ti-chevron-down"></i>
                    </a>

                    <!-- Groups Dropdown -->
                    <ul id="groupsDropdown" class="ml-6 mt-2 space-y-2 hidden">

                     <li>
                            <a class="sidebar-link" href="{{ route('admin.group.index') }}">
                                <i class="ti ti-building"></i> <span>Group</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.groupPerson.index') }}">
                                <i class="ti ti-user"></i> <span>Group Person</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- Farmers Dropdown Menu -->
                <li class="sidebar-item">
                    <a class="sidebar-link flex justify-between items-center cursor-pointer" href="{{ route('admin.farmer.index') }}" aria-expanded="false">
                        <span class="flex items-center">
                            <i class="ti ti-user"></i>
                            <span class="hide-menu ml-2">Farmer</span>
                        </span>
                    </a>
                    {{-- <ul id="farmersDropdown" class="ml-6 mt-2 space-y-2 hidden">
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.farmerCooperatives.index') }}">
                                <i class="ti ti-user"></i> <span>Farmer</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.farmerCooperatives.index') }}">
                                <i class="ti ti-heart-handshake"></i> <span>Farmer Cooperatives</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.grantOffice.index') }}">
                                <i class="ti ti-file-settings"></i> <span>Farmer Detail</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.grantProgram.index') }}">
                                <i class="ti ti-building"></i> <span>Farmer Enterprises</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.grantProgram.index') }}">
                                <i class="ti ti-users"></i> <span>Farmer Groups</span>
                            </a>
                        </li>
                    </ul> --}}
                </li>


                <!-- Settings Dropdown Menu -->
                <li class="sidebar-item">
                    <a class="sidebar-link flex justify-between items-center cursor-pointer" aria-expanded="false"
                        onclick="toggleDropdown('settingsDropdown')">
                        <span class="flex items-center">
                            <i class="ti ti-settings"></i>
                            <span class="hide-menu ml-2">Settings</span>
                        </span>
                        <i class="ti ti-chevron-down"></i>
                    </a>

                    <!-- Fisical Year Dropdown -->
                    <ul id="settingsDropdown" class="ml-6 mt-2 space-y-2 hidden">
                        <li>
                            <a class="sidebar-link flex justify-between items-center cursor-pointer"
                                aria-expanded="false" onclick="toggleDropdown('typesDropdown')">
                                <span class="flex items-center">
                                    <i class="ti ti-file-typography"></i>
                                    <span class="hide-menu ml-2">Types</span>
                                </span>
                                <i class="ti ti-chevron-down"></i>
                            </a>
                            <ul id="typesDropdown" class="ml-6 mt-2 space-y-2 hidden">
                                <li>
                                    <a class="sidebar-link" href="{{ route('admin.affiliationType.index') }}">
                                        <i class="ti ti-affiliate"></i> <span>Affiliation Type</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidebar-link" href="{{ route('admin.cooperativeType.index') }}">
                                        <i class="ti ti-heart-handshake"></i> <span>Cooperative Type</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidebar-link" href="{{ route('admin.enterpriseType.index') }}">
                                        <i class="ti ti-building"></i> <span>Enterprises Type</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sidebar-link" href="{{ route('admin.grantType.index') }}">
                                        <i class="ti ti-growth"></i> <span>Grant Type</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.fisicalYear.index') }}">
                                <i class="ti ti-calendar"></i> <span>Fisical Year</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.grantOffice.index') }}">
                                <i class="ti ti-building"></i> <span>Grant Office</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="{{ route('admin.grantProgram.index') }}">
                                <i class="ti ti-brand-bunpo"></i> <span>Grant Programs</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUTH</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-login"></i>
                        </span>
                        <span class="hide-menu">Login</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Register</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">EXTRA</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-mood-happy"></i>
                        </span>
                        <span class="hide-menu">Icons</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Sample Page</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<script>
    function toggleDropdown(id) {
        var element = document.getElementById(id);
        element.classList.toggle('hidden');
    }
</script>
