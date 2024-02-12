@extends('dashboard.main')
@section('title', 'Table')
@section('content')
    <h5 class="card-title fw-semibold mb-3">Data Berkas</h5>
    <p>{{ $data->file_excel }}</p>
    {{-- <div id="excel-content"></div> --}}

    <div class="card">
        <div class="card-body">
        <table class="table table-bordered" id="datatable">
            @foreach ($excelData as $key => $row)
                @if ($key == 0)
                    <tr>
                        @foreach ($row as $item)
                            <th class="table-head table-primary">{{ $item }}</th>
                        @endforeach
                    </tr>
                    @php
                        continue;
                    @endphp
                @endif
                <tr>
                    @foreach ($row as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>
        </div>
    </div>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>
    {{-- <iframe src="/file-excel/$data->file_excel" width="100%" height="600"></iframe>
    <iframe
        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR2aGJXxx_GgualpiDDHP08c_RvXg-DF77g26Q2yiQfSDI6GSNacmg3CQmmgd-2wQ/pubhtml?widget=true&amp;headers=false"
        width="100%" height="600"></iframe> --}}
    </section>

@endsection
