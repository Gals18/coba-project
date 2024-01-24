@extends('dashboard.main')
@section('title', 'Table')
@section('content')
<h5 class="card-title text-light fw-semibold mb-4">Data Pegawai</h5>
<table class="bg-light text-center X scroll bootstraps display nowrap" id="example" style="width:100%">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Lengkap</th>
            <th>ID Pelamar</th>
            <th>Pekerjaan</th>
            <th>Wawancara</th>
            <th>Status Penerimaan</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($data as $d)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $d->nama_lengkap }}</td>
                <td>{{ $d->id_pelamar }}</td>
                <td>{{ $d->pekerjaan->nama }}</td>
                <td>
                    <a href="/wawancara/form/{{ $d->id_pelamar }}" class="btn btn-info"
                        role="button"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                            y="0px" width="20" height="20" viewBox="0,0,256,256"
                            style="fill:#000000;">
                            <g fill="#000000" fill-rule="nonzero" stroke="none" stroke-width="1"
                                stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <g transform="scale(5.33333,5.33333)">
                                    <path
                                        d="M13.5,4.90039c-1.91818,0 -3.5,1.58182 -3.5,3.5v12.31055c-0.00765,0.54095 0.27656,1.04412 0.74381,1.31683c0.46725,0.27271 1.04514,0.27271 1.51238,0c0.46725,-0.27271 0.75146,-0.77588 0.74381,-1.31683v-12.31055c0,-0.28182 0.21818,-0.5 0.5,-0.5h21c0.28182,0 0.5,0.21818 0.5,0.5v4.69727c-0.70423,0.25238 -1.11502,0.98489 -0.96311,1.71739c0.15191,0.7325 0.82011,1.24124 1.56663,1.19277c2.42066,-0.16694 4.84402,0.82221 6.54492,2.86328c0.00259,0.00392 0.00519,0.00782 0.00781,0.01172c2.85622,3.36026 2.33688,8.49143 -0.99414,11.15625c-0.64721,0.51777 -0.75214,1.46217 -0.23437,2.10938c0.51777,0.64721 1.46217,0.75214 2.10938,0.23438c4.66736,-3.73389 5.34741,-10.79768 1.4082,-15.4375c-1.70356,-2.04066 -3.99778,-3.33791 -6.44531,-3.78125v-4.76367c0,-1.91818 -1.58182,-3.5 -3.5,-3.5zM29.96484,15.19727c-0.33818,0.01198 -0.66237,0.13794 -0.91992,0.35742c-4.64315,3.83059 -5.33245,10.8876 -1.38867,15.52734c1.92466,2.2643 4.60194,3.80845 7.58398,3.92773c0.5356,0.02136 1.0419,-0.24467 1.32815,-0.69785c0.28625,-0.45319 0.30896,-1.02467 0.05958,-1.49915c-0.24939,-0.47447 -0.73298,-0.77984 -1.26859,-0.80105c-2.01796,-0.08072 -3.94067,-1.13735 -5.41602,-2.87305c-2.85622,-3.36026 -2.34514,-8.50208 1.01172,-11.27148c0.50449,-0.40425 0.69327,-1.08621 0.46847,-1.69234c-0.2248,-0.60613 -0.81262,-1.00007 -1.4587,-0.97758zM36.07813,19.18945c-0.39783,0.0057 -0.77709,0.1692 -1.05437,0.45453c-0.27728,0.28533 -0.42985,0.66913 -0.42415,1.06695v1.80078h-1.79883c-0.54095,-0.00765 -1.04412,0.27656 -1.31683,0.74381c-0.27271,0.46725 -0.27271,1.04514 0,1.51238c0.27271,0.46725 0.77588,0.75146 1.31683,0.74381h1.79883v1.79883c-0.00765,0.54095 0.27656,1.04412 0.74381,1.31683c0.46725,0.27271 1.04514,0.27271 1.51238,0c0.46725,-0.27271 0.75146,-0.77588 0.74381,-1.31683v-1.79883h1.80078c0.54095,0.00765 1.04412,-0.27656 1.31683,-0.74381c0.27271,-0.46725 0.27271,-1.04514 0,-1.51238c-0.27271,-0.46725 -0.77588,-0.75146 -1.31683,-0.74381h-1.80078v-1.80078c0.00581,-0.40527 -0.15263,-0.79565 -0.43923,-1.08225c-0.2866,-0.2866 -0.67698,-0.44504 -1.08225,-0.43923zM11.47656,25.47852c-0.82766,0.01293 -1.48843,0.69381 -1.47656,1.52148v12.59961c0,2.7875 3.37234,4.51437 5.61523,2.78906l8.38672,-6.07227l8.42773,6.00586c1.13954,0.81269 2.59835,0.84956 3.6875,0.2832c1.08984,-0.56672 1.88281,-1.74297 1.88281,-3.10547v-2.03125c0.00765,-0.54095 -0.27656,-1.04412 -0.74381,-1.31683c-0.46725,-0.27271 -1.04514,-0.27271 -1.51238,0c-0.46725,0.27271 -0.75146,0.77588 -0.74381,1.31683v2.03125c0,0.2375 -0.10742,0.36008 -0.26758,0.44336c-0.16016,0.08328 -0.3004,0.12136 -0.56055,-0.06445c-0.00065,0 -0.0013,0 -0.00195,0l-8.69922,-6.20117l0.18945,0.16211c-0.88876,-0.88876 -2.27812,-0.79962 -3.1582,-0.14062l-8.68164,6.28516c-0.01185,0.00894 -0.02357,0.01806 -0.03516,0.02734c-0.35705,0.27469 -0.78516,0.00039 -0.78516,-0.41211v-12.59961c0.00582,-0.40562 -0.15288,-0.7963 -0.43991,-1.08296c-0.28703,-0.28666 -0.67792,-0.44486 -1.08353,-0.43852z">
                                    </path>
                                </g>
                            </g>
                        </svg>Jadwal</a>
                </td>
                <td>
                    @if ($d->status == 'diterima')
                        <span class="btn badge bg-primary">Diterima</span>
                    @elseif ($d->status == 'ditolak')
                        <span class="btn badge bg-danger">Ditolak</span>
                    @else
                        <span class="btn badge bg-secondary">Harap Input Status</span>
                    @endif

                </td>
                <td>

                    <a href="/pelamar/detail/{{ $d->id_pelamar }}" class="btn btn-success"> <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA9ElEQVR4nO3UvUoDURDF8R9YGwO+gc8hKtYRPwpLu4BpAgHBFwjiQ0XzGKZPo62xVwYmEOKumt1NIewfDgu7l3vuzLmztFRggHvc2iKfKwr6aVpX/Z9MhnhsQMNVk1G+jOf/ZtAGrw1+A84wxUfqGb2yxevDuLxtRRphBw94wTl2UxeYYfwXk+VwFukmKwiDbsFe3TT6VtGmEz/NCsq4wpOaLLI9ZXTwXnfiF7+Y7OWaysEf5C2KkMu4xqRO8CcZ6qwk+H3McbT+ocqvfpxGl5lBJyuYZ6viMI3Qy1sUm4aiRVFBGLzhuCmjMg7xitNtG0Uld18I3nbVSQRIkQAAAABJRU5ErkJggg=="></a>
                    <a href="/pelamar/delete/{{ $d->id_pelamar }}" class="btn btn-danger hapus-data"> <svg
                            xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="25" height="25" viewBox="0 0 24 24">
                            <path
                                d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z">
                            </path>
                        </svg></a>
                </td>
            </tr>
        @endforeach --}}
    </tbody>
</table>
@endsection