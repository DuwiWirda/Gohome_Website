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


</div><!-- End Page Title -->
<section class="section kamar">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Jenis Kamar</th>
                    <th scope="col">Jenis Kasur</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($kamar as $kamar)
                <tr>
                    <td>{{ $kamar->nomor_kamar }}</td>
                    <td>{{ $kamar->jenis_kamar }}</td>
                    <td>{{ $kamar->jenis_kasur }}</td>
                    <td>{{ $kamar->harga }}</td>
                    <td>{{ $kamar->deskripsi }}</td>
                    <td>{{ $kamar->gambar_kamar }}</td>
                    <td>{{ $kamar->status_kamar }}</td>
                </tr>
             @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
</main><!-- End #main -->