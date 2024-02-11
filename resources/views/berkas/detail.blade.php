@extends('dashboard.main')
@section('title', 'Table')
@section('content')
    <h5 class="card-title text-light fw-semibold mb-4">Data Berkas</h5>
    <p>{{ $data->id }}</p>
    <p>{{ $data->file_excel }}</p>

    <div id="excel-content"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>
    <script></script>
    <script>
        // $coba = ms-excel:ofe|u|Storage::disk('public')->url('fileBPJS/' . $data->file_excel);
        // console.log($coba);
    </script>
    @php
        $url = Storage::disk('public')->url('app/public/fileExcel/' . $data->file_excel);
        // dd($url);
    @endphp

    <iframe src="{{ $url }}" width="100%" height="600"></iframe>

    {{-- <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR2aGJXxx_GgualpiDDHP08c_RvXg-DF77g26Q2yiQfSDI6GSNacmg3CQmmgd-2wQ/pubhtml?widget=true&amp;headers=false" width="100%" height="600"></iframe> --}}
    </section>

@endsection
