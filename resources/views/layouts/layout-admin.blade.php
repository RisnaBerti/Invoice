<div class="main-wrapper">
    <!--begin::Header-->
    @include('layouts.partials.header')
    <!--end::Header-->
    <!--begin::Aside-->
    @include('layouts.partials.aside-admin')
    <!--end::Aside-->

    <!--begin::Container-->
    <div class="page-wrapper">
        <div class="content container-fluid">
            @yield('content')
        </div>
    </div>
    <!--end::Container-->

    <!--begin::Footer-->
    @include('layouts.partials.footer')
    <!--end::Footer-->

</div>
<!--end::Main-->
