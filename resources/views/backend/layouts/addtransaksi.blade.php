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
                    <label for="Name">Nama Pengunjung : </label>
                    <select name="pengunjung" id="pengunjung" class="form-control">
                      @foreach($pengunjung as $pengunjung)
                          <option value="{{ $pengunjung->nik }}">{{ '| ' . $pengunjung->nik . '| ' . $pengunjung->nama_pengunjung }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Name">Kamar : </label>
                    <select name="kamar" id="kamar" class="form-control">
                      @foreach($kamar as $kamar)
                          <option value="{{ $kamar->id_kamar }}">{{ '| ' . $kamar->jenis_kamar . '| ' . $kamar->jenis_kasur }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email">Check In : </label>
                    <input type="date" name="checkin" id="checkin" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Check Out : </label>
                    <input type="date" name="checkout" id="checkin" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Phone">Status : </label>
                    <select name="status" id="status" class="form-control">
                      <option value="pending">Pending</option>
                      <option value="cancel">Cancel</option>
                      <option value="success">success</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gambar">Bukti TF: </label>
                    <input type="file" name="bukti" id="bukti" class="form-control">
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