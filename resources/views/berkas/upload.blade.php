@extends('dashboard.main')
@section('title', 'Table')
@section('content')
    <div class="card">
        @if (Auth::user()->role == 'pegawai')
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
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


        <form role="form" action="/berkas/create" method="post" style="width: 100%" enctype="multipart/form-data">
            @csrf

                    <div class="form-group mt-3">
                    {{-- <img src="{{ asset('storage/fileFoto/' . session('foto')) }}" alt="Foto Pegawai">                        <label for="foto">Masukkan Foto Pegawai</label> --}}
                        <input type="file" name="foto" class="form-control" id="foto">
                        <p>{{ $data->'role'}}.</p>
                    </div>
                    
                    {{-- @php
                        dd(session('foto'));
                    @endphp --}}
                    <div class="form-group mt-3">
                        <label for="text">Masukan foto ktp</label>
                        <input type="file" name="ktp" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="text">Masukan foto BPJS</label>
                        <input type="file" name="bpjs" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="text">Masukan file kartu Vaksin</label>
                        <input type="file" name="vaksin" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3><i class="ti ti-files"></i> Berkas Pegawai</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="text">Masukan File PDF</label>
                        <input type="file" name="file_pdf" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="text">Masukan File Excel</label>
                        <div id="excel-content"></div>
                        <input type="file" name="file_excel" accept=".xls,.xlsx" class="form-control">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-info mt-3"><i class="ti ti-check"></i> Submit</button>
        </form>

    @endif

@endsection
