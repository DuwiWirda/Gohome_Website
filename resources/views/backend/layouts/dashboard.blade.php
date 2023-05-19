@extends('backend/layouts.main')
@section('container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-15">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Stok Kamar Standard</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-door-open"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>Standard</h6>
                                            <p> <span class="text-success small pt-1 fw-bold">Tersedia:
                                                    {{ $tersediaStandard }} Kamar
                                                    <span class="text-muted small pt-2 ps-1">Terisi:
                                                        {{ $terisiStandard }} Kamar
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Stok Kamar Deluxe</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-door-open"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>Deluxe</h6>
                                            <p> <span class="text-success small pt-1 fw-bold">Tersedia:
                                                    {{ $tersediaDeluxe }} Kamar
                                                    <span class="text-muted small pt-2 ps-1">Terisi:
                                                        {{ $terisiDeluxe }} Kamar
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Stok Kamar Suite</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-door-open"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>Suite</h6>
                                            <p> <span class="text-success small pt-1 fw-bold">Tersedia:
                                                    {{ $tersediaSuite }} Kamar
                                                    <span class="text-muted small pt-2 ps-1">Terisi:
                                                        {{ $terisiSuite }} Kamar
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Grafik Penjualan Tahun 2023</h5>
                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>
                                    <!-- End Line Chart -->
                                </div>
                            </div>
                        </div><!-- End Reports -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@push('js')
    <script>
        var standardData = {!! json_encode($standard) !!};
        var deluxeData = {!! json_encode($deluxe) !!};
        var suiteData = {!! json_encode($suite) !!};
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#reportsChart"), {
                series: [{
                    name: 'Standard',
                    data: Object.values(standardData)
                }, {
                    name: 'Deluxe',
                    data: Object.values(deluxeData)
                }, {
                    name: 'Suite',
                    data: Object.values(suiteData)
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                },
                markers: {
                    size: 4
                },
                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                xaxis: {
                    type: 'time',
                    categories: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                        "September", "Oktober", "November", "Desember"
                    ]
                },

            }).render();
        });
    </script>
@endpush
