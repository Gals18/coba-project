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
                        <label for="text">Masukan File PDF</label>
                        <input type="file" name="file_pdf" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="text">Masukan File Excel</label>
                        <input type="file" name="file_excel" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Submit</button>
                </form>




            </div>
        @endif
    </div>
@endsection
