@extends('backend/layouts.main')
@section('container')

  <!-- Favicons -->
  <link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="icon">
  <link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="logo">


<main id="main" class="main">
  
<div class="pagetitle">
  <h1>Data Pengunjung
  <input class="search" type="text" placeholder="Cari..." required>	
  <input class="button" type="button" value="Cari">
  <a href="{{ route('pengunjung.add') }}" class="btn btn-success button p-2"><i class="bi bi-person-plus"></i></a>

</div><!-- End Page Title -->
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
                      <a class="btn btn-success button p-2"><i class="bi bi-trash-fill"></i></a>
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