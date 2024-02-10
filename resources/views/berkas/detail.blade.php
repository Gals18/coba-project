@extends('dashboard.main')
@section('title', 'Table')
@section('content')
    <h5 class="card-title text-light fw-semibold mb-4">Data Berkas</h5>
    <p>{{ $data->id }}</p>
    <div id="excel-content"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>
    <iframe src="/file-excel/$data->file_excel" width="100%" height="600"></iframe>
    <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR2aGJXxx_GgualpiDDHP08c_RvXg-DF77g26Q2yiQfSDI6GSNacmg3CQmmgd-2wQ/pubhtml?widget=true&amp;headers=false" width="100%" height="600"></iframe>
    </section>

@endsection
