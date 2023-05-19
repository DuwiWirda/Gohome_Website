@extends('backend/layouts.main')
@section('container')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah Petugas</h1>
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
                            <form class="container" method="POST" id="form-petugas" action="{{ route('petugas.save') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="Name">Nama Petugas: </label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" maxlength="50">
                                    @error('name')
                                        <!-- Validasi menggunakan error dan enderror -->
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email : </label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Passwprd">Password : </label>
                                    <input type="text" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="role">Jabatan : </label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror"
                                        id="role">
                                        <option selected disabled>- Pilih Jabatan --</option>
                                        <option value="admin">Admin</option>
                                        <option value="super">Super Admin</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success button p-2"
                                            onclick="showSuccessMessage();">Simpan</button>
                                        <a href="{{ route('petugas.index') }}" class="btn btn-success button p-2"
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
            function reset() {
                // Reset formulir atau lakukan tindakan yang sesuai
                // ...

                // Tampilkan pesan sukses
                showSuccessMessage();
            }
        </script>
        <script>
            let form = document.getElementById('form-petugas');

            const reset = () => {
                form.reset();
            }
        </script>
    </main><!-- End #main -->
