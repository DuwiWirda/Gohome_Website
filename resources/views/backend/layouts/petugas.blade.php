@extends('backend/layouts.main')
@section('container')

  <!-- Favicons -->
  <link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="icon">
  <link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="logo">


<main id="main" class="main">

<div class="pagetitle" style="display: flex; align-items: center; justify-content: space-between;">
            <h1>Data Petugas</h1>
            <form action="{{ route('petugas.search') }}" method="GET" style="margin-left: 25px;">
              <input class="search" type="text" name="keyword" placeholder="Cari transaksi . . . " required>
            </form>
            <a href="{{ route('petugas.refresh') }}" class="btn btn-success button p-2" style="margin-left: 10px;"><i class="bi bi-arrow-clockwise"></i></a>
            <a href="{{ route('petugas.add') }}" class="btn btn-success button p-2" style="margin-left: 10px;"><i class="bi bi-person-plus"></i></a>
          </div>
      </div>

<section class="section petugas">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($petugas as $petugas)
                <tr>
                    <td>{{ $petugas->name }}</td>
                    <td>{{ $petugas->email }}</td>
                    <td>{{ $petugas->role }}</td>
                    <td>
                    <a href="{{ route('petugas.edit', ['id' => $petugas->id]) }}"class="btn btn-success button p-2"><i
                                                class="bi bi-pencil"></i></a>
                    </td>
                    <td>
                    <form action="{{ route('petugas.destroy', ['id' => $petugas->id]) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="delete" class="btn btn-success button p-2" onclick="showSuccessMessage();"><i class="bi bi-trash-fill"></i></button>
                    </form>
                    </td>   
                </tr>
             @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
<script>
  function showSuccessMessage() {
    // Buat elemen pop-up
    var popup = document.createElement("div");
    popup.className = "popup success";
    popup.innerText = "Data petugas berhasil dihapus.";

    // Tambahkan pop-up ke dalam body
    document.body.appendChild(popup);

    setTimeout(function() {
      popup.remove();
    }, 30000000);
  }
  </script>
</main><!-- End #main -->
@endsection