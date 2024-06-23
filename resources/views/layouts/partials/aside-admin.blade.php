<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Wrapper-->
    <div id="kt_app_sidebar_wrapper" class="app-sidebar-wrapper hover-scroll-y my-5 my-lg-2" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_sidebar_wrapper"
        data-kt-scroll-offset="5px">
        <!--begin::Sidebar menu-->
        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
            class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary px-6 mb-5">
            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link" href="{{ url('/admin') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-home-2 fs-2"></i>
                    </span>
                    <span class="menu-title">Dashboards</span>
                    {{-- <span class="menu-arrow"></span> --}}
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-outline ki-financial-schedule fs-2"></i>
                    </span>
                    <span class="menu-title">Pemasukan</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('/pemasukan-admin') }}"
                            title="Check out over 200 in-house components" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon">
                                <i class="ki-outline ki-dollar fs-2"></i>
                            </span>
                            <span class="menu-title">Data Pemasukan</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('laporan-pemasukan-admin') }}"
                            title="Check out the complete documentation" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            {{-- <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span> --}}
                            <span class="menu-icon">
                                <i class="ki-outline ki-key fs-2"></i>
                            </span>
                            <span class="menu-title">Laporan Pemasukan</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-outline ki-wallet dollar fs-2"></i>
                    </span>
                    <span class="menu-title">Pengeluaran</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('/pengeluaran-admin') }}"
                            title="Check out over 200 in-house components" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon">
                                <i class="ki-outline ki-wallet dollar fs-2"></i>
                            </span>
                            <span class="menu-title">Data Pengeluaran</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('laporan-harian-pengeluaran-admin') }}"
                            title="Check out the complete documentation" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            {{-- <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span> --}}
                            <span class="menu-icon">
                                <i class="ki-outline ki-key fs-2"></i>
                            </span>
                            <span class="menu-title">Laporan Pengeluaran</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link" href="{{ url('/mitra-admin') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-profile-user fs-2"></i>
                    </span>
                    <span class="menu-title">Mitra</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link" href="{{ url('/produk-admin') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-profile-user fs-2"></i>
                    </span>
                    <span class="menu-title">Produk</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

             <!--begin:Menu item-->
             <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="menu-link" href="{{ url('laporan-admin-harian') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-profile-user fs-2"></i>
                    </span>
                    <span class="menu-title">Laporan Pendapatan Harian</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-outline ki-financial-schedule fs-2"></i>
                    </span>
                    <span class="menu-title">Laporan</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('laporan-admin-harian') }}"
                            title="Check out over 200 in-house components" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon">
                                <i class="ki-outline ki-user-edit fs-2"></i>
                            </span>
                            <span class="menu-title">Laporan Harian</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('laporan-laba-rugi-admin') }}"
                            title="Check out the complete documentation" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-icon">
                                <i class="ki-outline ki-key fs-2"></i>
                            </span>
                            <span class="menu-title">Laporan Laba Rugi</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-outline ki-setting-2 fs-2"></i>
                    </span>
                    <span class="menu-title">Pengaturan</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('setting-admin') }}"
                            title="Check out the complete documentation" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            {{-- <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span> --}}
                            <span class="menu-icon">
                                <i class="ki-outline ki-key fs-2"></i>
                            </span>
                            <span class="menu-title">Profil</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->

            <!--begin::Separator-->
            <div class="app-sidebar-separator separator mx-5 mt-2 mb-2"></div>
            <!--end::Separator-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a href="{{ url('/logout') }}" id="logoutButton" class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-outline ki-exit-right fs-1"></i>
                    </span>
                    <span class="menu-title">Keluar</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

        </div>
        <!--end::Sidebar menu-->

    </div>
    <!--end::Wrapper-->
</div>
<!--end::Sidebar-->
