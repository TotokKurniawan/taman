<section id="gallery" class="gallery mt-4">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center" style="margin-bottom: 10px;">
            <h2
                style="
                font-size: 35px;
                font-weight: 700;
                color: #2c3e50;
                text-transform: uppercase;
                letter-spacing: 2px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            ">
                Galeri
            </h2>
            <p
                style="
                font-size: 18px;
                font-weight: 400;
                color: #555;
                max-width: 600px;
                margin: 0 auto;
                line-height: 1.6;
            ">
                Jelajahi koleksi foto hasil pekerjaan terbaik kami dalam bidang tanaman dan pertamanan.
            </p>
        </div>

        <!-- Filter Buttons -->
        <div class="text-center mb-4">
            <button class="filter-btn" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="relief-tebing">Relief Tebing</button>
            <button class="filter-btn" data-filter="kolam">Kolam</button>
            <button class="filter-btn" data-filter="taman">Taman</button>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kolam"
                data-description="Kolam indah dengan desain modern" data-land="50m²" data-price="Rp 5.000.000">
                <img src="{{ asset('assets/img/taman1 (1).jpg') }}" class="gallery-img" alt="Kolam">
            </div>
            <div class="col-lg-4 col-md-6 gallery-item" data-category="taman"
                data-description="Kolam minimalis untuk taman rumah" data-land="30m²" data-price="Rp 3.500.000">
                <img src="{{ asset('assets/img/taman1 (2).jpg') }}" class="gallery-img" alt="Kolam">
            </div>
            <div class="col-lg-4 col-md-6 gallery-item" data-category="taman"
                data-description="Taman hijau dengan dekorasi batu alam" data-land="70m²" data-price="Rp 7.000.000">
                <img src="{{ asset('assets/img/taman1 (3).jpg') }}" class="gallery-img" alt="Taman">
            </div>
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kolam"
                data-description="Taman hijau dengan dekorasi batu alam" data-land="70m²" data-price="Rp 7.000.000">
                <img src="{{ asset('assets/img/taman1 (4).jpg') }}" class="gallery-img" alt="Taman">
            </div>
            <div class="col-lg-4 col-md-6 gallery-item" data-category="taman"
                data-description="Taman hijau dengan dekorasi batu alam" data-land="70m²" data-price="Rp 7.000.000">
                <img src="{{ asset('assets/img/taman1 (5).jpg') }}" class="gallery-img" alt="Taman">
            </div>
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kolam"
                data-description="Taman hijau dengan dekorasi batu alam" data-land="70m²" data-price="Rp 7.000.000">
                <img src="{{ asset('assets/img/taman1 (6).jpg') }}" class="gallery-img" alt="Taman">
            </div>
            <div class="col-lg-4 col-md-6 gallery-item" data-category="taman"
                data-description="Taman hijau dengan dekorasi batu alam" data-land="70m²" data-price="Rp 7.000.000">
                <img src="{{ asset('assets/img/taman1 (7).jpg') }}" class="gallery-img" alt="Taman">
            </div>
            <div class="col-lg-4 col-md-6 gallery-item" data-category="relief-tebing"
                data-description="Taman hijau dengan dekorasi batu alam" data-land="70m²" data-price="Rp 7.000.000">
                <img src="{{ asset('assets/img/taman.jpg') }}" class="gallery-img" alt="Taman">
            </div>
            <div class="col-lg-4 col-md-6 gallery-item" data-category="relief-tebing"
                data-description="Taman hijau dengan dekorasi batu alam" data-land="70m²" data-price="Rp 7.000.000">
                <img src="{{ asset('assets/img/taman (2).jpg') }}" class="gallery-img" alt="Taman">
            </div>
        </div>
    </div>
</section>

<!-- Modal Popup -->
<div id="imageModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="modalImage" class="img-fluid" alt="">
        <p id="modalDescription"></p>
        <p id="modalLand"></p>
        <p id="modalPrice"></p>
    </div>
</div>

<style>
    .gallery-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 8px;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .gallery-item {
        padding: 10px;
    }

    .modal-content p {
        font-size: 18px;
        font-weight: 500;
        color: #333;
        margin: 5px;
        padding: 8px;
        border-radius: 5px;
    }


    .modal-content {
        background: white;
        margin: 10% auto;
        padding: 20px;
        width: 60%;
        text-align: center;
        border-radius: 8px;
    }

    .modal-content img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .close {
        position: absolute;
        right: 15px;
        top: 15px;
        font-size: 24px;
        cursor: pointer;
    }

    .filter-btn {
        background: linear-gradient(135deg, #4CAF50, #2E8B57);
        /* Gradasi hijau segar */
        color: white;
        border: none;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: 600;
        margin: 5px;
        border-radius: 25px;
        /* Membuat tombol lebih modern */
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.2);
    }

    .filter-btn:hover {
        background: linear-gradient(135deg, #2E8B57, #4CAF50);
        /* Efek hover lebih terang */
        transform: scale(1.05);
        box-shadow: 3px 6px 10px rgba(0, 0, 0, 0.3);
    }

    .filter-btn.active {
        background: #FF9800;
        /* Warna oranye saat tombol aktif */
        box-shadow: 0px 4px 10px rgba(255, 152, 0, 0.6);
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const galleryItems = document.querySelectorAll(".gallery-item");
        const filterButtons = document.querySelectorAll(".filter-btn");
        const modal = document.getElementById("imageModal");
        const modalImage = document.getElementById("modalImage");
        const modalDescription = document.getElementById("modalDescription");
        const modalLand = document.getElementById("modalLand");
        const modalPrice = document.getElementById("modalPrice");
        const closeModal = document.querySelector(".close");

        filterButtons.forEach(button => {
            button.addEventListener("click", function() {
                const filter = this.getAttribute("data-filter");
                galleryItems.forEach(item => {
                    if (filter === "all" || item.getAttribute("data-category") ===
                        filter) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });

        galleryItems.forEach(item => {
            item.addEventListener("click", function() {
                modal.style.display = "block";
                modalImage.src = this.querySelector("img").src;
                modalDescription.textContent = "Deskripsi: " + this.getAttribute(
                    "data-description");
                modalLand.textContent = "Spesifikasi Lahan: " + this.getAttribute("data-land");
                modalPrice.textContent = "Harga: " + this.getAttribute("data-price");
            });
        });

        closeModal.addEventListener("click", function() {
            modal.style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });
</script>
