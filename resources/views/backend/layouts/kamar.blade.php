@extends('backend/layouts.main')
@section('container')
<!-- Favicons -->
<link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="icon">
<link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="logo">
<main id="main" class="main">
<div class="pagetitle">
  <h1>Data Kamar    
  <input class="search" type="text" placeholder="Cari..." required>	
  <input class="button" type="button" value="Cari">
  <a href="{{ route('kamar.add') }}" class="btn btn-success button p-2"><i class="bi bi-person-plus"></i></a>
</div><!-- End Page Title -->
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
                      <img src="{{ asset('images/' . $kamar->gambar_kamar) }}" alt="" srcset="" width="150" class="rounded">
                    </td>
                    <td>{{ $kamar->status_kamar }}</td>
                    <td>
                      <a href="{{ route('kamar.edit', ['id_kamar' => $kamar->id_kamar]) }}" class="btn btn-success button p-2"><i class="bi bi-pencil"></i></a>
                    </td>
                    <td>
                    
                      <a  class="btn btn-success button p-2"><i class="bi bi-trash-fill"></i></a>
                     
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