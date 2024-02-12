<!doctype html>
<html lang="en">

<head>
  @include('header')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="dashboard/main" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('../dash/src')}}/assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <p class="text-center">Telkom Akses Yogyakarta</p>
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{$item}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="/aksi-login" method="POST">
                  @csrf
                  <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="username" value="{{ old('username') }}" name="username" class="form-control">
                  </div>
                  <div class="mb-2">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control">
                  </div>
                  <div class="mb-4">
                    <input type="checkbox" id="showPassword">
                    <label for="showPassword">Show Password</label>
                </div>
                  <div class="mb-4 d-grid">
                      <button name="submit" type="submit" class="btn btn-primary">Login</button>
                  </div>
                </form>
                
                <script>
                    const showPasswordCheckbox = document.getElementById('showPassword');
                    const passwordInput = document.getElementById('password');
                
                    showPasswordCheckbox.addEventListener('change', function () {
                        const isPasswordVisible = this.checked;
                        passwordInput.type = isPasswordVisible ? 'text' : 'password';
                    });
                </script>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('../dash/src')}}/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('../dash/src')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>