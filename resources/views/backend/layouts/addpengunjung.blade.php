@extends('backend/layouts.main')
@section('container')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Pengunjung</h1>
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
              <form class="container" method="POST" id="form-petugas" action="{{ route('pengunjung.save') }}">
                @csrf
                <div class="mb-3">
                    <label for="Nik">NIK : </label>
                    <input type="number" name="nik" id="nik" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Name">Nama Pengunjung : </label>
                    <input type="text" name="nama_pengunjung" id="nama_pengunjung" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Email">Email : </label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Password">Password : </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Phone">No.Hp : </label>
                    <input type="number" name="telepon" id="telepon" class="form-control">
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