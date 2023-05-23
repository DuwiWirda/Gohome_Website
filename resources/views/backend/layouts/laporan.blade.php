@extends('backend/layouts.main')
@section('container')
<!-- Favicons -->
<link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="icon">
<link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="logo">

<main id="main" class="main">
  <div class="pagetitle" style="display: flex; align-items: center;">
    <h1>Laporan</h1>
    <form action="{{ route('laporan.filter') }}" method="POST">
      @csrf
      <div style="display: flex; align-items: center;">
        <select name="bulan" id="bulan" class="select" aria-label="Default select example">
        <option selected disabled>Pilih Bulan</option>
          <option value="1">Januari</option>
          <option value="2">Februari</option>
          <option value="3">Maret</option>
          <option value="4">April</option>
          <option value="5">Mei</option>
          <option value="6">Juni</option>
          <option value="7">Juli</option>
          <option value="8">Agustus</option>
          <option value="9">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
        <button class="btn btn-success button p-2" type="submit" style="margin-left: 10px;">Filter</button>
      </div>
    </form>
    <div style="display: flex; align-items: center; margin-left: 10px;">
      <a href="{{ route('laporan.refresh') }}" class="btn btn-success button p-2"><i class="bi bi-arrow-clockwise"></i></a>
      <form action="{{ route('export.transaksi') }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="bulan_export" id="bulan_export" value="{{$bulan}}">
        <button type="submit" class="btn btn-success button p-2" style="margin-left: 10px;"><i class="bi bi-download"></i></button>
      </form>
    </div>
  </div><!-- End Page Title -->

<section class="section laporan">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kamar</th>
                    <th scope="col">No Kamar</th>
                    <th scope="col">CheckIn</th>
                    <th scope="col">CheckOut</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($laporan as $key => $transaksi)
                <tr>
                    <td>{{ $transaksi->Pengunjung->nik }}</td>
                    <td>{{ $transaksi->pengunjung->nama_pengunjung }}</td>
                    <td>{{ $transaksi->kamar->jenis_kamar }}</td>
                    <td>{{ $transaksi->kamar->nomer_kamar }}</td>
                    <td>{{ $transaksi->tanggal_checkin }}</td>
                    <td>{{ $transaksi->tanggal_checkout }}</td>
                    <td>{{ $transaksi->status }}</td>
                    <td>{{ $transaksi->total }}</td>
                </tr>
             @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
</main><!-- End #main -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
  // $('#bulan').on('change',function(){
  //   var selected = $('#bulan :selected').val();
  //   $('#bulan_export').val(selected);
  // })
</script>
@endsection