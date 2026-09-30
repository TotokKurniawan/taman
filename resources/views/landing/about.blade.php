@extends('layoutLanding.app')
@section('content')
    <main id="main">

        <section class="hero-section inner-page">
            <div class="wave">
                <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                            <path
                                d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z"
                                id="Path"></path>
                        </g>
                    </g>
                </svg>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-md-7 text-center hero-text">
                                <h1 data-aos="fade-up" data-aos-delay="">
                                    Tentang Sony Nursery
                                </h1>
                                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">
                                    Kenali kami sebagai para profesional dalam pembuatan taman.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section pb-5" style="background: white">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Bagian Gambar -->
                    <div class="col-md-5 text-center" data-aos="fade-right">
                        <img src="{{ asset('assetsuser/profil.jpg') }}" alt="Sony Nursery"
                            class="img-fluid rounded shadow-lg" />
                    </div>

                    <!-- Bagian Teks -->
                    <div class="col-md-7">
                        <h2 class="mb-3 text-center fw-bold">Tentang <span class="text-success">Sony Nursery</span></h2>
                        <p class="text-muted text-center">Solusi lengkap untuk kebutuhan kebun dan tanaman hias Anda.</p>

                        <p class="mb-4">Sony Nursery adalah toko spesialis dalam penjualan alat-alat kebun dan tanaman
                            hias.
                            Kami menyediakan berbagai alat kebun seperti alat pemangkas, alat penyiraman, pupuk, serta
                            tanaman hias yang dapat mempercantik rumah, taman, atau kantor Anda.</p>

                        <div class="bg-light p-3 rounded shadow-sm">
                            <h5 class="fw-bold">Kenapa Memilih Kami?</h5> <br>
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Akses cepat ke berbagai pedagang di sekitar Anda.
                                </li>
                                <li class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Membantu pedagang lokal mendapatkan lebih banyak pelanggan.
                                </li>
                                <li class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Kemudahan memesan produk dan jasa langsung dari perangkat Anda.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CSS -->
        <style>
            .section {
                padding-top: 60px;
                padding-bottom: 60px;
            }

            .section h2 {
                font-size: 28px;
                font-weight: bold;
            }

            .section p {
                font-size: 16px;
            }

            .btn {
                border-radius: 8px;
                font-size: 16px;
            }

            .shadow-sm {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
        </style>

        <br>
        <br>

        <section class="skills mt-4 py-5 bg-light">
            <div class="container text-center">
                <h3 class="mb-4">Kami Ahli dalam Segala Hal tentang Tanaman dan Pertamanan</h3>
                <p class="fst-italic">Kami menyediakan layanan pemesanan tanaman, pembuatan taman, dan dekorasi taman
                    pernikahan.</p>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="progress-wrapper">
                            <span class="skill">🌿 Pemesanan Segala Tanaman <span class="val">100%</span></span>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-animated" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="progress-wrapper">
                            <span class="skill">🏡 Pembuatan Taman dan Kolam <span class="val">100%</span></span>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-animated" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="progress-wrapper">
                            <span class="skill">💐 Dekorasi Taman Pernikahan <span class="val">100%</span></span>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-animated" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br>

        @include('layoutLanding.Faq')

        <br>
        @include('layoutLanding.cta2')


        @include('layoutLanding.gallery')
    </main>
@endsection
