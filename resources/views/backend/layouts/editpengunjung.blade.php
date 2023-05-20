@extends('backend/layouts.main')
@section('container')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Pengunjung</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"></a>
                    <li>
                    <li class="breadcrumb-item">
                    <li>
                    <li class="breadcrumb-item active">
                    <li>
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
                            <form class="container" method="POST" id="form-pengunjung"
                                action="{{ route('pengunjung.update') }}">
                                @csrf
                                <input type="hidden" name="nik" value="{{ $pengunjung->nik }}">
                                <div class="mb-3">
                                    <label for="Nik">NIK : </label>
                                    <input type="number" name="nik" value="{{ $pengunjung->nik }}" id="nik"
                                        class="form-control @error('nik') is-invalid @enderror">
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Name">Nama Pengunjung : </label>
                                    <input type="text" name="nama_pengunjung" value="{{ $pengunjung->nama_pengunjung }}"
                                        id="nama_pengunjung" maxlength="50"
                                        class="form-control @error('nama_pengunjung') is-invalid @enderror">
                                    @error('nama_pengunjung')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Email">Email : </label>
                                    <input type="email" name="email" value="{{ $pengunjung->email }}" id="email"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Password">Password : </label>
                                    <input type="password" name="password" value="{{ old($pengunjung->password) }}"
                                        id="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="telepon">No.Hp : </label>
                                    <input type="telepon" name="telepon" value="{{ $pengunjung->telepon }}" id="telepon"
                                        class="form-control @error('telepon') is-invalid @enderror" maxlength="13" minlength="11">
                                    @error('telepon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success button p-2"
                                            onclick="showSuccessMessage();">Simpan</button>
                                        <a href="{{ route('pengunjung.index') }}" class="btn btn-success button p-2"
                                            style="margin-left: 10px;">Batal</a>
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
