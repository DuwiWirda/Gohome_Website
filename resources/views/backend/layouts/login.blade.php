<section class="vh-100">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="css/login.css">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="backend/assets/img/greenlogo.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
          </div>

          <form method="POST" action="{{ route('login_process') }}">
           @csrf

          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Email</label>
            <input type="email" id="email" class="form-control form-control-lg" required id="email" name="email"
              placeholder="Masukkan Email" />
          
          </div>
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="password" class="form-control form-control-lg" id="password" required class="form-control" name="password"
              placeholder="Masukkan Password" />
           
          </div>
          <div class="text-center mt-4">
  <button type="submit" style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #005F63; color:white; border: none; border-radius: 0.5rem; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); transition: background-color 0.3s ease; display: inline-block;">
    Login
  </button>
</div>

          <!-- <div class="text-center text-lg-start mt-4 pt-2"><button type="submit"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #005F63; color:white">Login</button>
          </div> -->
        </form>
      </div>
    </div>
  </div>
    <!-- Right -->
  </div>
</section>
