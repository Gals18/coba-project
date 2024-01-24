@extends('dashboard.main')
@section('title', 'Table')
@section('content')
    <h5 class="card-title text-light fw-semibold mb-4">Data Berkas</h5>
    <h1>Data Excel to HTML</h1>

    <table border="1" id="excelTable">
        <!-- Tabel akan diisi menggunakan JavaScript -->
    </table>
    {{-- @foreach ($data as $row)
    <section class="card p-5">
        <a class="btn bg-dark" href="{{ asset( Storage::url('fileExcel/' . $row->file_excel)) }}" download="{{ $row->file_excel }}">
            1
        </a>
    </section>
@endforeach --}}
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
