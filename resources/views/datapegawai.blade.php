@extends('layout.admin')

@push('css')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pegawai</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="container">
        <div class="mb-2">
            <a href="{{ route('tambahpegawai') }}" class="btn btn-success">Tambah +</a>             
            <!-- {{ Session::get('halaman_url') }} -->
        </div>

        <div class="row g-3 align-items-center mt-2">
            <div class="col-auto">
                <form action="/pegawai" method="get">
                    <input type="search" name="search" class="form-control">
                </form>
            </div>
        </div>

        <div class="row">
            <!-- @if ( $message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                {{ $message }}
                </div>
            @endif -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jantina</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Tarikh Lahir</th>
                        <th scope="col">Pendaftaran</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($data as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}.</th>
                        <td>{{$row->nama}}</td>
                        <!-- <td><img src="{{ asset('fotopegawai/'.$row->foto)}}" alt="" style="width: 40px;"></td> -->

                        <td><img src="{{ asset('storage/images/'.$row->foto) }}" alt="" style="width: 40px;"></td>
                        
                        <td>{{$row->jantina}}</td>  

                        @if(isset($row->religions->nama)  && !empty($row->religions->nama))
                            <td>{{ $row->religions->nama }}</td>                                  
                        @else
                            <td> - </td>
                        @endif

                        @if(isset($row->tarikh_lahir)  && !empty($row->tarikh_lahir))
                            <td>{{ $row->tarikh_lahir->format('D M Y') }}</td>
                        @else
                            <td> - </td>
                        @endif

                        

                        <td>{{$row->telefon}}</td>
                        <!-- <td>{{$row->created_at->diffForHumans()}}</td> -->
                        <td>{{$row->created_at->format('D M Y')}}</td>
                        <td>
                        <a href="{{ route('tampilkandata', $row->id) }}" class="btn btn-info">Edit</a>

                        <!-- <form action="{{ route('pegawai.destroy', $row->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('tampilkandata', $row->id) }}" class="btn btn-info">Edit</a>
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td> -->

                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id}}" data-nama="{{ $row->nama}}">Delete</a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>

    <!-- /.content -->

</div>
@endsection

@push('scripts')
    <!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.delete').click(function(){
        
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
            title: "Anda pasti?",
            text: "Anda akan menghapus data pegawai bernama "+nama+"! ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/delete/"+pegawaiid+""
                swal("Data telah berjaya diahapuskan!", {
                    icon: "success",
                });
            } else {
                swal("Data tidak dihapuskan!");
            }
        });
    });
</script>

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif   
</script>
@endpush