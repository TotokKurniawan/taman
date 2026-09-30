@extends('layoutLanding.app')
@section('content')
    <section class="hero-section" id="hero">
        <div class="hero-overlay">
            <div class="container d-flex align-items-center justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 data-aos="fade-up" class="display-4 fw-bold text-white">
                        Selamat Datang di Sony Nursery
                    </h1>
                    <p class="lead text-white mt-3" data-aos="fade-up" data-aos-delay="100">
                        Menyediakan layanan taman dengan profesionalitas tinggi dan kepuasan pelanggan sebagai prioritas
                        utama.
                    </p>
                    <div class="hero-buttons" data-aos="fade-up" data-aos-delay="200">
                        <a href="" class="btn btn-success btn-lg mt-4">
                            Mulai Sekarang
                        </a>
                        <a href="{{ route('about') }}#gallery" class="btn btn-info btn-lg mt-4">
                            Lihat Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CSS -->
    <style>
        .hero-section {
            position: relative;
            width: 100%;
            height: 70vh;
            background: url('{{ asset('assets/img/lahan.jpg') }}') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-overlay {
            position: relative;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }

        /* Geser konten ke atas */
        .hero-overlay .container {
            transform: translateY(-30%);
        }

        .hero-overlay h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            margin-bottom: 20px;
        }

        .hero-overlay p {
            font-size: 1.25rem;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.6);
        }

        .hero-buttons a {
            transition: all 0.3s ease;
            margin: 0 10px;
        }

        .hero-buttons a:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .btn-lg {
            padding: 12px 30px;
            font-size: 1.2rem;
            border-radius: 8px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-overlay h1 {
                font-size: 2.5rem;
            }

            .hero-overlay p {
                font-size: 1rem;
            }
        }
    </style>

    <main id="main">
        <!-- ======= Home Section ======= -->
        <section class="section" style="background: white">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-7" data-aos="fade-up">
                        <h2 class="section-heading">
                            Ubah Tamanmu Menjadi Mahakarya Alam
                        </h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1">
                                <i class="bi bi-flower1"></i>
                            </div>
                            <h3 class="mb-3">Pemesanan Bunga</h3>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1"><i class="bi bi-tree"></i>
                            </div>
                            <h3 class="mb-3">Pembuatan Taman</h3>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1"><i class="bi bi-droplet"></i>
                            </div>
                            <h3 class="mb-3">Pembuatan Kolam</h3>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1">
                                <i class="bi bi-sun"></i>
                            </div>
                            <h3 class="mb-3">Pemesanan Dekorasi Taman</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" style="background: #f8f9fa">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-10" data-aos="fade-up">
                        <h2 class="section-heading">Tata Cara Pemesanan</h2>
                    </div>
                </div>
                <div class="row justify-content-center text-center mb-5" data-aos="fade">
                    <!-- Visi -->
                    <div class="col-md-3 mb-5">
                        <h3>Visi</h3>
                        <p>
                            Menjadi penyedia jasa pembuatan taman yang profesional dan terpercaya, memberikan solusi taman
                            yang indah dan ramah lingkungan untuk setiap pelanggan.
                        </p>
                    </div>

                    <!-- Foto Gambar -->
                    <div class="col-md-4 mb-5 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assetsuser/logo.png') }}" alt="Image" class="img-fluid"
                            style="max-width: 50%; height: auto;" />
                    </div>

                    <!-- Misi -->
                    <div class="col-md-3 mb-5">
                        <h3>Misi</h3>
                        <p>
                            1. Mengutamakan kualitas dan ketepatan waktu dalam setiap proyek yang kami tangani.<br>
                            2. Menyediakan desain taman yang sesuai dengan keinginan dan kebutuhan pelanggan.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="step">
                            <span class="number">01</span>
                            <h3>Daftar dan login akun</h3>
                            <p>
                                Pendaftaran akun yang mudah secara step by step dan login akun.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step">
                            <span class="number">02</span>
                            <h3>Pesan Taman</h3>
                            <p>Pesan taman sesuai dengan tema anda dan bunga yang ada.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step">
                            <span class="number">03</span>
                            <h3>Pesanan Diproses</h3>
                            <p>Pemrosesan dan pengerjaan oleh Sony Nursery.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step">
                            <span class="number">04</span>
                            <h3>Pesanan Selesai</h3>
                            <p>Pesanan telah dikerjakan dan pembayaran oleh pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 me-auto">
                        <h2 class="mb-4">Pesan Layanan Taman dengan Mudah</h2>
                        <p class="mb-4">
                            Sony Nursery menyediakan layanan pemesanan taman secara online, mulai dari desain hingga
                            perawatan.
                            Dengan mudah, Anda dapat memilih jenis taman yang Anda inginkan dan melakukan pemesanan langsung
                            dari
                            kenyamanan rumah Anda.
                        </p>
                        <p><a href="" class="btn btn-primary">Pesan Sekarang</a></p>
                    </div>
                    <div class="col-md-6" data-aos="fade-left">
                        <img src="{{ asset('assetsuser/img/undraw_svg_2.svg') }}" alt="Layanan Taman" class="img-fluid" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Layanan Section -->
        <section id="layanan" class="layanan section " style="background: #f8f9fa">

            <!-- Section Title -->
            <div class="container section-title text-center" data-aos="fade-up">
                <h2>Layanan</h2>
                <p>Berikut adalah layanan yang tersedia di Sony Nursery</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    <div class="col-xl-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('assetsuser/img/features.svg') }}" class="img-fluid"
                            alt="Layanan Sony Nursery">
                    </div>

                    <div class="col-xl-7 d-flex" data-aos="fade-up" data-aos-delay="200">

                        <div class="row align-self-center gy-5">

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-award"></i>
                                <div>
                                    <h4>Desain dan Pembuatan Taman</h4>
                                    <p>Layanan ini membantu Anda dalam mendesain dan membangun taman yang sesuai dengan
                                        keinginan.</p>
                                </div>
                            </div><!-- End Layanan Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-card-checklist"></i>
                                <div>
                                    <h4>Perawatan Taman</h4>
                                    <p>Kami menyediakan layanan pemeliharaan taman agar tetap asri dan indah setiap saat.
                                    </p>
                                </div>
                            </div><!-- End Layanan Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-dribbble"></i>
                                <div>
                                    <h4>Penyediaan Tanaman Hias</h4>
                                    <p>Dapatkan berbagai jenis tanaman hias berkualitas untuk mempercantik taman Anda.</p>
                                </div>
                            </div><!-- End Layanan Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-filter-circle"></i>
                                <div>
                                    <h4>Konsultasi Lanskap</h4>
                                    <p>Dapatkan saran dari ahli lanskap kami untuk menciptakan taman yang harmonis dan
                                        fungsional.</p>
                                </div>
                            </div><!-- End Layanan Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-lightning-charge"></i>
                                <div>
                                    <h4>Pemesanan Online</h4>
                                    <p>Pesan layanan pembuatan dan perawatan taman dengan mudah melalui platform online
                                        kami.</p>
                                </div>
                            </div><!-- End Layanan Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-patch-check"></i>
                                <div>
                                    <h4>Profil dan Riwayat Pesanan</h4>
                                    <p>Lihat riwayat pesanan dan pantau perkembangan proyek taman Anda dalam satu aplikasi.
                                    </p>
                                </div>
                            </div><!-- End Layanan Item -->

                        </div>

                    </div>

                </div>

            </div>

        </section>

        @include('layoutLanding.cta2')

        <!-- Feature Details Section -->
        <section id="feature-details" class="feature-details section" style="background: white">

            <div class="container">
                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
                        <!-- Mengatur ukuran gambar agar tidak terlalu besar -->
                        <img src="{{ asset('assetsuser/img/features-3.png') }}" class="img-fluid" alt=""
                            style="max-width: 60%; height: auto;">
                    </div>
                    <div class="col-md-7" data-aos="fade-up">
                        <h3>Kemudahan Pemesanan Taman dengan Sekali Sentuhan</h3>
                        <p>Dengan *Sony Nursery*, Anda dapat memesan layanan pembuatan taman dengan mudah dan cepat.
                            Tak perlu repot mencari jasa landscaper, cukup buka aplikasi dan pilih desain taman yang Anda
                            inginkan.</p>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Akses instan ke berbagai layanan pembuatan dan perawatan
                                    taman.</span></li>
                            <li><i class="bi bi-check"></i><span> Pesan dan konsultasikan desain taman impian Anda dengan
                                    mudah.</span></li>
                            <li><i class="bi bi-check"></i> <span>Dapatkan taman yang indah dan asri untuk rumah atau
                                    tempat usaha Anda.</span></li>
                        </ul>
                    </div>
                </div><!-- Features Item -->

            </div>

        </section><!-- /Feature Details Section -->

        @include('layoutLanding.Faq')
        @include('layoutLanding.cta')
    </main>
    <!-- End #main -->
@endsection
