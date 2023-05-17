@extends('backend/layouts.main')
@section('container')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Kamar</h1>
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
              <form class="container" method="POST" id="form-kamar" action="{{ route('kamar.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Name">Nomor Kamar: </label>
                    <input type="text" name="nomer_kamar" id="nomer_kamar" class="form-control"maxlength="5">
                </div>
                <div class="mb-3">
                    <label for="email">Jenis Kamar : </label>
                    <select name="jenis_kamar" class="form-control" id="jenis_kamar">
                      <option value="Deluxe">Deluxe</option>
                      <option value="Suite">Suite</option>
                      <option value="Standard">Standard</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi : </label>
                    <textarea name="deskripsi" id="deskripsi" class='form-control' maxlength="100" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="jenis_kasur">Jenis Kasur : </label>
                    <select name="jenis_kasur" class="form-control" id="jenis_kasur">
                      <option value="double">Double</option>
                      <option value="double big">Double big</option>
                      <option value="super king">Super king</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga">Harga : </label>
                    <input type="number" name="harga" id="harga" class="form-control" maxlength="11">
                </div>
                <div class="mb-3">
                    <label for="gambar_kamar">Gambar : </label>
                    <input type="file" name="gambar_kamar" id="gambar_kamar" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Status : </label>
                    <select name="status_kamar" class="form-control" id="status_kamar">
                      <option value="Tersedia">Tersedia</option>
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
    popup.innerText = "Data kamar berhasil ditambahkan.";

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
    popup.innerText = "Gagal menambahkan data kamar";

    // Tambahkan pop-up ke dalam body
    document.body.appendChild(popup);

    // Hilangkan pop-up setelah 3 detik
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