<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SP4 FISIP UNSYIAH</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('includes.base.style')
 

  <!-- =======================================================
  * Template Name: Ninestars - v4.3.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <livewire:styles />
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="{{ url('/') }}"><span><img src="assets/img/Logo SP4 FISIP UNSYIAH.png"
                alt=""></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
          <li><a class="nav-link scrollto {{ request()->is('dokumen') ? 'active' : '' }}" href="{{ url("/dokumen") }}">Dokumen</a></li>
          <li><a class="nav-link scrollto {{ request()->is('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">SOP</a></li>
          <li><a class="nav-link scrollto" href="#team">Laporan Kinerja</a></li>
          <li class="dropdown"><a href="#"><span>Kontrak Kinerja</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">KK Dekan dan Rektor</a></li>
              <li><a href="#">KK Dekan dan Prodi</a></li>
              <li><a href="#">Tahun</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>IKU</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Tahun</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Triwulan 1</a></li>
                  <li><a href="#">Triwulan 2</a></li>
                  <li><a href="#">Triwulan 3</a></li>
                  <li><a href="#">Triwulan 4</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>

          @auth
          <li><a class="getstarted scrollto" href="{{ route('dashboard') }}">Beranda</a></li>
          @endauth
          @guest
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Masuk</a></li>
          @endguest
        
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
 
  {{-- Content --}}
  {{ $slot }}
  {{-- End Content --}}

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SP4 Unsyiah</h3>
            <p>
                Jl. Tgk. Hasan Krueng Kalee, Kopelma Darussalam, Kec. Syiah Kuala,  <br>
                Kota Banda Aceh, Aceh 24415<br>
              Indonesia <br><br>
              <strong>Nomor Telepon:</strong> +62 2222 3333<br>
              <strong>Email:</strong> FisipUnsyiah@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Link Pintasan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("/dokumen") }}">Dokumen</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/galeri') }}">Galeri</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kontak</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Program Studi</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ilmu Pemerintahan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politik</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Komunikasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sosiologi</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Media Sosial</h4>
            <p>Ikuti Sosial Media Kami</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Ninestars</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


      @include('includes.base.script')

  <livewire:scripts />

</body>

</html>