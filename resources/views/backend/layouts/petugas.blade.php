@extends('backend/layouts.main')
@section('container')

  <!-- Favicons -->
  <link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="icon">
  <link href="{{asset('backend/assets/img/greenlogo.png')}}" rel="logo">


<main id="main" class="main">
<div class="pagetitle">
  <h1>Data Petugas
  <input class="search" type="text" placeholder="Cari..." required>	
  <input class="button" type="button" value="Cari">
  <a href="{{ route('petugas.add') }}" class="btn btn-success button p-2"><i class="bi bi-person-plus"></i></a>
  </h1>
</div><!-- End Page Title -->

<section class="section petugas">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($akun as $akun)
                <tr>
                    <td>{{ $akun->nama }}</td>
                    <td>{{ $akun->email }}</td>
                    <td>{{ $akun->password }}</td>
                    <td>{{ $akun->level }}</td>
                    <td>
                      <a class="btn btn-success button p-2"><i class="bi bi-pencil"></i></a>
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