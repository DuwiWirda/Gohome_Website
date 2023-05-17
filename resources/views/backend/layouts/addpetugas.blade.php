@extends('backend/layouts.main')
@section('container')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Petugas</h1>
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
              <form class="container" method="POST" id="form-petugas" action="{{ route('petugas.save') }}">
                @csrf
                <div class="mb-3">
                    <label for="Name">Nama Petugas: </label>
                    <input type="text" name="name" id="name" class="form-control" maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="email">Email : </label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Passwprd">Password : </label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="role">Jabatan : </label>
                    <select name="role" class="form-control" id="level">
                      <option value="Admin">Admin</option>
                      <option value="SuperAdmin">Super Admin</option>
                    </select>
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
    popup.innerText = "Data petugas berhasil ditambahkan.";

    // Tambahkan pop-up ke dalam body
    document.body.appendChild(popup);

    // Hilangkan pop-up setelah 3 detik
    setTimeout(function() {
      popup.remove();
    }, 30000000);
  }

  function showFailureMessage() {
    // Buat elemen pop-up
    var popup = document.createElement("div");
    popup.className = "popup failure";
    popup.innerText = "Gagal menambahkan data petugas";

    // Tambahkan pop-up ke dalam body
    document.body.appendChild(popup);

    setTimeout(function() {
      popup.remove();
    }, 30000000);
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