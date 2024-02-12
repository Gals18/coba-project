@extends('dashboard.main')
@section('title', 'Table')
@section('content')

<h5 class="card-title fw-semibold mb-4">Welcome {{ Auth::user()->nama }}!!</h5>

  <div class="card">

      @if(Auth::user()->role == 'operator')
      <div class="mb-3">
          <p>Menu Operator</p>
      </div>
      @endif

      @if(Auth::user()->role == 'pegawai')
      <div class="mb-3">
          <ul class="list-group list-group-flush">
              <p>Menu Pegawai</p>
              <div class="card-body">
                  @if ($message = Session::get('success'))
                  {{-- <div class="alert alert-success" role="alert">
                      <strong>{{ $message }}</strong>
                  </div> --}}
                  @endif

                  @if ($errors->any())
                  <div class="alert alert-warning" role="alert">
                      <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
              </div>
          </ul>
      </div>
      @endif
  </div>
@endsection