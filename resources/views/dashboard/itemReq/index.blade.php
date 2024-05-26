@extends('dashboard.main')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="row">
    <div class="col card w-50">
    <form method="get" action="{{ route('admin.cetakRequestItem') }}">
        <h1 class="text-center m-3">List Request Barang</h1>
        <div class="car-body">
            <div class="input-group mb-3">
                <label>Divisi:</label>
                <select name="divisi">
                    <option value="">Pilih Divisi</option>
                    @foreach ($divisi as $z)
                    <option value="{{$z->id}}">{{$z->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <label>Tanggal Mulai:</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="input-group mb-3">
                <label>Tanggal Akhir:</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}">
            </div>
            <div>
                <button type="submit" class="btn btn-md btn-secondary">
                    <i class="fas fa-print"></i> 
                    Print
                </button>
            </div>
            <br>
            <!-- <div class="input-group mb-3">
                <label for="label">Tanggal Awal</label>
                <input type="date" name="tglAwal" id="tglAwal" class= "form-control"/>
            </div>
            <div class="input-group mb-3">
                <label for="label">Tanggal Akhir</label>
                <input type="date" name="tglAkhir" id="tglAkhir" class= "form-control"/>
            </div>
            <button type="submit">Cetak PDF</button> -->
            <!-- <div class="input-group mb-3">
                <br>
                <a href="" onclick="this.href='/admin/cetakRequestTanggal/'
                +document.getElementById('tglAwal').value 
                +'/' + document.getElementById('tglAkhir').value"
                target="_blank" class="btn btn-sm btn-secondary float-right" >
                    <i class="fas fa-print"></i> 
                    Print Data 
                </a>
            </div> -->
            </form>
        </div>
        
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Requested</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Accepted</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Waiting</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">On Progress</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">Done</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4" aria-selected="false">Rejected</a>

            </div>
        </nav>   

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="m-3 p-1">
                    <table class="display" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Tujuan</th>
                                <th>Deskripsi Barang</th>
                                <th>Divisi</th>
                                <th>Satuan </th>
                                <th>Jumlah Stock</th>
                                <th>Status</th>
                                <th>Requester</th>
                                <th>Time </th>

                                <!-- <th>Dokumen Pendukung</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $t = 1 ?>
                        <tbody>

                            @foreach($data as $x)
                            <tr>
                                <td>{{$t}}</td>
                                <td>{{$x->item->item_name}}</td>
                                <td>{{$x->tujuan}}</td>
                                <td>{{$x->description}}</td>
                                <td>{{$x->divisi->name}}</td>
                                <td>{{$x->item->unit}}</td>
                                <td>{{$x->number}} {{$x->item->unit}}</td>
                                <td>{{$x->status}}</td>
                                <td>{{$x->user->name}}</td>
                                <td>{{$x->updated_at}}</td>
                                <!-- <td><a href="{{route('admin.downloadDocItem' , ['id'=>$x->id])}}" class="btn btn-danger">Download Dokumen Pendukung</a></td> -->
                                <td>
                                    <a href="{{route('admin.acceptRequestItem' , ['id'=>$x->id])}}" class="btn btn-success">Accept Request</a>
                                    <a href="{{route('admin.rejectRequestItem' , ['id'=>$x->id])}}" class="btn btn-danger"> Tolak Request</a>
                                    
                                </td>
                            </tr>

                            <?php  $t++ ;?>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="m-3 p-1">
                    <table class="display" id="table2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Tujuan</th>
                                <th>Deskripsi Barang</th>
                                <th>Divisi</th>
                                <th>Satuan</th>
                                <th>Jumlah Stock</th>
                                <th>Status</th>
                                <th>Requester</th>
                                <th>Time </th>

                                <!-- <th>Dokumen Pendukung</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $t = 1 ?>
                        <tbody>

                            @foreach($accepted as $x)
                            <tr>
                                <td>{{$t}}</td>
                                <td>{{$x->item->item_name}}</td>
                                <td>{{$x->tujuan}}</td>
                                <td>{{$x->description}}</td>
                                <td>{{$x->divisi->name}}</td>
                                <td>{{$x->item->unit}}</td>
                                <td>{{$x->number}} {{$x->item->unit}}</td>
                                <td>{{$x->status}}</td>
                                <td>{{$x->user->name}}</td>
                                <td>{{$x->updated_at}}</td>

                                <!-- <td><a href="{{route('admin.downloadDocItem' , ['id'=>$x->id])}}" class="btn btn-danger">Download Dokumen Pendukung</a></td> -->
                                <td>
                                    <a href="{{route('admin.waitingItem' , ['id'=>$x->id])}}" class="btn btn-primary">Waiting</a>
                                    <a href="{{route('admin.runProgressItem' , ['id'=>$x->id])}}" class="btn btn-success">Run Progress</a>
                                </td>
                            </tr>

                            <?php  $t++ ;?>

                            @endforeach

                        </tbody>


                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="m-3 p-1">
                    <table class="display" id="table3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Tujuan</th>
                                <th>Deskripsi</th>
                                <th>Divisi</th>
                                <th>Satuan </th>
                                <th>Jumlah Stock</th>
                                <th>Status</th>
                                <th>Requester</th>
                                <th>Time </th>

                                <!-- <th>Dokumen Pendukung</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $t = 1 ?>
                        <tbody>

                            @foreach($waiting as $x)
                            <tr>
                                <td>{{$t}}</td>
                                <td>{{$x->item->item_name}}</td>
                                <td>{{$x->tujuan}}</td>
                                <td>{{$x->description}}</td>
                                <td>{{$x->divisi->name}}</td>
                                <td>{{$x->item->unit}}</td>
                                <td>{{$x->number}} {{$x->item->unit}}</td>
                                <td>{{$x->status}}</td>
                                <td>{{$x->user->name}}</td>
                                <td>{{$x->updated_at}}</td>

                                <!-- <td><a href="{{route('admin.downloadDocItem' , ['id'=>$x->id])}}" class="btn btn-danger">Download Dokumen Pendukung</a></td> -->
                                <td>
                                    <a href="{{route('admin.runProgressItem' , ['id'=>$x->id])}}" class="btn btn-success">Run Progress</a>
                                </td>
                            </tr>
                            <?php  $t++ ;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="m-3 p-1">
                    <table class="display" id="table4">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Tujuan</th>
                                <th>Deskripsi Barang</th>
                                <th>Divisi</th>
                                <th>Satuan </th>
                                <th>Jumlah Stock</th>
                                <th>Status</th>
                                <th>Requester</th>
                                <th>Time </th>
                                <!-- <th>Dokumen Pendukung</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $t = 1 ?>
                        <tbody>

                            @foreach($onprog as $x)
                            <tr>
                                <td>{{$t}}</td>
                                <td>{{$x->item->item_name}}</td>
                                <td>{{$x->tujuan}}</td>
                                <td>{{$x->description}}</td>
                                <td>{{$x->divisi->name}}</td>
                                <td>{{$x->item->unit}}</td>
                                <td>{{$x->number}} {{$x->item->unit}}</td>
                                <td>{{$x->status}}</td>
                                <td>{{$x->user->name}}</td>
                                <td>{{$x->updated_at}}</td>
                                <!-- <td>
                                    <a href="{{route('admin.downloadDocItem' , ['id'=>$x->id])}}" class="btn btn-danger">Download Dokumen Pendukung</a>
                                </td> -->
                                <td>
                                    <a href="{{route('admin.doneProgressItem' , ['id'=>$x->id])}}" class="btn btn-success">Run progres</a>
                                </td>
                            </tr>

                            <?php  $t++ ;?>

                            @endforeach

                        </tbody>


                    </table>
                </div>
            </div>
            
            <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-contact-3">
                <div class="m-3 p-1">
                    <table class="display" id="table5">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Tujuan</th>
                                <th>Deskripsi Barang</th>
                                <th>Divisi</th>
                                <th>Satuan</th>
                                <th>Jumlah Stock</th>
                                <th>Status</th>
                                <th>Requester</th>
                                <th>Time </th>
                                <th>Dokumen Pendukung</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $t = 1 ?>
                        <tbody>

                            @foreach($done as $x)
                            <tr>
                                <td>{{$t}}</td>
                                <td>{{$x->item->item_name}}</td>
                                <td>{{$x->tujuan}}</td>
                                <td>{{$x->description}}</td>
                                <td>{{$x->divisi->name}}</td>
                                <td>{{$x->item->unit}}</td>
                                <td>{{$x->number}} {{$x->item->unit}}</td>
                                <td>{{$x->status}}</td>
                                <td>{{$x->user->name}}</td>
                                <td>{{$x->updated_at}}</td>
                                <td>
                                    <a href="{{route('admin.downloadDocItem' , ['id'=>$x->id])}}" class="btn btn-danger">Download Dokumen Pendukung</a>
                                </td>
                                <td>
                                    <a class="btn btn-success">Finished</a>

                                </td>
                            </tr>

                            <?php  $t++ ;?>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="m-3 p-1">
                    <table class="display" id="table6">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Tujuan</th>
                                <th>Deskripsi Barang</th>
                                <th>Divisi</th>
                                <th>Satuan </th>
                                <th>Jumlah Stock</th>
                                <th>Status</th>
                                <th>Requester</th>
                                <th>Time </th>
                                <!-- <th>Dokumen Pendukung</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $t = 1 ?>
                        <tbody>

                            @foreach($rejected as $x)
                            <tr>
                                <td>{{$t}}</td>
                                <td>{{$x->item->item_name}}</td>
                                <td>{{$x->tujuan}}</td>
                                <td>{{$x->description}}</td>
                                <td>{{$x->divisi->name}}</td>
                                <td>{{$x->item->unit}}</td>
                                <td>{{$x->number}} {{$x->item->unit}}</td>
                                <td>{{$x->status}}</td>
                                <td>{{$x->user->name}}</td>
                                <td>{{$x->updated_at}}</td>
                                <!-- <td><a href="{{route('admin.downloadDocItem' , ['id'=>$x->id])}}" class="btn btn-danger">Download Dokumen Pendukung</a></td> -->
                                <td>
                                    <a href="{{route('admin.acceptRequestItem' , ['id'=>$x->id])}}" class="btn btn-success">Accept Request</a>                                    
                                </td>
                            </tr>

                            <?php  $t++ ;?>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
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
        $('#table2').DataTable();
    });
    $(document).ready(function () {
        $('#table3').DataTable();
    });

    $(document).ready(function () {
        $('#table4').DataTable();
    });

    $(document).ready(function () {
        $('#table5').DataTable();
    });

    $(document).ready(function () {
        $('#table6').DataTable();
    });

    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>
@endpush
