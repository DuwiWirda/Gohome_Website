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
                    <th scope="col">Harga</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($transaksi as $transaksi)
                <tr>
                    <td>{{ $transaksi->id_transaksi}}</td>
                    <td>{{ $transaksi ->pengunjung->nama_pengunjung }}</td>
                    <td>{{ $transaksi ->kamar->jenis_kamar }}</td>
                    <td>{{ $transaksi ->kamar->nomer_kamar }}</td>
                    <td>{{ $transaksi->tanggal_checkin }}</td>
                    <td>{{ $transaksi->tanggal_checkout }}</td>
                    <td>{{ $transaksi->status }}</td>
                    <td>{{ $transaksi->harga }}</td>
                </tr>
             @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
</main><!-- End #main -->