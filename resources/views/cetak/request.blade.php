<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>LAPORAN DATA PERMINTAAN BARANG</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Permintaan Barang</b></p>
        <p align="center">PT Pindad Enjiniring Indonesia</p>
        <br>
        <table class="static" align="center" rules="all" frame="box" border="2" style="width: 95z5; padding: 3px">
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Tujuan</th>
                <th>Divisi</th>
                <th>Satuan Unit</th>
                <th>Jumlah Stock</th>
                <th>Status</th>
                <th>Requester</th>
                <th>Time</th>
            </tr>
            <?php $t = 1 ?>
            @foreach($dataCetak as $x)
            <tr>
                <td>{{$t}}</td>
                <td>{{$x->item->item_name}}</td>
                <td>{{$x->description}}</td>
                <td>{{$x->divisi->name}}</td>
                <td>{{$x->item->unit}}</td>
                <td>{{$x->number}} {{$x->item->unit}}</td>
                <td>{{$x->status}}</td>
                <td>{{$x->user->name}}</td>
                <td>{{$x->updated_at}}</td>
            </tr>
            <?php  $t++ ;?>

            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();

    </script>
</body>
</html>