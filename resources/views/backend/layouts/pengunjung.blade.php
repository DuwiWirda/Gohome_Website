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
  <button type="buttontambah" class="buttontambah"><i class="bi bi-person-plus"></i></button>
</div><!-- End Page Title -->
<section class="section pengunjung">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">No.Hp</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">3983928973947874</th>
                    <td>Brandon Jacob</td>
                    <td>Brandon@gmail.com</td>
                    <td>Brandon</td>
                    <td>089765453678</td>
                  </tr>
                  <tr>
                    <th scope="row">2683698374879435</th>
                    <td>Bridie Kessler</td>
                    <td>Bridie@gmail.com</td>
                    <td>Bridie</td>
                    <td>098789908765</td>
                  </tr>
                  <tr>
                    <th scope="row">2497498739487957</th>
                    <td>Ashleigh Langosh</td>
                    <td>Ashleigh@gmail.com</td>
                    <td>Ashleigh</td>
                    <td>098765456763</td>
                  </tr>
                  <tr>
                    <th scope="row">2849748973957847</th>
                    <td>Angus Grady</td>
                    <td>Angus@gmail.com</td>
                    <td>Angus</td>
                    <td>789098763426</td>
                  </tr>
                  <tr>
                    <th scope="row">6436864885875857</th>
                    <td>Raheem Lehner</td>
                    <td>Raheem@gmail.com</td>
                    <td>Raheem</td>
                    <td>089876678654</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
</section>
</main><!-- End #main -->