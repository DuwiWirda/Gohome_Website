@extends('backend/layouts.main')
@section('container')
<!-- Favicons -->
<link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="icon">
<link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="logo">
<main id="main" class="main">
    <div class="pagetitle" style="display: flex; align-items: center; justify-content: space-between;">
          <h1>Data Kamar</h1>
          <form action="{{ route('kamar.search') }}" method="GET" style="margin-left: 25px;">
            <input class="search" type="text" name="keyword" placeholder="Cari kamar . . . " required>
          </form>
          <a href="{{ route('kamar.refresh') }}" class="btn btn-success button p-2" style="margin-left: 10px;"><i class="bi bi-arrow-clockwise"></i></a>
          <a href="{{ route('kamar.add') }}" class="btn btn-success button p-2" style="margin-left: 10px;"><i class="bi bi-person-plus"></i></a>
        </div>
    </div>
<section class="section kamar">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Jenis Kamar</th>
                    <th scope="col">Jenis Kasur</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($kamar as $index => $kamar)
                <tr>
                    <td>{{ $kamar->nomer_kamar }}</td>
                    <td>{{ $kamar->jenis_kamar }}</td>
                    <td>{{ $kamar->jenis_kasur }}</td>
                    <td>{{ $kamar->harga }}</td>
                    <td>{{ $kamar->deskripsi }}</td>
                    <td>                        
                                  <img src="{{ asset('images/' . $kamar->gambar_kamar) }}" alt="gambar" style="width: 100px; height: 70px;" >
                    </td>
                    <td>{{ $kamar->status_kamar }}</td>
                    <td>
                      <a
                          href="{{ route('kamar.edit', ['id_kamar' => $kamar->id_kamar]) }}"class="btn btn-success button p-2"><i
                                                class="bi bi-pencil"></i></a>
                    </td>
                    <td>  
                    <form action="{{ route('kamar.destroy', ['id_kamar' => $kamar->id_kamar]) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="delete" class="btn btn-success button p-2" onclick="showSuccessMessage();"><i class="bi bi-trash-fill"></i></button>
                    </form>
                    </td>  
                  </td>
                </tr>
             @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
<script>s
  function showSuccessMessage() {
    // Buat elemen pop-up
    var popup = document.createElement("div");
    popup.className = "popup success";
    popup.innerText = "Data kamar berhasil dihapus.";

    // Tambahkan pop-up ke dalam body
    document.body.appendChild(popup);

    setTimeout(function() {
      popup.remove();
    }, 30000000);
  }
  </script>

</main><!-- End #main -->
@endsection