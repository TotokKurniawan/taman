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
                                <h1 data-aos="fade-up" data-aos-delay="">Kontak Kami</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br><br>
        <section style="background:white ">
            <div class="container">
                <div class="row mb-5 align-items-end">
                    <div class="col-md-12" data-aos="fade-up">
                        <h2>Alamat Kami</h2>
                    </div>
                    <div class="col-md-12" data-aos="fade-up">
                        <br>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4142.808492036885!2d113.20972357963412!3d-7.742888353929107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7ad1589003275%3A0xe9e02d8b287f175c!2sSony%20nursery!5e0!3m2!1sid!2sid!4v1714632005303!5m2!1sid!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                style="width: 100%; height: 400px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row mb-5 align-items-end">
                    <div class="col-md-6" data-aos="fade-up">
                        <h2>Contact Form</h2>
                        <p class="mb-0">
                            Berikan pendapat atau konsultasi design anda kepada kami
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 ms-auto order-2" data-aos="fade-up">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <strong class="d-block mb-1">Alamat</strong>
                                <span>Jl. KH. Mansyur, Mayangan, Kec. Mayangan, Kota Probolinggo, Jawa Timur 67219</span>
                            </li>
                            <li class="mb-3">
                                <strong class="d-block mb-1">Phone</strong>
                                <span>+62 85706179485</span>
                            </li>
                            <li class="mb-3">
                                <strong class="d-block mb-1">Email</strong>
                                <span>totoksony348@gmail.com</span>
                            </li>
                            <li>
                                <div class="col-md-4 mb-4" data-aos="fade-up">
                                    <ul class="list-unstyled">
                                        <li class="mb-3">
                                            <strong class="d-block mb-1">Jam Operasional</strong>
                                            <span>Senin - Jumat: 08:00 - 17:00</span><br>
                                            <span>Sabtu: 08:00 - 16:00</span><br>
                                            <span>Minggu: Tutup</span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required />
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required />
                                </div>
                                <div class="col-md-12 form-group mt-3">
                                    <label for="name">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" required />
                                </div>
                                <div class="col-md-12 form-group mt-3">
                                    <label for="name">Message</label>
                                    <textarea class="form-control" name="message" required></textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">
                                        Your message has been sent. Thank you!
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="submit" class="btn btn-primary d-block w-100" value="Send Message" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @include('layoutLanding.cta')

    </main>
@endsection
