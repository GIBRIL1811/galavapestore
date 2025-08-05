@extends('layouts.user')

@section('header')
    <style>
        .full-img {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 180px;
        }
        #hero{
            background: url('{{asset('user/images/Ggs.png')}}') top center;
        }
        .image-center{
            display: block;
            margin-left: 6.5px;
            margin-right: 6.5px;
            width: 100%;
        } 
    </style>    
@endsection

@section('hero')
    <h1>Welcome to Gala Vapestore</h1>
    <h2>Toko vape terpercaya yang menyediakan produk berkualitas dan pengalaman vaping terbaik</h2>
    <a href="#about" class="btn-get-started">Get Started</a>
@endsection

@section('content')

      <!--========================== About Us Section ============================-->
      <section id="about">
        <div class="container">
          <div class="row about-container">
  
            <div class="col-lg-7 content order-lg-1 order-2">
              <h2 class="title">Tentang Kami</h2>
              @if($about && count($about) > 0)
                <p>{!! $about[0]->caption !!}</p>
              @else
                <p>GalaVape adalah toko vape modern yang menghadirkan berbagai pilihan device, liquid premium, dan aksesoris vaping untuk pemula maupun pro. Dengan pelayanan ramah dan harga kompetitif, kami hadir untuk memenuhi kebutuhan komunitas vaper di Indonesia.</p>
              @endif
            </div>
  
            <div class="col-lg-5 background order-lg-2 order-1 wow fadeInRight" 
                @if($about && count($about) > 0)
                    style="background: url('{{asset('about_image/'.$about[0]->image)}}') center top no-repeat; background-size: cover;"
                @else
                    style="background: url('{{asset('user/images/default.jpg')}}') center top no-repeat; background-size: cover;"  <!-- Default Image -->
                @endif
            ></div>
          </div>
  
        </div>
      </section>
  
      <!--========================== Services Section ============================-->
      <section id="services">
        <div class="container wow fadeIn">
          <div class="section-header">
            <h3 class="section-title">Mengapa Memilih Kami?</h3>
            <p class="section-description">Kami memberikan layanan dan produk terbaik bagi pengalaman vaping yang aman dan memuaskan.</p>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
              <div class="box">
                <div class="icon"><i class="fa fa-shield"></i></div>
                <h4 class="title">Kualitas Produk Terjamin</h4>
                <p class="description">Semua produk kami telah melalui proses kurasi ketat dan original dari distributor resmi.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
              <div class="box">
                <div class="icon"><i class="fa fa-money"></i></div>
                <h4 class="title">Harga Terjangkau</h4>
                <p class="description">Dapatkan device dan liquid favorit dengan harga bersaing tanpa mengorbankan kualitas.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
              <div class="box">
                <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                <h4 class="title">Pelayanan Ramah</h4>
                <p class="description">Tim kami siap membantu kamu memilih produk terbaik, dengan konsultasi gratis seputar vaping.</p>
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- #services -->
  
      <!--========================== Call To Action Section ============================-->
      <section id="call-to-action">
        <div class="container wow fadeIn">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3 class="cta-title">Bergabung dengan Komunitas GalaVape</h3>
              <p class="cta-text"> Temukan device terbaik, liquid favorit, dan suasana hangout seru di GalaVape. Dapatkan promo spesial dan informasi terkini seputar dunia vaping.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="#">Hubungi Kami</a>
            </div>
          </div>
  
        </div>
      </section>
  
      <!--========================== category Section ============================-->
      <section id="category">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">Produk Kami</h3>
            <p class="section-description">Temukan beragam kategori produk GalaVape yang dirancang untuk semua kebutuhan vaping kamu.</p>
          </div>
          <div class="row">
  
          <div class="row" id="category-wrapper">
            @foreach ($categories as $category)
                <div class="col-md-4 col-sm-12 category-item filter-app" >
                      <a href="">
                        <img src="{{asset('category_image/'.$category->image)}}" class="image-center">
                        <div class="details">
                          <h4>{{$category->name}}</h4>
                          <span>{{$category->description}}</span>
                        </div>
                      </a>
                </div>
            @endforeach  
          </div>
  
        </div>
      </section>
  
      <!--========================== Gallery Section ============================-->
      <section id="contact" style="padding-bottom:85px">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">Galeri</h3>
            <p class="section-description">Intip suasana toko kami, koleksi produk terbaru, dan keseruan komunitas GalaVape melalui galeri foto berikut.</p>
          </div>
        </div>
  
        <div class="container wow fadeInUp">
          <div class="row justify-content-center">
  
            <div class="col-lg-12 col-md-4">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/prambanan.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata2.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata3.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata4.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata5.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata6.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata7.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata8.png')}})">
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
      </section>
@endsection
