<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devcrud">
    <title>PinVentory Landing page</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{url('vendors')}}/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="{{url('css')}}/landing-page.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" data-spy="affix" data-offset-top="0">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{url('images')}}/logo.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Kategori/a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About/a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="components.html">Perbandingan</a>
                    </li>
                    @guest


                    @else
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
                <h6 class="subtitle">Welcome to</h6>
                <h6 class="title">PinVentory</h6>
                <br>
                <p>Aplikasi Inventory Management</p>

                <div class="buttons pt-3">
                    <button class="btn btn-primary rounded">Request Barang</button>
                    <button class="btn btn-dark rounded">Periksa Status Request</button>
                </div>

            </div>
            <div class="img-holder">
                <img src="{{url('images')}}/inventory.png" alt="">
                <a href="https://www.flaticon.com/free-icons/inventory" title="inventory icons">Inventory icons created by Eucalyp - Flaticon</a>
            </div>
        </div>

        <!-- Header-widget -->
        <div class="widget">
            <div class="widget-item">
                <h2>124</h2>
                <p>Selesai</p>
            </div>
            <div class="widget-item">
                <h2>456</h2>
                <p>Dalam Proses</p>
            </div>
            <div class="widget-item">
                <h2>789</h2>
                <p>Menunggu</p>
            </div>
        </div>
    </header>
    <!-- End of Page Header -->

    <!-- About section -->
    <section id="about" class="section mt-3">
        <div class="container mt-5">
            <div class="row text-center text-md-left">
                <div class="col-md-3">
                    <img src="{{url('images')}}/pinventory-logo.png" alt="" class="img-thumbnail mb-4">
                </div>
                <div class="pl-md-4 col-md-9">
                    <h6 class="title">PinVentory</h6>
                    <p class="subtitle">Aplikasi Manajemen Inventory </p>
                    <p>PinVentory: Solusi inovatif untuk pengelolaan inventaris alat kantor PT Pindad Enjiniring Indonesia. Dengan aplikasi web ini, Anda dapat mengoptimalkan efisiensi dan ketepatan dalam mengelola semua peralatan kantor Anda. 
                    PinVentory menawarkan antarmuka yang user-friendly dan intuitif, memungkinkan Anda dengan mudah mencatat, melacak, dan mengelola persediaan dengan beberapa klik saja. Dapatkan informasi real-time tentang ketersediaan barang 
                    dan laporan yang detail untuk analisis yang lebih baik. Dengan PinVentory, Anda akan mengalami kemudahan dalam pengelolaan inventaris alat kantor, meningkatkan produktivitas tim, 
                    dan menghindari kerugian akibat kehilangan 
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
    <!-- End of Sectoin -->

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
                        PT Pindad Enjiniring Indonesia
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

</body>

</html>
