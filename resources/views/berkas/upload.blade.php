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

<h5 class="card-title fw-semibold mb-4">Create NIK</h5>
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

                    <div class="mb-3">
                        <label class="form-label" for="inputFile">Foto Pegawai</label>
                        <input 
                          type="file" 
                          name="foto" 
                          id="inputFile"
                          accept="image/*"
                          class="form-control @error('file') is-invalid @enderror">
  
                          @error('file')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="inputFile">Foto KTP</label>
                        <input 
                            type="file" 
                            name="ktp" 
                            id="inputFile"
                            accept="image/*"
                            class="form-control @error('file') is-invalid @enderror">

                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="inputFile">Foto BPJS Ketenagakerjaan</label>
                      <input 
                          type="file" 
                          name="bpjs" 
                          id="inputFile"
                          accept="image/*"
                          class="form-control @error('file') is-invalid @enderror">

                      @error('file')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="inputFile">File Sertifikat Vaksin</label>
                        <input 
                            type="file" 
                            name="vaksin" 
                            id="inputFile"
                            accept=".pdf"
                            class="form-control @error('file') is-invalid @enderror">

                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                    <div class="mb-3">
                      <label class="form-label" for="inputFile">File Create NIK</label>
                      <input 
                          type="file" 
                          name="file_excel" 
                          id="inputFile"
                          accept=".xlsx, .xls"
                          class="form-control @error('file') is-invalid @enderror">

                      @error('file')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="inputFile">File KHS Mitra</label>
                      <input 
                          type="file" 
                          name="file_pdf" 
                          id="inputFile"
                          accept=".pdf"
                          class="form-control @error('file') is-invalid @enderror">

                      @error('file')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    {{-- <div class="form-group mt-3">
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
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        @endif
    </div>
@endsection
