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
        <!-- Stok Deluxe -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Stok Kamar Deluxe</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-door-open"></i>
                </div>
                <div class="ps-3">
                <h6>Deluxe</h6>
                <span class="text-success small pt-1 fw-bold">Tersedia : 50 Kamar</span>
                  <span class="text-muted small pt-2 ps-1">Terjual 100 kamar</span>

                </div>
              </div>
            </div>
          </div>
        </div><!-- End Stok Deluxe -->
        <!-- Stok Superior -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Stok Kamar Superior</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-door-open"></i>
                </div>
                <div class="ps-3">
                <h6>Superior</h6>
                <span class="text-success small pt-1 fw-bold">Tersedia : 25 Kamar</span>
                <span class="text-muted small pt-2 ps-1">Terjual 150 kamar</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Stok Superior-->
        <!-- Stok Sweet -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Stok Kamar Suite</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-door-open"></i>
                </div>
                <div class="ps-3">
                <h6>Suite</h6>
                <span class="text-success small pt-1 fw-bold">Tersedia : 80 Kamar</span>
                <span class="text-muted small pt-2 ps-1">Terjual 100 kamar</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Stok Superior-->
        <!-- Reports -->
        <div class="col-12">
          <div class="card">

            

            <div class="card-body">
              <h5 class="card-title">Grafik Penjualan Tahun 2023</h5>
              <!-- Line Chart -->
              <div id="reportsChart"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                      name: 'Deluxe',
                      data: [31, 40, 28, 51, 42, 82, 56, 54, 50, 67, 83, 93]
                    }, {
                      name: 'Superior',
                      data: [11, 32, 45, 32, 34, 52, 41, 15, 11, 32, 18, 9]
                    }, {
                      name: 'Suite',
                      data: [15, 11, 32, 18, 9, 24, 11, 42, 82, 56, 54, 87]
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
                      categories: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]
                    },
                  
                  }).render();
                });
              </script>
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