@extends('layouts.index-owner')
@section('content')
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-4 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <i class="ki-outline ki-compass fs-2hx text-gray-600"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $user }}</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">User</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                            {{-- <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>100%</span> --}}
                            <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-sm-6 col-xl-4 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <i class="ki-outline ki-abstract-39 fs-2hx text-gray-600"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $pengeluaran_formatted }}</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">Pengeluaran</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">
                            {{-- <i class="ki-outline ki-arrow-down fs-5 text-danger ms-n1"></i>0.47%</span> --}}
                            <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            {{-- <div class="col-sm-6 col-xl-2 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <i class="ki-outline ki-map fs-2hx text-gray-600"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">89M</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">C APEX</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                            <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>2.1%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div> --}}
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-4 mb-5 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <i class="ki-outline ki-abstract-35 fs-2hx text-gray-600"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $pemasukan_formatted }}</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">Pemasukan</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">
                            {{-- <i class="ki-outline ki-arrow-down fs-5 text-danger ms-n1"></i>0.647%</span> --}}
                            <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            {{-- <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <i class="ki-outline ki-abstract-26 fs-2hx text-gray-600"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">106M</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <div class="m-0">
                                <span class="fw-semibold fs-6 text-gray-400">Saving</span>
                            </div>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                            <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>2.1%</span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div> --}}
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
            <div class="col-xl-12 mb-5 mb-xl-10">
                <!--begin::Chart widget 38-->
                <div class="card card-flush h-xl-50 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Grafik Pemasukan</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Perbulan</span>
                        </h3>
                        <div class="me-4">
                            <select class="form-select form-select-solid form-select-sm" id="tahun" name="tahun" onchange="handleYearChange(this)">
                                <option value="">-- Pilih Tahun --</option>
                                @foreach (range(date('Y'), 2018) as $tahun_option)
                                    <option value="{{ $tahun_option }}" {{ $tahun_option == $tahun ? 'selected' : '' }}>{{ $tahun_option }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                        <!--begin::Chart-->
                        <div id="chart">
                            <div id="responsive-chart"></div>
                        </div>
                        <!--end::Chart-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::Chart widget 38-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

    </div>
    <!--end::Content container-->



    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- <script>
        var options = {
            series: [{
                name: 'Pemasukan',
                data: @json($dataNumeric)
            }, {
                name: 'Pengeluaran',
                data: @json($dataNumeric2)
            }],
            chart: {
                type: 'bar',
                height: 600,
                width: 1000,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    columnWidth: '100%',
                    endingShape: 'rounded',
                    dataLabels: {
                        position: 'top'
                    }
                },
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yaxis: {
                title: {
                    text: 'Tahun 2024'
                }
            },
            fill: {
                opacity: 1,
                // colors: ['#008FFB', '#FF4560', '#9C27B0']
            },
            markers: {
                colors: ['#008FFB', '#FF4560', '#9C27B0']
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "Rp. " + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); + " thousands"
                    }
                }
            },
            responsive: [{
                breakpoint: 1000,
                options: {
                    plotOptions: {
                        bar: {
                            horizontal: false
                        }
                    },
                    legend: {
                        position: "bottom"
                    }
                }
            }]
        };


        var chart = new ApexCharts(document.querySelector("#responsive-chart"), options);
        chart.render();
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            chart: {
                type: 'bar',                
                height: '600',
                width: '1000',
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    columnWidth: '100%',
                    endingShape: 'rounded',
                    dataLabels: {
                        position: 'top'
                    }
                },
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Pemasukan',
                data: @json($dataNumeric)
            }, {
                name: 'Pengeluaran',
                data: @json($dataNumeric2)
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov',
                    'Des'
                ] // Mengambil tahun
            },
            yaxis: {
                title: {
                    text: 'Tahun 2024'
                }
            },
            responsive: [{
                breakpoint: 1000,
                options: {
                    plotOptions: {
                        bar: {
                            horizontal: true
                        }
                    },
                    legend: {
                        position: "bottom"
                    }
                }
            }]
        }

        var chart = new ApexCharts(document.querySelector("#responsive-chart"), options);

        chart.render();
    </script>

    <script>
         function handleYearChange(selectObject) {
            var selectedYear = selectObject.value;

            // Fetch updated data based on selectedYear using AJAX (optional) or PHP
            fetch('/getDataForYearOwner/' + selectedYear)
                .then(response => response.json())
                .then(data => {
                    chart.updateSeries([
                        { data: data.dataNumeric },
                        { data: data.dataNumeric2 }
                    ]);
                    chart.updateOptions({
                        xaxis: {
                            categories: data.months
                        },
                        yaxis: {
                            title: {
                                text: 'Tahun ' + selectedYear
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    </script>
@endsection
