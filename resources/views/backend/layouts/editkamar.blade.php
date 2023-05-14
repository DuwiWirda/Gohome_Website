@extends('backend/layouts.main')
@section('container')


<main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Kamar</h1>
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
              <form class="container" method="POST" id="form-petugas" action="{{ route('kamar.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_kamar" value="{{ $kamar->id_kamar }}">
                <div class="mb-3">
                    <label for="Name">Nomor Kamar: </label>
                    <input type="text" name="{{ $kamar->nomer_kamar }}" id="nomer_kamar" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Jenis Kamar : </label>
                    <select name="jenis_kamar" class="form-control" id="jenis_kamar">
                      <option value="Standard" {{ $kamar->jenis_kamar == "Standard" ? 'selected' : '' }}>Standard</option>
                      <option value="Deluxe" {{ $kamar->jenis_kamar == "Deluxe" ? 'selected' : '' }}>Deluxe</option>
                      <option value="Suite" {{ $kamar->jenis_kamar == "Suite" ? 'selected' : '' }}>Suite</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi : </label>
                    <textarea name="deskripsi" id="deskripsi" class='form-control' cols="30" rows="10">{{ $kamar->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="jenis_kasur">Jenis Kasur : </label>
                    <select name="jenis_kasur" class="form-control" id="jenis_kasur">
                      <option value="Double" {{ $kamar->jenis_kasur == "Double" ? 'selected' : '' }}>Double</option>
                      <option value="Double Big" {{ $kamar->jenis_kasur == "Double Big" ? 'selected' : '' }}>Double Big</option>
                      <option value="Super King" {{ $kamar->jenis_kasur == "Super King" ? 'selected' : '' }}>Super King</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga">Harga : </label>
                    <input type="number" value="{{ $kamar->harga }}" name="harga" id="harga" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="gambar_kamar">Gambar : </label>
                    <input type="file" name="gambar_kamar" id="gambar_kamar" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Status : </label>
                    <select name="status_kamar" class="form-control" id="status_kamar">
                      <option value="Tersedia">Tersedia</option>
                      <option value="Tidak Tesedia">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="row mb-3">                
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-success button p-2">Simpan</button>
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