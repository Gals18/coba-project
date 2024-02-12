@extends('dashboard.main')
@section('title', 'Table')
@section('content')
<script>
//     document.getElementById('file_excel').addEventListener('change', function(e) {
//     var file = e.target.files[0];
//     var reader = new FileReader();
//     reader.onload = function(e) {
//         var data = new Uint8Array(e.target.result);
//         var workbook = XLSX.read(data, {type: 'array'});
//         var html = XLSX.utils.sheet_to_html(workbook.Sheets[workbook.SheetNames[0]]);
//         document.getElementById('excel-data').innerHTML = html;
//     };
//     reader.readAsArrayBuffer(file);
// });

</script>
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

                    <div class="form-group mt-3">
                        <label for="text">Masukan Foto Pegawai</label>
                        <input type="file" name="foto" class="form-control" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="text">Masukan foto ktp</label>
                        <input type="file" name="ktp" class="form-control" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="text">Masukan foto BPJS</label>
                        <input type="file" name="bpjs" class="form-control" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="text">Masukan file kartu Vaksin</label>
                        <input type="file" name="vaksin" class="form-control" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="text">Masukan File PDF</label>
                        <input type="file" name="file_pdf" class="form-control" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="text">Masukan File Excel</label>
                        <div id="excel-content"></div>
                        <input type="file" name="file_excel" accept=".xls,.xlsx" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <button type="submit" class="btn btn-info mt-3"><i class="ti ti-check"></i> Submit</button>
    </form>

    @endif

@endsection
