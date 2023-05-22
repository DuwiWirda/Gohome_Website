@extends('backend/layouts.main')
@section('container')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Kamar</h1>
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
                            <form class="container" method="POST" id="form-kamar" action="{{ route('kamar.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_kamar" value="{{ $kamar->id_kamar }}">
                                <div class="mb-3">
                                    <label for="Name">Nomor Kamar: </label>
                                    <input type="text" name='nomer_kamar' value="{{ $kamar->nomer_kamar }}"
                                        id="nomer_kamar" class="form-control @error('nomer_kamar') is-invalid @enderror" maxlength="5">
                                    @error('nomer_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Jenis Kamar : </label>
                                    <select name="jenis_kamar"
                                        class="form-control @error('jenis_kamar') is-invalid @enderror" id="jenis_kamar">
                                        <option selected disabled>-- Pilih Jenis Kamar --</option>
                                        <option value="Standard" {{ $kamar->jenis_kamar == 'Standard' ? 'selected' : '' }}>Standard</option>
                                        <option value="Deluxe" {{ $kamar->jenis_kamar == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                                        <option value="Suite" {{ $kamar->jenis_kamar == 'Suite' ? 'selected' : '' }}>Suite
                                        </option>

                                    </select>
                                    @error('jenis_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi">Deskripsi : </label>
                                    <textarea name="deskripsi" id="deskripsi" class='form-control @error('deskripsi') is-invalid @enderror' cols="30"
                                        rows="10" maxlength="100">{{ $kamar->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Jenis Kasur : </label>
                                    <select name="jenis_kasur"
                                        class="form-control @error('jenis_kasur') is-invalid @enderror" id="jenis_kasur">
                                        <option selected disabled>-- Pilih Jenis Kasur --</option>
                                        <option value="double" {{ $kamar->jenis_kasur == 'double' ? 'selected' : '' }}>Double</option>
                                        <option value="double big"{{ $kamar->jenis_kasur == 'double big' ? 'selected' : '' }}>Double Big</option>
                                        <option value="super king"{{ $kamar->jenis_kasur == 'super king' ? 'selected' : '' }}>Super King</option>
                                    </select>
                                    @error('jenis_kasur')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="harga">Harga : </label>
                                    <input type="text" value="{{ $kamar->harga }}" name="harga" id="harga" maxlength="11"
                                        class="form-control @error('harga') is-invalid @enderror">
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
                                    <input type="hidden" name="old_gambar" value="{{ $kamar->gambar_kamar }}">
                                    @error('gambar_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if ($kamar->gambar_kamar)
                                        <span class="text-info">Sudah ada data gambar, apabila tidak ingin mengubah
                                            abaikan.</span>
                                    @endif
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="status_kamar">Status : </label>
                                    <select type="text" value="{{ $kamar->status_kamar }}" name="status_kamar"
                                        class="form-control @error('status_kamar') is-invalid @enderror" id="status_kamar">
                                        <option selected disabled>-- Pilih Status Kamar --</option>
                                        <option value="Tersedia"
                                            {{ $kamar->status_kamar == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                    </select>
                                    @error('status_kamar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> -->
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
