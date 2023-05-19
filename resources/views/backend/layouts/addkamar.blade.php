@extends('backend/layouts.main')
@section('container')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah Kamar</h1>
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
                            <form class="container" method="POST" id="form-kamar" action="{{ route('kamar.save') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="Name">Nomor Kamar: </label>
                                    <input type="text" name="nomer_kamar" id="nomer_kamar"
                                        class="form-control @error('nomer_kamar') is-invalid @enderror"maxlength="5">
                                    @error('nomer_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Jenis Kamar : </label>
                                    <select name="jenis_kamar"
                                        class="form-control @error('jenis kamar') is-invalid @enderror " id="jenis_kamar">
                                        <option selected disabled>-- Pilih Jenis Kamar --</option>
                                        <option value="Deluxe">Deluxe</option>
                                        <option value="Suite">Suite</option>
                                        <option value="Standard">Standard</option>
                                    </select>
                                    @error('jenis_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi">Deskripsi : </label>
                                    <textarea name="deskripsi" id="deskripsi" class='form-control @error('deskripsi') is-invalid @enderror' maxlength="100"
                                        cols="30" rows="10"></textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kasur">Jenis Kasur : </label>
                                    <select name="jenis_kasur"
                                        class="form-control @error('jenis kasur') is-invalid @enderror" id="jenis_kasur">
                                        <option selected disabled>-- Pilih Jenis Kasur --</option>
                                        <option value="double">Double</option>
                                        <option value="double big">Double big</option>
                                        <option value="super king">Super king</option>
                                    </select>
                                    @error('jenis_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="harga">Harga : </label>
                                    <input type="number" name="harga" id="harga"
                                        class="form-control @error('harga') is-invalid @enderror" maxlength="11">
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_kamar">Gambar : </label>
                                    <input type="file" name="gambar_kamar" id="gambar_kamar"
                                        class="form-control @error('gambar_kamar') is-invalid @enderror">
                                    @error('gambar_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Status : </label>
                                    <select name="status_kamar"
                                        class="form-control @error('status_kamar') is-invalid @enderror" id="status_kamar">
                                        <option selected disabled>-- Pilih Status Kasur --</option>
                                        <option value="Tersedia">Tersedia</option>
                                    </select>
                                    @error('status_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success button p-2"
                                            onclick="showSuccessMessage();">Simpan</button>
                                        <a href="{{ route('kamar.index') }}" class="btn btn-success button p-2"
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
