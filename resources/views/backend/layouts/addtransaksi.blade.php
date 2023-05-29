@extends('backend/layouts.main')
@section('container')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Tambah Transaksi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html"></a>
        <li>
        <li class="breadcrumb-item">
        <li>
        <li class="breadcrumb-item active">
        <li>
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
            <form class="container" method="POST" id="form-transaksi" action="{{ route('transaksi.save') }}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="Name">Pilih Pengunjung : </label>
                <select name="nik" id="nik" class="form-control">
                  @foreach($pengunjung as $pengunjung)
                  <option value="{{ $pengunjung->nik }}">{{ '| ' . $pengunjung->nik . '| ' . $pengunjung->nama_pengunjung }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="Name">Pilih Kamar : </label>
                <select name="kamar" id="jenis_kamar" class="form-control">
                  @foreach($kamar as $kamar)
                  <option value="{{ $kamar->id_kamar }}">{{ '| ' . $kamar->jenis_kamar . '| ' . $kamar->jenis_kasur . '| ' . $kamar->nomer_kamar . '| ' . $kamar->status_kamar}} </option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="email">Check In : </label>
                <input type="date" name="tanggal_checkin" id="tanggal_checkin" class="form-control">
              </div>
              <div class="mb-3">
                <label for="email">Check Out : </label>
                <input type="date" name="tanggal_checkout" id="tanggal_checkout" class="form-control">
              </div>
              <div class="mb-3">
                <label for="Phone">Status : </label>
                <select name="status" id="status" class="form-control">
                  <option value="Proses">Proses</option>
                  <option value="Checkin">Checkin</option>
                  <option value="Checkout">Checkout</option>
                  <option value="Cancel">Cancel</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="total">Total : </label>
                <input type="total" name="total" id="total" class="form-control" readonly>
              </div>
              <div class="row mb-3">
                <div class="col-sm-10">

                  <button type="submit" class="btn btn-success button p-2" onclick="showSuccessMessage();">Simpan</button>
                  <a href="{{ route('transaksi.index') }}" class="btn btn-success button p-2" style="margin-left: 10px;">Batal</a>
                </div>
              </div>
            </form><!-- End General Form Elements -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
      })
    })

    $('#tanggal_checkout').on('change', function() {
      let idKamar = $('#jenis_kamar').find(":selected").val();
      let tanggal_checkin = $('#tanggal_checkin').val();
      let tanggal_checkout = $('#tanggal_checkout').val();
      var url = "{{ route('transaksi.total',':id')}}";
      console.log(tanggal_checkout + " " + tanggal_checkin + " " + idKamar);

      $.ajax({
        url: url.replace(':id', idKamar),
        method: 'GET',
        data: {
          'tanggal_checkin': tanggal_checkin,
          'tanggal_checkout': tanggal_checkout
        },
        success: function(data) {
          console.log(data.total);
          $('#total').val(data.total);
        }
      });
    });

    let form = document.getElementById('form-petugas');

    const reset = () => {
      form.reset();
    }
  </script>
</main><!-- End #main -->