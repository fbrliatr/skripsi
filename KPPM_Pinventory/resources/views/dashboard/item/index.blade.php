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

        <h1 class="text-center m-3">Kategori Barang</h1>

        <div class="col m3-p3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                <i class="fas fa-plus"></i>    
            Tambahkan Data
            </button>
        </div>
       
     
        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategori Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.storeItem')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body bg-white">
                            <div class="form-group m-3">
                                <label for="">Nama Barang</label>
                                <input type="text" name="item_name" class="form-control">
                            </div>

                            <div class="form-group m-3">
                                <label for="">Satuan Unit</label>
                                <input type="text" name="unit" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- Show and Filter-->
        <div class="m-3 p-3">
            <div id="table1_wrapper" class="dataTables_wrapper no-footer">
                <div class="dataTables_length" id="table1_length">
                <!-- Show -->
                    <label>Show 
                        <select name="table1_length" aria-controls="table1" class="" fdprocessedid="vktn6">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> entries
                    </label>
                </div>
                <!-- Filter -->
                <div id="table1_filter" class="dataTables_filter">
                    <label>Search:
                        <input type="search" class="" placeholder="" aria-controls="table1">
                    </label>
                </div>

                <table class="table">
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Satuan Unit</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $t = 1 ?>
                    @foreach($data as $x)
                    <tr>
                        <td>{{$t}}</td>
                        <td>{{$x->item_name}}</td>
                        <td>{{$x->unit}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$x->id}}">
                                Edit Data
                            </button>

                            <a href="{{route('admin.deleteItem' , ['id'=>$x->id])}}" class="btn btn-danger"> Delete Data</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="edit{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('admin.updateItem' , ['id'=>$x->id])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body bg-white">
                                        <div class="form-group m-3">
                                            <label for="">Nama Barang</label>
                                            <input type="text" name="item_name" class="form-control" value="{{$x->item_name}}">
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Satuan unit</label>
                                            <input type="text" name="unit" value="{{$x->unit}}" class="form-control">
                                        </div>
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
</div>

@endsection
