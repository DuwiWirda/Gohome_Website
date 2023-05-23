@extends('backend/layouts.main')
@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Transaksi</h1>
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
                            <form class="container" method="POST" id="form-transaksi" action="{{ route('transaksi.update', ['id_transaksi' => $transaksi->id_transaksi]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_transaksi" value="{{ $transaksi->id_transaksi }}">
                                <div class="mb-3">
                                    <label for="email">Status : </label>
                                    <select name="status"
                                        class="form-control @error('status') is-invalid @enderror" id="status">
                                        <option selected disabled>-- Pilih Status --</option>
                                        <option value="Proses" {{ $transaksi->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="Checkin" {{ $transaksi->status == 'Checkin' ? 'selected' : '' }}>Checkin</option>
                                        <option value="Checkout" {{ $transaksi->status == 'Checkout' ? 'selected' : '' }}>Checkout</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success button p-2"
                                            onclick="showSuccessMessage();">Simpan</button>
                                        <a href="{{ route('transaksi.index') }}" class="btn btn-success button p-2"
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
            let form = document.getElementById('form-transaksi');

            const reset = () => {
                form.reset();
            }
        </script>
    </main><!-- End #main -->
