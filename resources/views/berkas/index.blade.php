@extends('dashboard.main')
@section('title', 'Table')
@section('content')
    <h5 class="card-title text-light fw-semibold mb-4">Data Berkas</h5>
    <h1>Data Excel to HTML</h1>

    
   <a type="button" href="/admin/upload_berkas">Upload Berkas baru</a>
@foreach ($data as $d)
<section class="card">
<h1>{{ $d->id }}</h1>
<p>{{ $d->file_pdf }}</p>
<span>
    <a href="/berkas/detail/{{ $d->id }}" class="btn badge bg-info ms-4">
        <i class='bx bxs-info-circle'></i> Detail
    </a>
</span>
</section>
@endforeach

@endsection
