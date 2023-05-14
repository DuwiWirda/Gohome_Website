@extends('backend/layouts.main')
@section('container')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Petugas</h1>
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
              <form class="container" method="POST" id="form-petugas" action="{{ route('petugas.update') }}">
                @csrf
                <input type="hidden" name="id_akun" value="{{ $petugas->id_akun }}">
                <div class="mb-3">
                    <label for="Name">Nama Petugas: </label>
                    <input type="text" name="{{ $petugas->nama }}" id="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Email : </label>
                    <input type="email" name="{{ $petugas->email }}" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Passwprd">Password : </label>
                    <input type="text" name="{{ $petugas->password }}" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="harga">Jabatan : </label>
                    <select name="level" class="form-control" id="level">
                      <option value="Admin" {{ $petugas->level == "Admin" ? 'selected' : '' }}>Admin</option>
                      <option value="SuperAdmin" {{ $petugas->level == "SuperAdmin" ? 'selected' : '' }}>SuperAdmin</option>
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