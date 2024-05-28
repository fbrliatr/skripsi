@extends('dashboard.main')

@section('content')


@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="row">
    <div class="col card">

        <h1 class="text-center m-3">Data Warga</h1>

        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                <i class="fas fa-plus"></i>
                Tambahkan Divisi
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Divisi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.storeDivisi')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body bg-white">
                            <div class="form-group m-3">
                                <label for="">Nama Divisi</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group m-3">
                                <label for="">Jumlah Anggota</label>
                                <input type="number" name="no_head_citizen" class="form-control">
                            </div>

                            <!-- <div class="form-group m-3">
                                <label for="">Jumlah Masyarakat</label>
                                <input type="number" name="no_citizen" class="form-control">
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="m-3 p-3">
            <table class="table">
                <tr>
                    <th>No.</th>
                    <th>Nama Divisi</th>
                    <th>Jumlah Anggota</th>
                    <th>Aksi</th>
                </tr>
                <?php $t = 1 ?>
                @foreach($data as $x)
                <tr>
                    <td>{{$t}}</td>
                    <td>{{$x->name}}</td>
                    <td>{{$x->no_head_citizen}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$x->id}}">
                            Edit Data
                        </button>

                        <a href="{{route('admin.deleteDivisi' , ['id'=>$x->id])}}" class="btn btn-danger"> Delete Data</a>
                    </td>
                </tr>

                <div class="modal fade" id="edit{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Divisi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('admin.updateDivisi' , ['id'=>$x->id])}}" method="post">
                                @csrf
                                @method('put')
                                <div class="modal-body bg-white">
                                    <div class="form-group m-3">
                                        <label for="">Nama Divisi</label>
                                        <input type="text" name="name" class="form-control" value="{{$x->name}}">
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Jumlah Anggota</label>
                                        <input type="number" name="no_head_citizen" value="{{$x->no_head_citizen}}" class="form-control">
                                    </div>

                                    <!-- <div class="form-group m-3">
                                        <label for="">Jumlah Masyarakat</label>
                                        <input type="number" name="no_citizen" value="{{$x->no_citizen}}" class="form-control">
                                    </div> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <?php $t++ ?>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
