@extends('backend/layouts.main')
@section('container')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Pengunjung</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"></a><li>
          <li class="breadcrumb-item"><li>
          <li class="breadcrumb-item active"><li>
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
              <form class="container" method="POST" id="form-petugas" action="{{ route('pengunjung.save') }}">
                @csrf
                <div class="mb-3">
                    <label for="Nik">NIK : </label>
                    <input type="text" name="nik" id="nik" class="form-control" placeholder ="Masukkan angka"
                    maxlength="16" minlength="16" >
                </div>
                <div class="mb-3">
                    <label for="Name">Nama Pengunjung : </label>
                    <input type="text" name="nama_pengunjung" id="nama_pengunjung" class="form-control" maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="Email">Email : </label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Password">Password : </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Phone">No.Hp : </label>
                    <input type="text" name="telepon" id="telepon" class="form-control" placeholder ="Masukkan angka"
                    maxlength="13" minlength="11">
                </div>
                <div class="row mb-3">                
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-success button p-2" onclick="showSuccessMessage();">Simpan</button>
                    <button class="btn btn-success button p-2" onclick="reset()">Buang</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>
        </div>        
      </div>
    </section>
    <script>
  function showSuccessMessage() {
    // Buat elemen pop-up
    var popup = document.createElement("div");
    popup.className = "popup success";
    popup.innerText = "Data Pengunjung berhasil ditambahkan.";

    // Tambahkan pop-up ke dalam body
    document.body.appendChild(popup);

    setTimeout(function() {
      popup.remove();
    }, 30000000);
  }

  function showFailureMessage() {
    // Buat elemen pop-up
    var popup = document.createElement("div");
    popup.className = "popup failure";
    popup.innerText = "Gagal menambahkan pengunjung kamar";

    // Tambahkan pop-up ke dalam body
    document.body.appendChild(popup);

    // Hilangkan pop-up setelah 3 detik
    setTimeout(function() {
      popup.remove();
    },30000000);
  }
  function reset() {
    // Reset formulir atau lakukan tindakan yang sesuai
    // ...

    // Tampilkan pesan sukses
    showSuccessMessage();
  }
</script>
    <script>
        let form = document.getElementById('form-petugas');

        const reset = () => {
            form.reset();
        }
    </script>
  </main><!-- End #main -->