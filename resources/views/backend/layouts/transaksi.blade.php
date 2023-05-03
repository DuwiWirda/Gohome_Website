@extends('backend/layouts.main')
@section('container')

 <!-- Favicons -->
  <link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="icon">
  <link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="logo">


<main id="main" class="main">
<div class="pagetitle">
  <h1>Data Transaksi
  <input class="search" type="text" placeholder="Cari..." required>	
  <input class="button" type="button" value="Cari">
  <button type="buttontambah" class="buttontambah"><i class="bi bi-person-plus"></i></button>
  </h1>
</div><!-- End Page Title -->

<section class="section transaksi">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">CheckIn</th>
                    <th scope="col">CheckOut</th>
                    <th scope="col">Status</th>
                    <th scope="col">Bukti TF</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>838937487485798</td>
                    <td>Brandon Jacob</td>
                    <td>Deluxe</td>
                    <td>16/09/2023</td>
                    <td>18/09/2023</td>
                    <td>Cancel</td>
                    <td>-</td>
                    <td>BELOM NI</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>838937487485798</td>
                    <td>Zijah Jacob</td>
                    <td>Sweet</td>
                    <td>25/09/2023</td>
                    <td>29/09/2023</td>
                    <td>Booking</td>
                    <td>jdijdjdjfkjdfh</td>
                    <td>BELOM NI</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
</main><!-- End #main -->