<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <div class="container-fluid bg-white p-5">
        <div class="container-sm col-12 border rounded p-5">
            <h1>Halo!!</h1>
            <div>Selamat datang di halaman admin</div>
            <div><a href="/logout" class="btn btn-sm btn-secondary mt-3">Logout</a></div>

            @if(Auth::user()->role == 'operator') 
                <div class="card mt-3">
                    <div class="list-group">
                        <li class="list-group-item">Menu Operator</li>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role == 'pegawai')
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Menu Pegawai</li>
                        <div class="panel-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success mt-3">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="inputFile">File:</label>
                                    <input 
                                        type="file" 
                                        name="file" 
                                        id="inputFile"
                                        class="form-control @error('file') is-invalid @enderror">

                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>

                            </form>
                        </div>
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
