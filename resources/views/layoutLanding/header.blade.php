  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex justify-content-between align-items-center">
          <div class="logo text-center text-white"
              style="display: flex; align-items: center; justify-content: center; gap: 10px;">
              <a href="#">
                  <img src="{{ asset('assets/logo.png') }}" alt="Sony Nursery Logo" class="img-fluid"
                      style="max-width: 100px;">
              </a>
              <p style="margin: 0; font-weight: bold;">Sony Nursery</p>
          </div>

          <nav id="navbar" class="navbar">
              <ul>
                  <li><a class="{{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                  <li><a class="{{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                  </li>
                  <li><a class="{{ Route::is('service') ? 'active' : '' }}" href="{{ route('service') }}">Layanan</a>
                  </li>
                  <li><a class="{{ Route::is('rekomendasi') ? 'active' : '' }}"
                          href="{{ route('rekomendasi') }}">Rekomendasi</a>
                  </li>
                  <li><a class="{{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a>

              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>

          <!-- .navbar -->
      </div>
  </header>
  <!-- End Header -->
