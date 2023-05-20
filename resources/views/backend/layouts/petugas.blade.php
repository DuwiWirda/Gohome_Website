@extends('backend/layouts.main')
@section('container')

  <!-- Favicons -->
  <link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="icon">
  <link href="{{ asset('backend/assets/img/greenlogo.png') }}" rel="logo">


<main id="main" class="main">

<div class="pagetitle" style="display: flex; align-items: center; justify-content: space-between;">
            <h1>Data Petugas</h1>
            </form>
          </div>
      </div>

<section class="section petugas">
<div class="table-responsive">
<div class="card">
            <div class="card-body">
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($petugas as $petugas)
                <tr>
                    <td>{{ $petugas->name }}</td>
                    <td>{{ $petugas->email }}</td>
                    <td>{{ $petugas->role }}</td>
                    <td>
                  
                    </td>
                    <td>
                    
                    </td>   
                </tr>
             @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
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