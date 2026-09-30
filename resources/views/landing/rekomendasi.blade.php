@extends('layoutLanding.app')
@section('content')
    <main id="main">

        <section class="hero-section inner-page">
            <div class="wave">
                <svg width="1920px" height="265px" viewBox="0 0 1920 265" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <linearGradient id="softGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" stop-color="#f5f7fa" />
                        <stop offset="100%" stop-color="#e4e9f0" />
                    </linearGradient>
                    </defs>
                    <g transform="translate(0, -402)" fill="url(#softGradient)">
                        <path
                            d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z">
                        </path>
                    </g>
                </svg>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-md-7 text-center hero-text">
                                <h1 data-aos="fade-up">Rekomendasi Tanaman</h1>
                                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">
                                    Temukan tanaman yang sempurna untuk taman impian Anda
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" style="padding: 80px 0; background:#f5f7fa;">
            <div class="container">
                <div class="row g-4">

                    <!-- Left Sidebar -->
                    <div class="col-lg-3" data-aos="fade-right">
                        <div class="benefits-sidebar">
                            <div class="benefit-card mb-4">
                                <div class="icon-box"><i class="fas fa-chart-line"></i></div>
                                <h5>Akurat & Terpercaya</h5>
                                <p>Sistem rekomendasi berdasarkan data dan pengalaman ahli</p>
                            </div>
                            <div class="benefit-card mb-4">
                                <div class="icon-box"><i class="fas fa-leaf"></i></div>
                                <h5>Beragam Pilihan</h5>
                                <p>Koleksi tanaman lengkap untuk berbagai konsep taman</p>
                            </div>
                            <div class="benefit-card mb-4">
                                <div class="icon-box"><i class="fas fa-book-open"></i></div>
                                <h5>Panduan Lengkap</h5>
                                <p>Tips perawatan dan informasi detail setiap tanaman</p>
                            </div>
                            <div class="benefit-card">
                                <div class="icon-box"><i class="fas fa-headset"></i></div>
                                <h5>Konsultasi Gratis</h5>
                                <p>Tim ahli siap membantu pilihan taman Anda</p>
                            </div>
                        </div>
                    </div>

                    <!-- Main Form -->
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="card shadow-lg border-0 main-form-card">
                            <div class="card-body p-5">
                                <div class="text-center mb-4">
                                    <div class="form-icon-header">
                                        <i class="fas fa-seedling"></i>
                                    </div>
                                    <h3 class="mt-3" style="color: #2c3e50; font-weight: 600;">Dapatkan Rekomendasi</h3>
                                    <p class="text-muted">Isi preferensi Anda untuk hasil terbaik</p>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <form id="wizardForm" action="{{ route('rekomendasi.proses') }}" method="POST">
                                    @csrf
                                    <div class="mb-4 form-group-custom">
                                        <label class="form-label fw-bold">Pilih Intensitas Cahaya (Kategori):</label>
                                        <select class="form-select form-select-lg" id="input0" name="sunlight" required>
                                            <option value="">Pilih...</option>
                                            <option value="Penuh">1. Penuh ( 6–8 jam terkena matahari langsung )</option>
                                            <option value="Rendah">2. Rendah ( 3–6 jam terkena matahari langsung )</option>
                                            <option value="Sebagian">3. Sebagian ( Kurang dari 3 jam terkena matahari
                                                langsung )</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 form-group-custom">
                                        <label class="form-label fw-bold">Pilih Intensitas Air (Kategori):</label>
                                        <select class="form-select form-select-lg" id="input1" name="intensitas_air"
                                            required disabled>
                                            <option value="">Pilih...</option>
                                            <option value="Sedang">1. Sedang ( 3–5 kali seminggu )</option>
                                            <option value="Rendah">2. Rendah ( 1–2 kali seminggu )</option>
                                            <option value="Tinggi">3. Tinggi ( 6–7 kali seminggu )</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 form-group-custom">
                                        <label class="form-label fw-bold">Pilih Cara Penyiraman (Frekuensi):</label>
                                        <select class="form-select form-select-lg" id="input2" name="cara_penyiraman"
                                            required disabled>
                                            <option value="">Pilih...</option>
                                            <option value="Harian">1. Harian</option>
                                            <option value="2-3 Hari Sekali">2. 2-3 Hari Sekali</option>
                                            <option value="Mingguan">3. Mingguan</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 form-group-custom">
                                        <label class="form-label fw-bold">Pilih Konsep Utama Taman:</label>
                                        <select class="form-select form-select-lg" id="input3" name="konsep_taman"
                                            required disabled>
                                            <option value="">Pilih...</option>
                                            <option value="Peneduh">1. Peneduh</option>
                                            <option value="Tropis">2. Tropis</option>
                                            <option value="Indoor">3. Indoor</option>
                                            <option value="Minimalis">4. Minimalis</option>
                                            <option value="Natural">5. Natural</option>
                                            <option value="Formal">6. Formal</option>
                                            <option value="Produktif">7. Produktif</option>
                                            <option value="Herbal/TOGA">8. Herbal/TOGA</option>
                                            <option value="Aromatik">9. Aromatik</option>
                                            <option value="Taman Kering">10. Taman Kering</option>
                                            <option value="Klasik">11. Klasik</option>
                                            <option value="Pagar Hidup">12. Pagar Hidup</option>
                                            <option value="Taman Vertikal">13. Taman Vertikal</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 form-group-custom">
                                        <label class="form-label fw-bold">Pilih Ukuran Taman yang Cocok (Kategori):</label>
                                        <select class="form-select form-select-lg" id="input4" name="ukuran_taman"
                                            required disabled>
                                            <option value="">Pilih...</option>
                                            <option value="Besar">1. Besar ( > 10 m² )</option>
                                            <option value="Sedang">2. Sedang ( 5–10 m² )</option>
                                            <option value="Kecil">3. Kecil ( < 5 m² )</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 form-group-custom">
                                        <label class="form-label fw-bold">Pilih Lokasi Penanaman (Indoor/Outdoor):</label>
                                        <select class="form-select form-select-lg" id="input5" name="indoor_use"
                                            required disabled>
                                            <option value="">Pilih...</option>
                                            <option value="Outdoor">1. Outdoor</option>
                                            <option value="Indoor">2. Indoor</option>
                                            <option value="Fleksibel">3. Fleksibel</option>
                                        </select>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" id="wizardSubmit"
                                            class="btn btn-lg btn-submit-custom px-5 py-3" disabled>
                                            Cari Rekomendasi Tanaman
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="col-lg-3" data-aos="fade-left">
                        <div class="right-sidebar">
                            <div class="stats-card mb-4">
                                <h5 class="mb-3">📊 Statistik</h5>
                                <div class="stat-item">
                                    <div class="stat-number">500+</div>
                                    <div class="stat-label">Jenis Tanaman</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">1.2K+</div>
                                    <div class="stat-label">Pengguna Aktif</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">95%</div>
                                    <div class="stat-label">Tingkat Kepuasan</div>
                                </div>
                            </div>
                            <div class="popular-card mb-4">
                                <h5 class="mb-3">🌟 Tanaman Populer</h5>
                                <div class="popular-item"><span class="badge">1</span><span>Jambu Air</span></div>
                                <div class="popular-item"><span class="badge">2</span><span>Mangga</span></div>
                                <div class="popular-item"><span class="badge">3</span><span>Sawo</span></div>
                                <div class="popular-item"><span class="badge">4</span><span>Duku</span></div>
                                <div class="popular-item"><span class="badge">5</span><span>Melati</span></div>
                            </div>
                            <div class="tips-card">
                                <h5 class="mb-3">💡 Tips Hari Ini</h5>
                                <p class="small">"Sirami tanaman di pagi hari untuk hasil terbaik. Hindari penyiraman saat
                                    siang terik."</p>
                                <div class="text-end"><small class="text-muted">- Tim Ahli Taman</small></div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Bottom Info -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="info-bottom-card" data-aos="fade-up">
                            <div class="row text-center g-4">
                                <div class="col-md-3">
                                    <div class="info-item">
                                        <i class="fas fa-shield-alt fa-3x mb-3"></i>
                                        <h6>Terpercaya</h6>
                                        <p class="small text-muted">Rekomendasi berdasarkan riset</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-item">
                                        <i class="fas fa-clock fa-3x mb-3"></i>
                                        <h6>Cepat & Mudah</h6>
                                        <p class="small text-muted">Hasil dalam hitungan detik</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-item">
                                        <i class="fas fa-user-friends fa-3x mb-3"></i>
                                        <h6>Konsultasi</h6>
                                        <p class="small text-muted">Bantuan dari ahli taman</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-item">
                                        <i class="fas fa-mobile-alt fa-3x mb-3"></i>
                                        <h6>Akses Mudah</h6>
                                        <p class="small text-muted">Tersedia di semua perangkat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('layoutLanding.gallery')
        @include('layoutLanding.cta')

    </main>

    {{-- ========== MODAL ========== --}}
    <div id="rekomendasiModal"
        style="
        display:none;
        position:fixed;
        inset:0;
        z-index:999999;
        background:rgba(0,0,0,0.6);
        align-items:center;
        justify-content:center;
        padding:16px;
        backdrop-filter:blur(4px);
    ">
        <div
            style="
            background:#fff;
            border-radius:24px;
            width:100%;
            max-width:760px;
            max-height:90vh;
            display:flex;
            flex-direction:column;
            box-shadow:0 25px 60px rgba(0,0,0,0.3);
            overflow:hidden;
            animation:modalSlideIn 0.35s ease;
        ">
            {{-- Header --}}
            <div
                style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);padding:30px 36px 26px;position:relative;flex-shrink:0;">
                <div style="display:flex;align-items:center;gap:16px;">
                    <div
                        style="width:56px;height:56px;border-radius:50%;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas fa-seedling" style="color:white;font-size:1.6rem;"></i>
                    </div>
                    <div>
                        <p
                            style="margin:0;font-size:12px;color:rgba(255,255,255,0.75);letter-spacing:0.08em;text-transform:uppercase;">
                            Hasil Analisis</p>
                        <p style="margin:0;font-size:20px;font-weight:600;color:white;">Rekomendasi Tanaman Terbaik</p>
                    </div>
                </div>
                <button onclick="tutupModal()"
                    style="
                    position:absolute;top:20px;right:20px;
                    width:36px;height:36px;border-radius:50%;
                    background:rgba(255,255,255,0.2);border:none;
                    color:white;font-size:1.1rem;cursor:pointer;
                    display:flex;align-items:center;justify-content:center;
                    transition:background 0.2s;
                "
                    onmouseover="this.style.background='rgba(255,255,255,0.35)'"
                    onmouseout="this.style.background='rgba(255,255,255,0.2)'">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            {{-- Body --}}
            <div id="rekomendasiModalBody" style="padding:28px 36px;overflow-y:auto;">
                {{-- Diisi via JS --}}
            </div>

            {{-- Footer --}}
            <div style="padding:18px 36px;border-top:1px solid #f0f0f0;display:flex;gap:12px;flex-shrink:0;">
                <button onclick="tutupModal()"
                    style="
                    flex:1;padding:13px;border-radius:12px;
                    border:1.5px solid #e0e0e0;background:transparent;
                    color:#6c757d;font-size:15px;font-weight:500;cursor:pointer;
                    transition:all 0.2s;
                "
                    onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='transparent'">
                    Tutup
                </button>
                <button onclick="tutupModal()"
                    style="
                    flex:2;padding:13px;border-radius:12px;
                    border:none;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);
                    color:white;font-size:15px;font-weight:600;cursor:pointer;
                    box-shadow:0 4px 15px rgba(102,126,234,0.4);transition:all 0.2s;
                "
                    onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    <i class="fas fa-check-circle me-2"></i>Oke, Mengerti
                </button>
            </div>
        </div>
    </div>

    <style>
        #rekomendasiModal {
            overflow: hidden !important;
            align-items: center;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ===== Grouped result layout (tipe -> daftar tanaman) ===== */
        .rekModal-divider {
            border: none;
            border-top: 1.5px dashed #e0e0e0;
            margin: 0 0 16px;
        }

        .rekModal-group {
            margin-bottom: 18px;
        }

        .rekModal-group:last-child {
            margin-bottom: 0;
        }

        .rekModal-group-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 16px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .rekModal-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .rekModal-group-name {
            flex: 1;
            font-size: 16.5px;
            font-weight: 700;
            color: #2c3e50;
        }

        .rekModal-group-percent {
            font-size: 15px;
            font-weight: 700;
        }

        .rekModal-plant-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px 11px 48px;
            border-radius: 10px;
            transition: background 0.15s ease;
        }

        .rekModal-plant-row:hover {
            background: #f8f9fa;
        }

        .rekModal-plant-idx {
            font-size: 14px;
            color: #9aa1ab;
            font-weight: 600;
            width: 20px;
            flex-shrink: 0;
        }

        .rekModal-plant-name {
            flex: 1;
            font-size: 15px;
            color: #2c3e50;
            font-weight: 500;
        }

        .rekModal-score {
            font-size: 13px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .rekModal-empty {
            text-align: center;
            padding: 30px 0;
            color: #6c757d;
        }

        /* Existing styles */
        .main-form-card {
            border-radius: 20px;
            background: white;
            animation: fadeInUp 0.6s ease;
        }

        .form-icon-header {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .form-icon-header i {
            font-size: 2.5rem;
            color: white;
        }

        .form-group-custom .form-select {
            border-radius: 12px;
            padding: 14px 20px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .form-group-custom .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
            transform: translateY(-2px);
        }

        .form-group-custom .form-select:hover {
            border-color: #667eea;
        }

        .form-label {
            color: #2c3e50;
            font-size: 0.95rem;
            margin-bottom: 0.75rem;
        }

        .btn-submit-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-submit-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.6);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .btn-submit-custom:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .benefits-sidebar .benefit-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .benefits-sidebar .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .benefits-sidebar .icon-box {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .benefits-sidebar .icon-box i {
            font-size: 1.8rem;
            color: white;
        }

        .benefits-sidebar h5 {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .benefits-sidebar p {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0;
            line-height: 1.6;
        }

        .right-sidebar .stats-card,
        .right-sidebar .popular-card,
        .right-sidebar .tips-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .right-sidebar h5 {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .stat-item {
            padding: 15px;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #f5f7fa 0%, #e3e9f0 100%);
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .popular-item {
            display: flex;
            align-items: center;
            padding: 12px;
            margin-bottom: 10px;
            background: #f8f9fa;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .popular-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .popular-item .badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-weight: 600;
        }

        .popular-item span:last-child {
            color: #2c3e50;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .tips-card {
            background: linear-gradient(135deg, #ffeaa7 0%, #fdcb6e 100%) !important;
        }

        .tips-card p {
            color: #2c3e50;
            line-height: 1.7;
        }

        .info-bottom-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .info-item i {
            color: #667eea;
            transition: all 0.3s ease;
        }

        .info-item:hover i {
            transform: scale(1.1);
            color: #764ba2;
        }

        .info-item h6 {
            color: #2c3e50;
            font-weight: 600;
            margin-top: 10px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @media (max-width:991px) {

            .benefits-sidebar,
            .right-sidebar {
                margin-bottom: 30px;
            }
        }
    </style>

    <script>
        // Warna per-rank untuk tiap grup tipe tanaman (1st, 2nd, 3rd, ...)
        const rankColors = ['#667eea', '#764ba2', '#e17055', '#00b894', '#0984e3'];
        const rankBgColors = [
            'rgba(102,126,234,0.12)',
            'rgba(118,75,162,0.12)',
            'rgba(225,112,85,0.12)',
            'rgba(0,184,148,0.12)',
            'rgba(9,132,227,0.12)'
        ];
        // Lambang bulat bernomor ①②③... untuk tiap tipe
        const circleNumerals = ['①', '②', '③', '④', '⑤', '⑥', '⑦', '⑧', '⑨'];

        let scrollY = 0;

        function tutupModal() {
            const modal = document.getElementById('rekomendasiModal');
            modal.style.opacity = '0';
            modal.style.transition = 'opacity 0.25s ease';
            setTimeout(() => {
                modal.style.display = 'none';
                modal.style.opacity = '';
                modal.style.transition = '';
                // Unlock scroll & kembalikan posisi
                document.body.style.overflow = '';
                document.body.style.position = '';
                document.body.style.width = '';
                document.body.style.top = '';
                document.documentElement.style.overflow = '';
                window.scrollTo(0, scrollY); // ← kembalikan ke posisi semula
            }, 250);
        }

        function bukaModal(html) {
            const modal = document.getElementById('rekomendasiModal');
            document.getElementById('rekomendasiModalBody').innerHTML = html;
            modal.style.display = 'flex';
            scrollY = window.scrollY;
            document.body.style.top = `-${scrollY}px`; // ← kunci posisi
            document.body.style.overflow = 'hidden';
            document.body.style.position = 'fixed';
            document.body.style.width = '100%';
            document.documentElement.style.overflow = 'hidden';
        }
        document.getElementById('rekomendasiModal').addEventListener('click', function(e) {
            if (e.target === this) tutupModal();
        });

        // Tutup modal dengan Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') tutupModal();
        });

        function escapeHtml(str) {
            return String(str)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;');
        }

        const SKOR_MAKS = 6;

        function renderHasil(data) {
            const groups = (data && (data.rekomendasi || data.top_types)) || [];

            if (!groups.length) {
                return '<div class="rekModal-empty"><i class="fas fa-leaf fa-2x mb-3" style="color:#ddd;display:block;"></i>Tidak ada rekomendasi ditemukan.</div>';
            }

            let html = '<hr class="rekModal-divider">';

            groups.forEach(function(group, idx) {
                const color = rankColors[idx % rankColors.length];
                const bg = rankBgColors[idx % rankBgColors.length];
                const numeral = circleNumerals[idx] || (idx + 1) + '.';
                const nama = escapeHtml(group.tipe || group.nama || group.type || '');
                const persenRaw = group.persen !== undefined ? group.persen : group.percentage;
                const persen = (persenRaw !== undefined && persenRaw !== null && persenRaw !== '') ?
                    Number(persenRaw).toFixed(2) + '%' : '';

                html += `<div class="rekModal-group">`;
                html += `
                    <div class="rekModal-group-header" style="background:${bg};">
                        <div class="rekModal-circle" style="background:${color};">${idx < 9 ? '' : (idx+1)}</div>
                        <span class="rekModal-group-name">${numeral} ${nama}</span>
                    </div>`;

                const plants = group.tanaman || group.plants || [];
                plants.slice(0, 5).forEach(function(tanaman, pIdx) {
                    const pNama = escapeHtml(typeof tanaman === 'object' ? (tanaman.nama || '') : tanaman);

                    html += `
                        <div class="rekModal-plant-row">
                            <span class="rekModal-plant-idx">${pIdx + 1}.</span>
                            <span class="rekModal-plant-name">${pNama}</span>
                        </div>`;
                });

                html += `</div>`;
            });

            return html;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Enable/disable wizard step-by-step
            for (let i = 1; i < 6; i++) {
                const prev = document.getElementById('input' + (i - 1));
                const curr = document.getElementById('input' + i);
                if (curr && prev && prev.value) curr.disabled = false;
            }
            let allFilled = true;
            for (let j = 0; j < 6; j++) {
                if (!document.getElementById('input' + j).value) allFilled = false;
            }
            document.getElementById('wizardSubmit').disabled = !allFilled;

            for (let i = 0; i < 6; i++) {
                const curr = document.getElementById('input' + i);
                if (curr) {
                    curr.addEventListener('change', function() {
                        if (this.value && i < 5) {
                            document.getElementById('input' + (i + 1)).disabled = false;
                            document.getElementById('input' + (i + 1)).focus();
                        }
                        let allFilled = true;
                        for (let j = 0; j < 6; j++) {
                            if (!document.getElementById('input' + j).value) allFilled = false;
                        }
                        document.getElementById('wizardSubmit').disabled = !allFilled;
                    });
                }
            }

            // AJAX submit
            document.getElementById('wizardForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const btn = document.getElementById('wizardSubmit');
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
                btn.disabled = true;

                const form = e.target;
                const formData = new FormData(form);

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': form.querySelector('[name=_token]').value
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        btn.innerHTML = 'Cari Rekomendasi Tanaman';
                        btn.disabled = false;
                        bukaModal(renderHasil(data));
                    })
                    .catch(() => {
                        btn.innerHTML = 'Cari Rekomendasi Tanaman';
                        btn.disabled = false;
                        bukaModal(
                            '<div class="rekModal-empty"><i class="fas fa-exclamation-circle fa-2x mb-3" style="color:#e74c3c;display:block;"></i>Terjadi kesalahan. Silakan coba lagi.</div>'
                        );
                    });
            });
        });
    </script>
@endsection
