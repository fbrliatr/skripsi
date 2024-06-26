<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devcrud">
    <title>Home</title>
    <link rel="shortcut icon" href="{{url('images')}}/sasak_logo.png" />
    <!-- font icons -->
    <link rel="stylesheet" href="{{url('vendors')}}/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="{{url('css')}}/landing-page.css">

    {{--    table --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" data-spy="affix" data-offset-top="0">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{url('images')}}/logo_text.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Tutorial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Kontak</a>
                    </li>

                    @guest
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="{{route('login')}}">Login</a>
                    </li>

                    @else
                    <button class="btn btn-blue rounded ml-4" data-toggle="modal" data-target="#update">Update Profile</button>

                    @if(\Illuminate\Support\Facades\Auth::user()->role =='admin')
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="{{route('admin.index')}}">Dashboard Admin</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="btn btn-danger rounded ml-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of page navibation -->





    <!-- Page Header -->
    <header class="header" id="home">
        <div class="container">
            <div class="infos">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif(session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
                @endif
                <h6 class="subtitle">Welcome to</h6>
                <h6 class="title">Sampah Saku</h6>
                <br>
                <p>Aplikasi Manajemen Bank Sampah Capetang</p>

                <div class="buttons pt-3">
                    <button class="btn btn-primary rounded" data-toggle="modal" data-target="#tambah">Riwayat Transaksi</button>
                    <!-- <button class="btn btn-primary rounded" data-toggle="modal" data-target="#tambahNon">Pelaporan Stok Barang</button> <br> -->

                    @guest
                    @else
                    <button class="btn btn-dark rounded mt-2" data-toggle="modal" data-target="#requestItem">Cek Status Request</button>
                    <div class="modal fade" id="requestItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl    modal-fullscreen" style="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Status Request</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table.table-responsive" id="table3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Tujuan</th>
                                                <th>Deskripsi</th>
                                                <th>Divisi</th>
                                                <th>Jumlah Kebutuhan</th>
                                                <th>Status</th>
                                                <th>Requester</th>
                                                <th>Time Stamp</th>
                                                <th>Bukti Terima</th>
                                                <!-- <th>Dokumen Pendukung</th> -->
                                            </tr>
                                        </thead>
                                        <?php $t = 1 ?>
                                        <tbody>

                                            @foreach($itemreq as $x)
                                            <tr>
                                                <td>{{$t}}</td>
                                                <td>{{$x->item->item_name}}</td>
                                                <td>{{$x->tujuan}}</td>
                                                <td>{{$x->description}}</td>
                                                <td>{{$x->divisi->name}}</td>
                                                <td>{{$x->number}} {{$x->item->unit}}</td>
                                                <td>{{$x->status}}</td>
                                                <td>{{$x->user->name}}</td>
                                                <td>{{$x->created_at}}</td>
                                                <td>
                                                    @if ($x->status === 'On Progress')
                                                        <a href="{{ route('formBukti' , ['id'=>$x->id]) }}" data-toggle="modal" data-target="#formBukti" class="btn btn-primary">Upload Bukti</a></td>
                                                    @elseif ($x->status === 'Done')
                                                        <button type="button" class="btn btn-success" disabled>Uploaded!</button>
                                                    @else
                                                        <button type="button" class="btn btn-primary" disabled>Upload Bukti</button>
                                                    @endif                                          
                                                
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
                   
                    <div class="modal fade" id="formBukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Terima</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <form action="{{ route('formBukti') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body bg-white">
                                    @foreach($itemreq as $x)
                                    <div class="form-group">
                                            <input type="hidden" name="request_id" value="{{ $x->id }}">
                                            <label for="file">Upload Bukti Terima</label>
                                            <input type="file" class="form-control-file" id="file" name="image">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    @endforeach

                                </form>
                            </div>
                           
                        </div>
                        
                    </div>
                    

                </div>

                    <!-- <button class="btn btn-dark rounded mt-2" data-toggle="modal" data-target="#requestNonItem">Riwayat Pelaporan</button>
                    <div class="modal fade" id="requestNonItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl    modal-fullscreen" style="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Riwayat Pelaporan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-responsive display" id="table3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Judul Permintaan</th>
                                                <th>Deskripsi</th>
                                                <th>Nama Provinsi</th>
                                                <th>Nama Kota</th>
                                                <th>Nama Divisi</th>
                                                <th>Luas Pasar yang Dibangun (m&#xB2;)</th>
                                                <th>Status</th>
                                                <th>User yang Request</th>
                                                <th>Dokumen Pendukung</th>
                                            </tr>
                                        </thead>
                                        <?php $t = 1 ?>
                                        <tbody>

                                            @foreach($itemnonreq as $x)
                                            <tr>
                                                <td>{{$t}}</td>
                                                <td>{{$x->title}}</td>
                                                <td>{{$x->description}}</td>
                                                <td>{{$x->provinsi->name}}</td>
                                                <td>{{$x->kota->name}}</td>
                                                <td>{{$x->divisi->name}}</td>
                                                <td>{{$x->number}}</td>
                                                <td>{{$x->status}}</td>
                                                <td>{{$x->user->name}}</td>
                                                <td><a href="{{route('admin.downloadDocNonItem' , ['id'=>$x->id])}}" class="btn btn-danger">Download Dokumen Pendukung</a></td>
                                            </tr>

                                            <?php  $t++ ;?>

                                            @endforeach

                                        </tbody>


                                    </table>

                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                @guest
                                <div class="modal-body">
                                    <h1 class="text-center justify-content-center">Harap Login Terlebih Dahulu</h1>
                                </div>
                                @else
                                <form action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body bg-white">
                                        <div class="form-group m-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Divisi</label>
                                            <input type="text" name="divisi" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->divisi}}">
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                    @endguest


                </div>

                <!-- Modal -->
                <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lihat Riwayat Transaksi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            @guest
                            <div class="modal-body">
                                <h1 class="text-center justify-content-center">Harap Login Terlebih Dahulu</h1>
                            </div>
                            @else
                            <form action="{{route('storeItemRequest')}}" method="post" enctype="multipart/form-data">
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

                                    <div class="form-group m-3">
                                        <label for="">Tujuan</label>
                                        <textarea type="text" name="tujuan" class="form-control"> </textarea>
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Deskripsi Barang</label>
                                        <textarea type="text" name="description" class="form-control"> </textarea>
                                </div>

                                    <div class="form-group m-3">
                                        <!-- <label for="">Divisi</label> -->
                                        <!-- <input name="" class="form-control" value="{{ $user }}">
                                        <input name="divisi_id" class="form-control" value="{{ $user_id }}"> -->
                                        <select name="divisi_id" class="form-control" id="">
                                            @foreach($divisi as $z)
                                            <option value="{{$z->id}}">{{$z->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Jumlah Kebutuhan</label>
                                        <input type="number" name="number" class="form-control">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="file">Upload File Pendukung</label>
                                        <input type="file" class="form-control-file" id="file" name="file">
                                    </div> -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="img-holder">
                <img src="{{url('images')}}/wastebank.png" alt="">
            </div>
        </div>

        <!-- Header-widget -->
        <div class="widget">
            <div class="widget-item">
                <h2>{{ $requested }}</h2>
                <p>Pengajuan </p>
            </div>
            <div class="widget-item">
                <h2>{{ $onprog }}</h2>
                <p>Dalam Progress</p>
            </div>
            <div class="widget-item">
                <h2>{{$done}}</h2>
                <p>Selesai</p>
            </div>
        </div>
    </header>


    <!-- About section -->
    <section id="about" class="section mt-3">
        <div class="container mt-5">
            <div class="row text-center text-md-left">
                <div class="col-md-3">
                    <img src="{{url('images')}}/logo_text.png" alt="" class="img-thumbnail mb-4">
                </div>
                <div class="pl-md-4 col-md-9">
                    <h6 class="title">Sampah Saku</h6>
                    <p class="subtitle">Aplikasi Manajemen Bank Sampah Capetang</p>
                    <p align="justify">Sasak: Solusi inovatif untuk penjadwalan dan transaksi jual beli sampah pada Bank sampah Capetang  
                    SaSak menawarkan antarmuka yang user-friendly dan intuitif, memungkinkan Anda dengan mudah mencatat, melacak, dan mengelola persediaan dengan beberapa klik saja. Dapatkan informasi real-time tentang ketersediaan barang 
                    dan laporan yang detail untuk analisis yang lebih baik. Dengan PinVentory, Anda akan mengalami kemudahan dalam pengelolaan inventaris alat kantor, meningkatkan produktivitas tim, 
                    dan menghindari kerugian akibat kehilangan atau kekurangan persediaan. Segera coba PinVentory dan temukan cara baru yang efektif untuk mengatur inventaris alat kantor Anda.                    
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Service section -->
    <section id="service" class="section">
        <div class="container text-center">
            <h6 class="section-title mb-4">Panduan Request Barang</h6>
            <div class="row">
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="icon ti-pie-chart"></i>
                            <h5>1. Klik request barang</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="icon ti-desktop"></i>
                            <h5>2. Isi form request barang</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="icon ti-hand-stop"></i>
                            <h5>3. Klik save changes</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="icon ti-map"></i>
                            <h5>4. Cek status request</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Section -->

    <!-- Page Footer -->
    <footer class="page-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <p>Copyright
                        <script>
                            document.write(new Date().getFullYear())

                        </script>
                        &copy;
                        PT Pindad Enjiniring Indonesia 2023
                </div>
            </div>
        </div>
    </footer>
    <!-- End of page footer -->

    <!-- core  -->
    <script src="{{url('vendors')}}/jquery/jquery-3.4.1.js"></script>
    <script src="{{url('vendors')}}/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
    <script src="{{url('vendors')}}/bootstrap/bootstrap.affix.js"></script>

    <!-- steller js -->
    <script src="{{url('js')}}/landing-page.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#table3').DataTable();
        });

    </script>

</body>

</html>
