<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personals</title>
    <link rel="stylesheet" href="{{ asset('css/tampilan.css') }}">
</head>
<style>
    a {
        text-decoration: none; /* Menghilangkan garis bawah */
    }
</style>
<body>
<nav class="navbar">
        <div class="container">
            <div class="logo">Project UAS</div>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>
    <section id="home" class="home-section">
        <div class="home-content">
            <!-- Teks Sebelah Kiri -->
             
            <div class="home-text">
                
                <h1>Welcome!
                    <i class="fas fa-hand icon-one"></i></h1>
            <h2><SPan>THIS</SPan> ABOUT PAGE</h2>
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
    <section id="about" class="about-section">
        <p></p>
        <div class="description-box">
            <div class="description-content">
                <h2>About Us <i class="fas fa-address-card icon-two"></i></h2>
                <p>
                    Kami adalah mahasiswa Politeknik Negeri Banjarmasin yang saat ini tengah menempuh Semester 3 di Program Studi Teknik Informatika. Kami memiliki semangat yang tinggi dalam belajar dan mengembangkan diri di dunia teknologi informasi. Dengan latar belakang pendidikan yang kami terima di kampus, kami didorong untuk terus berinovasi, berkolaborasi, dan memecahkan berbagai tantangan yang ada di dunia IT.
                </p>
            </div>
            <div class="description-image">
                <img src="assets/WE.jpg" alt="Description Image">
            </div>
        </div>
    </section>
    <div class="team">
        @foreach ($teamMembers as $member)
        <div class="person">
            <!-- Foto -->
            <img src="{{ asset('storage/' . $member->image_path) }}" alt="{{ $member->name }}">

            <!-- Nama -->
            <h3>{{ $member->name }}</h3>
            <p>{{ $member->role }}</p>
            <hr>

            <!-- Detail -->
            <p><span class="label">Tanggal Lahir:</span> <span class="info">{{ $member->birthdate }}</span></p>
            <p><span class="label">Email:</span> <span class="info">{{ $member->email }}</span></p>
            <p><span class="label">Telepon:</span> <span class="info">{{ $member->phone }}</span></p>
            <p><span class="label">Instagram:</span> <span class="info">{{ $member->instagram }}</span></p>
        </div>
        @endforeach
    </div><br><br><br>
    <section id="contact" class="contact-section">
        <h2>Contact Us</h2>
        <div class="contact-info">
            <p>Email: yazdabr@gmail.com</p>
            <p>Phone: +62 813 9111 1916</p>
        </div>
    </section>
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
