@extends('backend/layouts.main')
@section('container')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Kamar</h1>
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
              <form class="container" method="POST" id="form-petugas" action="{{ route('kamar.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Name">Nomor Kamar: </label>
                    <input type="text" name="nomer_kamar" id="nomer_kamar" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Jenis Kamar : </label>
                    <select name="jenis_kamar" class="form-control" id="jenis_kamar">
                      <option value="Deluxe">Deluxe</option>
                      <option value="Suite">Suite</option>
                      <option value="Standard">Standard</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi : </label>
                    <textarea name="deskripsi" id="deskripsi" class='form-control' cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="jenis_kasur">Jenis Kasur : </label>
                    <select name="jenis_kasur" class="form-control" id="jenis_kasur">
                      <option value="Twin Bed">Twin Bed</option>
                      <option value="Single Bed">Single Bed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga">Harga : </label>
                    <input type="number" name="harga" id="harga" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="gambar_kamar">Gambar : </label>
                    <input type="file" name="gambar_kamar" id="gambar_kamar" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Status : </label>
                    <select name="status_kamar" class="form-control" id="status_kamar">
                      <option value="Tersedia">Tersedia</option>
                      <option value="Habis">Habis</option>
                    </select>
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