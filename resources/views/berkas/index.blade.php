@extends('dashboard.main')
@section('title', 'Table')
@section('content')
    <h5 class="card-title text-light fw-semibold mb-4">Data Berkas</h5>
    <h1>Data Excel to HTML</h1>


    <a type="button" href="/admin/upload_berkas">Upload Berkas baru</a>
    @foreach ($data as $d)
        <section class="card">
            <h1>{{ $d->id }}</h1>
            <p class="ms-3">{{ $d->file_pdf }}</p>
            <p class="ms-3">{{ $d->file_excel }}</p>
            {{-- <iframe src="{{url('/').Storage::url('fileExcel/'. $d->file_excel) }}" width="100%" height="600"></iframe> --}}
            <div id="excel-content"></div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>
          
            <span>
             <a href="/berkas/detail/{{ $d->id }}" class="btn badge bg-info ms-4">
                    <i class='bx bxs-info-circle'></i> Detail
                </a>
            </span>
        </section>
    @endforeach

@endsection
