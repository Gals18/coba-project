@extends('dashboard.main')
@section('title', 'Table')
@section('content')
<h1 class="bold mb-4">Halaman Dashboard</h1>

<div class="d-flex  pe-5 ps-4 " >
<div class="card me-4" style="width: 400px;">
    <div class="card-body bg-info rounded fw-bold">
      <h5 class="card-title text-light">Pegawai</h5>
      <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    
    </div>
  </div>

  <div class="card me-4" style="width: 400px;">
    <div class="card-body bg-success  rounded fw-bold">
      <h5 class="card-title text-light">Berkas</h5>
      <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
     
    </div>
  </div>

  <div class="card " style="width: 400px;">
    <div class="card-body bg-warning text-bold rounded fw-bold">
      <h5 class="card-title text-light">Profil</h5>
      <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
     
    </div>
  </div>
</div>


@endsection