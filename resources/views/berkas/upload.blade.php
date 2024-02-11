@extends('dashboard.main')
@section('title', 'Table')
@section('content')
    <style>
        .custom-file-upload {
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 40px;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
        }

        .custom-file-upload:hover {
            background-color: #0056b3;
        }

        input {
            margin-bottom: 3px;
        }

        label {
            margin-top: 3px;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h3><i class="ti ti-files"></i> Perbarui Profil</h3>
        </div>
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

                    <div class="row">
                        {{-- inputan foto --}}
                        <div class="col-md-3 form-group">
                            <img src="{{ asset('storage/fileFoto/' . session('foto')) }}" alt="Foto Pegawai" width="150px"
                                height="200px">
                            <label for="foto" class="custom-file-upload mt-2">
                                Ganti Foto
                            </label>
                            <input type="file" name="foto" id="foto" class="form-control" style="display: none;">
                        </div>

                        {{-- perbarui file ktp --}}
                        <div class="col-md-9 p-3 form-group">
                            <label for="ktp">Perbarui foto KTP</label>
                            <input type="file" name="ktp" id="ktp" class="form-control">
                           
                            {{-- </div> --}}

                            {{-- perbarui file BPJS --}}
                            {{-- <div class="col-md-3 form-group mt-md-0 mt-3"> --}}
                            <label for="bpjs">Perbarui foto BPJS</label>
                            <input type="file" name="bpjs" id="bpjs" class="form-control">
                            {{-- </div> --}}

                            {{-- perbarui file vaksin --}}
                            {{-- <div class="col-md-3 form-group mt-md-0 mt-3"> --}}
                            <label for="vaksin">Perbarui file kartu Vaksin</label>
                            <input type="file" name="vaksin" id="vaksin" class="form-control">
                        </div>
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
