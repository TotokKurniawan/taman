@extends('layoutLanding.app')
@section('content')
    <main id="main">
        <div class="hero-section inner-page">
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
                                <h1 data-aos="fade-up" data-aos-delay="">Layanan Kami</h1>
                                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">
                                    Berikut adalah beberapa layanan unggulan kami
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section" style="background:white ">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-7 mb-5">
                        <h2 class="section-heading">Pilih Layanan</h2>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-4 mb-6 mb-lg-6">
                        <div class="pricing h-100 text-center popular">
                            <span class="popularity">Most Popular</span>
                            <h3>Pembuatan Taman </h3>
                            <h5 class="text-white">(Request Design)</h5>
                            <ul class="list-unstyled">
                                <br /><br />
                                <li>Memberikan foto design taman lebih bagus</li>
                                <li>Harga Sesuai request bunga dari pelanggan</li>
                            </ul>
                            <div class="price-cta">
                                <p><a class="btn btn-white">Pesan Sekarang</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-6 mb-lg-6">
                        <div class="pricing h-100 text-center popular">
                            <span class="popularity">Most Popular</span>
                            <h3>Pembuatan Taman</h3>
                            <h5 class="text-white">(Choose Design)</h5>
                            <ul class="list-unstyled">
                                <br /><br />
                                <li>Memilih design taman dari kami yang menurut pelanggan bagus</li>
                                <li>Harga Sesuai tema atau design yang dipilih</li>
                            </ul>
                            <div class="price-cta">
                                <p><a class="btn btn-white">Pesan Sekarang</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        @include('layoutLanding.cta')
        @include('layoutLanding.gallery')

    </main>
@endsection
