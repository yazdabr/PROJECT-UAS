<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('css/tampilan.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    a {
        text-decoration: none; /* Menghilangkan garis bawah */
    }
</style>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">Project UAS</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="/personals">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home" class="home-section">
        <div class="home-content">
            <!-- Teks Sebelah Kiri -->
             
            <div class="home-text">
                
                <h1>Hi There!
                    <i class="fas fa-hand icon-one"></i></h1>
            <h2><SPan>WELCOME</SPan> TO OUR PAGE</h2>
            <p>
                <span>Project</span> <!-- Teks "Project" -->
                <span id="dynamic-text">Laravel 11</span> <!-- Animasi teks -->
            </p>
            </div>
            
            <!-- Foto Bulat di Tengah -->
            <div class="home-photo">
                <img src="assets/coding.png" alt="Logo atau Foto" class="photo">
            </div>
        </div>
    </section>
    
    <section id="photo-gallery">
        <div class="text-container">
            <p id="gold-description"></p>
        </div>
        
        <div class="photo-container">
            <div class="slides">
                <div class="slide-photo">
                    <img src="assets/emas gelap 1.jpg" alt="Image 1">
                </div>
                <div class="slide-photo">
                    <img src="assets/emas gelap 2.jpg" alt="Image 2">
                </div>
                <div class="slide-photo">
                    <img src="assets/emas gelap 3.jpg" alt="Image 3">
                </div>
            </div>
        </div>
    </section>
    
    
    <br><br><br>
    


    <!-- About Section -->
    <br><br><br>
    
    <!-- Technologies Used Section -->
    <section id="technologies" class="technologies-section">
        <h2>Technologies We Use</h2>
        <div class="technology-table">
            <div class="technology-item">
                <img src="assets/html.png" alt="HTML" class="technology-image" onclick="showImage(0)">
                <p>HTML</p>
            </div>
            <div class="technology-item">
                <img src="assets/css.png" alt="CSS" class="technology-image" onclick="showImage(1)">
                <p>CSS</p>
            </div>
            <div class="technology-item">
                <img src="assets/js.png" alt="JavaScript" class="technology-image" onclick="showImage(2)">
                <p>JavaScript</p>
            </div>
            <div class="technology-item">
                <img src="assets/filament.png" alt="PHP" class="technology-image" onclick="showImage(3)">
                <p>Filament PHP</p>
            </div>
            <div class="technology-item">
                <img src="assets/laravel.png" alt="Laravel 11" class="technology-image" onclick="showImage(4)">
                <p>Laravel 11</p>
            </div>
            <div class="technology-item">
                <img src="assets/mysql.png" alt="MySQL" class="technology-image" onclick="showImage(5)">
                <p>MySQL</p>
            </div>
        </div>
       
    </section><br><br>
    <a href="/admin">
            <button class="center-button">GET STARTED</button>
        </a>
    <br>
    
    <br><br><br>
    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <h2>Contact Us</h2>
        <div class="contact-info">
            <p>Email: yazdabr@gmail.com</p>
            <p>Phone: +62 813 9111 1916</p>
        </div>
    </section>
    

    <!-- JavaScript -->
    <script src="respon.js"></script>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
    
                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });
        let currentSlide = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = document.querySelectorAll('.slide-photo').length;

        function changeSlide() {
            currentSlide++;
            
            if (currentSlide >= totalSlides) {
                currentSlide = 0; // Kembali ke gambar pertama setelah gambar terakhir
            }

            // Geser gambar dengan animasi slide
            slides.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        // Mengganti gambar setiap 3 detik
        setInterval(changeSlide, 3000);
        // Ganti gambar setiap 3 detik
        document.addEventListener("DOMContentLoaded", () => {
    const text = `Emas perhiasan adalah jenis logam mulia berbentuk perhiasan seperti gelang, kalung, cincin, anting, liontin, dan perhiasan lainnya.`;
    const goldDescription = document.getElementById("gold-description");
    let index = 0;
    let isDeleting = false;

    function typeWriterLoop() {
        if (!isDeleting && index < text.length) {
            // Menambah karakter satu per satu
            goldDescription.textContent += text.charAt(index);
            index++;
            setTimeout(typeWriterLoop, 30); // Kecepatan mengetik
        } else if (isDeleting && index > 0) {
            // Menghapus karakter satu per satu
            goldDescription.textContent = text.substring(0, index - 1);
            index--;
            setTimeout(typeWriterLoop, 30); // Kecepatan menghapus
        } else {
            // Beralih antara mengetik dan menghapus
            isDeleting = !isDeleting;
            setTimeout(typeWriterLoop, 1000); // Tunggu sebelum beralih mode
        }
    }

    typeWriterLoop();
});

    // Smooth scroll to the About section
function scrollToAbout() {
    const aboutSection = document.getElementById("about");
    aboutSection.scrollIntoView({ behavior: "smooth" });
}
function scrollToContact() {
    const contactSection = document.getElementById("contact");
    contactSection.scrollIntoView({ behavior: "smooth" });
}

// Menambahkan event scroll untuk navbar
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');

    // Cek apakah sudah discroll lebih dari 50px
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled'); // Menambahkan class scrolled
    } else {
        navbar.classList.remove('scrolled'); // Menghapus class scrolled
    }
});


document.addEventListener("DOMContentLoaded", function () {
    var textElement = document.getElementById("dynamic-text");
    var texts = ["Laravel 11", "Filament"]; // Teks yang akan diganti
    var currentIndex = 0;
    var text = texts[currentIndex];
    var index = 0;
    var typingSpeed = 150; // Kecepatan mengetik (ms)
    var deletingSpeed = 50; // Kecepatan penghapusan teks (ms)
    var pauseTime = 1500; // Waktu berhenti antara teks (ms)

    // Fungsi untuk mengetik teks
    function typeText() {
        textElement.textContent = text.slice(0, index);
        index++;
        if (index <= text.length) {
            setTimeout(typeText, typingSpeed);
        } else {
            setTimeout(deleteText, pauseTime); // Berhenti sejenak setelah teks selesai
        }
    }

    // Fungsi untuk menghapus teks
    function deleteText() {
        if (index > 0) {
            textElement.textContent = text.slice(0, index - 1);
            index--;
            setTimeout(deleteText, deletingSpeed);
        } else {
            // Ganti teks dan mulai animasi lagi
            currentIndex = (currentIndex + 1) % texts.length;
            text = texts[currentIndex];
            setTimeout(typeText, pauseTime); // Mulai mengetik teks baru
        }
    }

    // Mulai animasi ketikan
    typeText();
});




    </script>
</body>
</html>
