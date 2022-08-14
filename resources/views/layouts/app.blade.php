<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>e-Raport | @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/faviconRapot.png')}}">
	<link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css')}}">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{ asset('vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
</head>
<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('images/logo2.svg')}}" alt="">
                <img class="logo-compact" src="{{ asset('images/logoText.png')}}" alt="">
                <img class="brand-title" src="{{ asset('images/logoText.png')}}" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								@yield('title_header')
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    @role('Siswa')
                                    @if ($sis['foto'] != null)
                                        <img src="{{ asset('storage/foto_siswa/'.$sis['foto']) }}" width="20" alt="">
                                    @else
                                        <img src="{{ asset('images/profile/17.jpg')}}" width="20" alt=""/>
                                    @endif
                                    @endrole
                                    @role('Guru')
                                    @if ($guru['foto'] != null)
                                        <img src="{{ asset('storage/foto_guru/'.$guru['foto']) }}" width="20" alt="">
                                    @else
                                        <img src="{{ asset('images/profile/17.jpg')}}" width="20" alt=""/>
                                    @endif
                                    @endrole
                                    @role('Admin')
                                        <img src="{{ asset('images/profile/17.jpg')}}" width="20" alt=""/>
                                    @endrole
									<div class="header-info mr-3">
										<span class="text-black"><strong>{{ Auth::user()->name }}</strong></span>
										<p class="fs-12 mb-0">{{ Auth::user()->email }}</p>
									</div>
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- <a href="./app-profile.html" class="dropdown-item ai-icon">
                                            <i class="fa fa-user"></i>
                                            <span class="ml-2">Profile </span>
                                        </a> --}}
                                        <a href="route('logout')" class="dropdown-item ai-icon" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i class="fa fa-sign-out-alt"></i>
                                            <span class="ml-2">Logout </span>
                                        </a>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="deznav">
            @include('layouts.menu')
        </div>
        <div class="content-body">
			<div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by Imam 2021</p>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/global/global.min.js')}}"></script>
	<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/custom.min.js')}}"></script>
	<script src="{{ asset('js/deznav-init.js')}}"></script>
	<script src="{{ asset('vendor/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{ asset('vendor/peity/jquery.peity.min.js')}}"></script>
	<script src="{{ asset('vendor/apexchart/apexchart.js')}}"></script>
    @yield('js')
</body>
</html>