@extends('backend/layouts.main')
@section('container')

<!-- Favicons -->
<link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="icon">
<link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="logo">

<main id="main" class="main">
<div class="pagetitle">
  <h1>Data Kamar    
  <input class="search" type="text" placeholder="Cari..." required>	
  <input class="button" type="button" value="Cari">
  <button type="buttontambah" class="buttontambah"><i class="bi bi-person-plus"></i></button>
  </h1>
  </a>
</div><!-- End Page Title -->

<section class="section kamar">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nomor</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Jenis Kasur</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">01</th>
                    <td>D01</td>
                    <td>Deluxe</td>
                    <td>Kamar Deluxe adalahahgsh dhsdgjhsgdjgdjhsfbjh shdhgdhsgdhjhnbdbnd </td>
                    <td>Twin Bed</td>
                    <td>Rp. 250.000</td>
                    <td>logo.img</td>
                    <td>Tersedia</td>
                  </tr>
                  <tr>
                    <th scope="row">02</th>
                    <td>S012</td>
                    <td>Sweet</td>
                    <td>Kamar Sweet adalahahgsh dhsdgjhsgdjgdjhsfbjh shdhgdhsgdhjhnbdbnd </td>
                    <td>Single Bed</td>
                    <td>Rp. 300.000</td>
                    <td>logo.img</td>
                    <td>Tersedia</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
</main><!-- End #main -->