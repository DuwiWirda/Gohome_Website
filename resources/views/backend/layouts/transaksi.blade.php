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
  <a href="{{ route('transaksi.add') }}" class="btn btn-success button p-2"><i class="bi bi-person-plus"></i></a>
  <!-- <button type="buttontambah" class="buttontambah"><i class="bi bi-person-plus"></i></button> -->
  </h1>
</div><!-- End Page Title -->

<section class="section transaksi">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">CheckIn</th>
                    <th scope="col">CheckOut</th>
                    <th scope="col">Status</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                    <th scope="col">TF</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($transaksi as $transaksi)
                <tr>
                    <td>{{ $transaksi->nik }}</td>
                    <td>{{ $transaksi ->pengunjung->nama_pengunjung }}</td>
                    <td>{{ $transaksi ->kamar->jenis_kamar }}</td>
                    <td>{{ $transaksi->tgl_checkin }}</td>
                    <td>{{ $transaksi->tgl_checkout }}</td>
                    <td>{{ $transaksi->status }}</td>
                    <td>{{ $transaksi->harga }}</td>
                    <td>{{ $transaksi->total}}</td>
                    <td>{{ $transaksi->bukti_tf}}</td>
                    
                </tr>
             @endforeach
                  
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
</main><!-- End #main -->