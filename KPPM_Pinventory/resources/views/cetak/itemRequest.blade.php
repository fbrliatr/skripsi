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
    <title>LAPORAN REQUEST ITEM</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Item Request</b></p>
        <p align="center">PT Pindad Enjiniring Indonesia</p>
        <br>
        <table class="static" align="center" rules="all" frame="box" border="2" style="width: 95z5; padding: 3px">
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
                <th>Time</th>
            </tr>
          
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->item->item_name }}</td>
                <td>{{ $item->tujuan }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->divisi->name }}</td>
                <td>{{ $item->item->unit }}</td>
                <td>{{ $item->number }} {{ $item->item->unit }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->updated_at }}</td>
            </tr>
            @endforeach
           
        </table>
    </div>
    <script type="text/javascript">
        window.print();

    </script>
</body>
</html>