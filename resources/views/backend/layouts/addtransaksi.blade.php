@extends('backend/layouts.main')
@section('container')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"></a><li>
          <li class="breadcrumb-item"><li>
          <li class="breadcrumb-item active"><li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-20">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- General Form Elements -->
              <form class="container" method="POST" id="form-petugas" action="{{ route('transaksi.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Name">Pilih Pengunjung : </label>
                    <select name="nik" id="nik" class="form-control">
                      @foreach($pengunjung as $pengunjung)
                          <option value="{{ $pengunjung->nik }}">{{ '| ' . $pengunjung->nik . '| ' . $pengunjung->nama_pengunjung }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Name">[ilih Kamar : </label>
                    <select name="jenis_kamar" id="jenis_kamar" class="form-control">
                      @foreach($kamar as $kamar)
                          <option value="{{ $kamar->id_kamar }}">{{ '| ' . $kamar->jenis_kamar . '| ' . $kamar->jenis_kasur }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email">Check In : </label>
                    <input type="date" name="tanggal_checkin" id="tanggal_checkin" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Check Out : </label>
                    <input type="date" name="tanggal_checkout" id="tanggal_checkin" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Phone">Status : </label>
                    <select name="status" id="status" class="form-control">
                      <option value="Proses">Proses</option>
                      <option value="Checkin">Checkin</option>
                      <option value="Checkout">Checkout</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email">Harga : </label>
                    <input type="text" name="harga" id="harga" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Total : </label>
                    <input type="text" name="total" id="total" class="form-control">
                </div>
                <div class="row mb-3">                
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-success button p-2">Simpan</button>
                    <button class="btn btn-success button p-2" onclick="reset()">Buang</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>
        </div>        
      </div>
    </section>
    <script>
        let form = document.getElementById('form-petugas');

        const reset = () => {
            form.reset();
        }
    </script>
  </main><!-- End #main -->