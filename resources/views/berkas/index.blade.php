@extends('dashboard.main')
@section('title', 'Table')
@section('content')





    <h5 class="card-title text-light fw-semibold mb-4">Data Berkas</h5>
    <h1>Data Excel to HTML</h1>


    <a class="btn btn-primary mb-4" href="/admin/upload_berkas"><i class="ti ti-plus"></i> Upload Berkas baru</a>
    @foreach ($data as $d)
        <div class="card">
            {{-- <h1>{{ $d->id }}</h1> --}}

            <div class="card-body">
                <div class="row d-flex justify-align-center">
                    <div class="col-md-1">
                        <h1> <i class="ti ti-files"></i></h1>
                    </div>
                    <div class="col-md-10">
                        <p class="ms-3">{{ $d->file_pdf }}</p>
                        <p class="ms-3">{{ $d->file_excel }}</p>
                    </div>
                    <div class="col-md-1">

                        <a href="/berkas/detail/{{ $d->id }}" class="btn badge bg-info ms-4">
                            <h1> <i class="ti ti-arrow-right"></i></h1>
                        </a>

                    </div>


                </div>

                {{-- <iframe src="{{ url('/') . Storage::url('fileExcel/' . $d->file_excel) }}" width="100%" height="600"></iframe> --}}
                {{-- <div id="excel-content"></div> --}}

                <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>
            </div>

        </div>
    @endforeach

@endsection
