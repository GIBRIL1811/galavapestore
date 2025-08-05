<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Gala Vape Store</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Gala Vape Store, Vape, Toko Vape">
  <meta name="description" content="Selamat datang di Gala Vape Store, tempat terbaik untuk produk vape berkualitas.">

  <!-- Favicons -->
  <link href="{{ asset('user/images/favicon.png') }}" rel="icon">
  <link href="{{ asset('user/images/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- CSS Files -->
  <link href="{{ asset('user/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('user/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

  @yield('header')
</head>

<body>
  @php
    $url = request()->segment(1);
    $currentRoute = Route::currentRouteName();
  @endphp

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="{{ url('/') }}">
          <img src="{{ asset('user/images/icon.png') }}" alt="Logo Gala Vape Store" style="margin-right: 5px;" />
          <h2 class="d-inline text-light">Gala Vape Store</h2>
        </a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{ $url == 'home' ? 'menu-active' : '' }}"><a href="{{ url('home') }}">Home</a></li>
          <li class="{{ $url == 'produk' ? 'menu-active' : '' }}"><a href="{{ url('produk') }}">Produk</a></li>
          <li class="{{ $url == 'contact' ? 'menu-active' : '' }}"><a href="{{ url('contact') }}">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- ======= Hero Section (Optional) ======= -->
  @if (View::hasSection('hero') && $currentRoute !== 'produk.show')
    <section id="hero">
      <div class="hero-container">
        @yield('hero')
      </div>
    </section>
  @endif

  <!-- ======= Main Content ======= -->
  <main id="main">
    @yield('content')
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        {{-- Tambahkan konten footer di sini jika diperlukan --}}
      </div>
    </div>

    <div class="container text-center">
      <div class="copyright">
        &copy; {{ date('Y') }} <strong>Gala Vape Store</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('user/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('user/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('user/lib/superfish/superfish.min.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('user/js/main.js') }}"></script>

</body>
</html>

