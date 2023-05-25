@extends('backend/layouts.main')
@section('container')
    <!-- Favicons -->
    <link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="icon">
    <link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="logo">


    <main id="main" class="main">

        <div class="pagetitle" style="display: flex; align-items: center; justify-content: space-between;">
            <h1>Data Transaksi</h1>
            <form action="{{ route('transaksi.search') }}" method="GET" style="margin-left: 25px;">
                <input class="search" type="text" name="keyword" placeholder="Cari transaksi . . . " required>
            </form>
            <a href="{{ route('transaksi.refresh') }}" class="btn btn-success button p-2" style="margin-left: 10px;"><i
                    class="bi bi-arrow-clockwise"></i></a>
            <a href="{{ route('transaksi.add') }}" class="btn btn-success button p-2" style="margin-left: 10px;"><i
                    class="bi bi-person-plus"></i></a>
        </div>
        </div>

        <section class="section transaksi">
            <div class="card">
                <div class="card-body">
                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Kamar</th>
                                <th scope="col">No Kamar</th>
                                <th scope="col">CheckIn</th>
                                <th scope="col">CheckOut</th>
                                <th scope="col">Status</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->pengunjung->nama_pengunjung }}</td>
                                    <td>{{ $transaksi->kamar->jenis_kamar }}</td>
                                    <td>{{ $transaksi->kamar->nomer_kamar }}</td>
                                    <td>{{ $transaksi->tanggal_checkin }}</td>
                                    <td>{{ $transaksi->tanggal_checkout }}</td>
                                    <td>{{ $transaksi->status }}</td>
                                    <td>{{ $transaksi->kamar->harga }}</td>
                                    <td>{{ $transaksi->total }}</td>
                                    <td>
                                        <a
                                            href="{{ route('transaksi.edit', ['id_transaksi' => $transaksi->id_transaksi]) }}"class="btn btn-success button p-2"><i
                                                class="bi bi-pencil"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@push('js')
    <script>
        @if (session('success'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{!! session('success') !!}',
                showConfirmButton: false,
                timer: 1500,
                toast: true
            })
        @endif
    </script>
@endpush
