@extends('dashboard.main')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="row">
    <div class="col card w-">
        <h1 class="text-center m-3">List Stock</h1>
        <div class="car-body">
            <div class="input-group mb-3">
                <label for="label">Tanggal Awal</label>
                <input type="date" name="tglAwal" id="tglAwal" class= "form-control"/>
            </div>
            <div class="input-group mb-3">
                <label for="label">Tanggal Akhir</label>
                <input type="date" name="tglAkhir" id="tglAkhir" class= "form-control"/>
            </div>
            <div class="input-group mb-3">
                <a href="" onclick="this.href='/admin/cetakStockItem/'
                + document.getElementById('tglAwal').value 
                +'/' + document.getElementById('tglAkhir').value"
                target="_blank" class="btn btn-sm btn-secondary float-right" >
                    <i class="fas fa-print"></i> 
                    Print Data 
                </a>
            </div>
            <div class ="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus"></i>
                    Tambahkan Data
                </button>
                
            </div>
            
        </div>
        

        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Stok Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.storeItemStock')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body bg-white">
                            <div class="form-group m-3">
                                <label for="">Nama Barang</label>
                                <select name="item_id" class="form-control" id="">
                                    @foreach($item as $f)
                                    <option value="{{$f->id}}">{{$f->item_name."/".$f->unit}}</option>
                                    @endforeach
                                </select>
                            </div>

<!--                          <div class="form-group m-3">
                                <label for="">Nama Stock</label>
                                <input type="text" name="title" class="form-control">
                            </div> 
-->
                            <div class="form-group m-3">
                                <label for="">Keterangan</label>
                                <textarea type="text" name="description" class="form-control"> </textarea>
                            </div>

                            <div class="form-group m-3">
                                <label for="">Jumlah Stok</label>
                                <input type="number" name="number" class="form-control">
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

        <div class="m-3 p-3">
            <table class="display" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Keterangan</th>
                        <th>Satuan Unit</th>
                        <th>Jumlah Stok</th>
                        <th>Updated at</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $t = 1 ?>
                <tbody>

                    @foreach($data as $x)
                    <tr>
                        <td>{{$t}}</td>
                        <td>{{$x->item->item_name}}</td>
                        <td>{{$x->description}}</td>
                        <td>{{$x->item->unit}}</td>
                        <td>{{$x->number}} {{$x->item->unit}}</td>
                        <td>{{$x->updated_at}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$x->id}}">
                                Edit Data
                            </button>

                            <a href="{{route('admin.deleteItemStock' , ['id'=>$x->id])}}" class="btn btn-danger"> Delete Data</a>
                        </td>
                    </tr>

                    <?php $t++ ?>
                    <div class="modal fade" id="edit{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Stock</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('admin.updateItemStock' , ['id'=>$x->id])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <!-- <div class="modal-body bg-white">
                                        <div class="form-group m-3">
                                            <label for="">Nama Stock</label>
                                            <input type="text" name="title" value="{{$x->title}}" class="form-control">
                                        </div> -->
                                        <div class="form-group m-3">
                                            <label for="">Nama Barang</label>
                                            <select name="item_id" class="form-control" id="">
                                                @foreach($item as $f)
                                                <option @if($f->id == $x->item_id) selected @endif value="{{$f->id}}">{{$f->item_name."/".$f->unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Keterangan</label>
                                            <textarea type="text" name="description" class="form-control">{{$x->description}}</textarea>
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Jumlah Stok</label>
                                            <input type="number" name="number" value="{{$x->number}}" class="form-control">
                                        </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });

    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>
@endpush
