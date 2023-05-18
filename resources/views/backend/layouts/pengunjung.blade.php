@extends('backend/layouts.main')
@section('container')

  <!-- Favicons -->
  <link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="icon">
  <link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="logo">


<main id="main" class="main">
  
    <div class="pagetitle" style="display: flex; align-items: center; justify-content: space-between;">
      <h1>Data Pengunjung</h1>
      <form action="{{ route('pengunjung.search') }}" method="GET" style="margin-left: 25px;">
        <input class="search" type="text" name="keyword" placeholder="Cari nama . . . " required>
      </form>
      <a href="{{ route('pengunjung.refresh') }}" class="btn btn-success button p-2" style="margin-left: 10px;"><i class="bi bi-arrow-clockwise"></i></a>
      <a href="{{ route('pengunjung.add') }}" class="btn btn-success button p-2" style="margin-left: 10px;"><i class="bi bi-person-plus"></i></a>
    </div>
</div>

<!-- End Page Title -->
<section class="section pengunjung">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama Pengunjung</th>
                    <th scope="col">Email</th>
                    <th scope="col">No.Hp</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($pengunjung as $pengunjung)
                <tr>
                    <td>{{ $pengunjung->nik }}</td>
                    <td>{{ $pengunjung->nama_pengunjung }}</td>
                    <td>{{ $pengunjung->email }}</td>
                    <td>{{ $pengunjung->telepon }}</td>
                    <td>
                      <a href="{{ route('pengunjung.edit', ['nik' => $pengunjung->nik]) }}" class="btn btn-success button p-2"><i class="bi bi-pencil"></i></a>
                    </td>
                    <td>
                    <form action="{{ route('pengunjung.destroy', ['nik' => $pengunjung->nik]) }}" method="POST" style="display: inline;">
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
    popup.innerText = "Data pengunjung berhasil dihapus.";

    // Tambahkan pop-up ke dalam body
    document.body.appendChild(popup);

    setTimeout(function() {
      popup.remove();
    }, 30000000);
  }
  </script>
</main><!-- End #main -->
@endsection