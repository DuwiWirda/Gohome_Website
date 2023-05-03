@extends('backend/layouts.main')
@section('container')
<!-- Favicons -->
<link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="icon">
<link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="logo">

<main id="main" class="main">
<div class="pagetitle">
  <h1>Laporan
                    <select class="select" aria-label="Default select example">
                      <option selected>Pilih Bulan</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="7">Agustus</option>
                      <option value="7">September</option>
                      <option value="7">Oktober</option>
                      <option value="7">November</option>
                      <option value="7">Desember</option>
                    </select>
  <button type="buttontambah" class="buttontambah"><i class="bi bi-download"></i></button></h1>
</div><!-- End Page Title -->
<section class="section laporan">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kamar</th>
                    <th scope="col">No Kamar</th>
                    <th scope="col">CheckIn</th>
                    <th scope="col">CheckOut</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Deluxe</td>
                    <td>19</td>
                    <td>16/09/2023</td>
                    <td>18/09/2023</td>
                    <td>Cancel</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jizah Jacob</td>
                    <td>Sweet</td>
                    <td>25</td>
                    <td>16/09/2023</td>
                    <td>18/09/2023</td>
                    <td>Booking</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
</main><!-- End #main -->