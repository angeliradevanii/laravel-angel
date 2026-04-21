
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Angelira Devani</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<script>
tailwind.config = {
 theme:{
  extend:{
   fontFamily:{poppins:['Poppins','sans-serif']},
   colors:{
    'pink-primary':'#FF69B4',
    'pink-secondary':'#FFB6C1',
    'pink-dark':'#C71585',
    'pink-light':'#FFE4E1'
   }
  }
 }
}
</script>

<style>
*{font-family:'Poppins',sans-serif;scroll-behavior:smooth}
.gradient-pink{background:linear-gradient(135deg,#FF69B4 0%,#FFB6C1 50%,#FF1493 100%)}
.text-gradient-pink{
background:linear-gradient(135deg,#FF69B4,#FFB6C1,#FF1493);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}
.hover-pink-glow:hover{box-shadow:0 0 30px rgba(255,105,180,.4)}
.fade-in{animation:fade .8s ease}
@keyframes fade{
from{opacity:0;transform:translateY(30px)}
to{opacity:1;transform:translateY(0)}
}
</style>
</head>

<body class="bg-gradient-to-br from-pink-light to-white min-h-screen">

<nav class="bg-white/90 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-pink-100">
<div class="max-w-6xl mx-auto px-4 py-4">                                                                                                          
<div class="flex justify-between items-center">
<a href="#home" class="text-3xl font-black text-gradient-pink"></a>

<div class="hidden md:flex space-x-8 items-center">
<a href="#home">Home</a>
<a href="#about">Tentang</a>
<a href="#services">Layanan</a>
<a href="#portfolio">Portfolio</a>
<a href="#contact">Kontak</a>
</div>

<button onclick="toggleMenu()" class="md:hidden text-2xl">
<i class="fas fa-bars text-pink-primary"></i>
</button>
</div>

<div id="mobileMenu" class="hidden mt-4 flex flex-col gap-4 md:hidden">
<a href="#home">Home</a>
<a href="#about">Tentang</a>
<a href="#services">Layanan</a>
<a href="#portfolio">Portfolio</a>
<a href="#contact">Kontak</a>
</div>
</div>
</nav>

<section id="home" class="min-h-screen flex items-center justify-center px-4 pt-20">
<div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-16 items-center">

<div class="fade-in text-center lg:text-left">
<div class="inline-block bg-pink-primary/20 text-pink-primary px-6 py-3 rounded-full mb-8">
💖 Angelira Devani
</div>

<h1 class="text-5xl lg:text-7xl font-black mb-6">
Halo, Saya<br>
<span class="text-gradient-pink">Angelira</span><br>
<span class="text-pink-primary text-4xl">Devani 💕</span>
</h1>

<p class="text-xl text-gray-600 mb-8">
Fullstack Developer yang menciptakan website cantik dengan sentuhan pink magic ✨
</p>

<div class="flex flex-col sm:flex-row gap-4">
<a href="#contact" class="bg-gradient-to-r from-pink-primary to-pink-dark text-white py-5 px-10 rounded-3xl font-bold hover-pink-glow">
Mulai Proyek
</a>
<a href="#portfolio" class="border-2 border-pink-primary text-pink-primary py-5 px-10 rounded-3xl font-bold">
Lihat Karya
</a>
</div>
</div>

<div class="relative">
<div class="w-96 h-96 bg-pink-primary/20 rounded-3xl blur-xl absolute"></div>
</div>

</div>
</section>

<section id="about" class="py-24 bg-white">
<div class="max-w-6xl mx-auto px-4 text-center">
<h2 class="text-5xl font-black mb-10">Tentang <span class="text-gradient-pink">Angel</span></h2>
<p class="text-xl text-gray-600 max-w-3xl mx-auto mb-12">
Developer spesialis Laravel, PHP, MySQL, UI/UX modern dan website aesthetic premium.
</p>

<div class="grid md:grid-cols-3 gap-8">
<div class="bg-pink-light p-8 rounded-3xl shadow-xl">
<h3 class="text-3xl font-black text-pink-primary">150+</h3>
<p>Project Selesai</p>
</div>
<div class="bg-pink-light p-8 rounded-3xl shadow-xl">
<h3 class="text-3xl font-black text-pink-primary">99%</h3>
<p>Client Puas</p>
</div>
<div class="bg-pink-light p-8 rounded-3xl shadow-xl">
<h3 class="text-3xl font-black text-pink-primary">2+</h3>
<p>Tahun Experience</p>
</div>
</div>
</div>
</section>

<section id="services" class="py-24 bg-gradient-to-b from-pink-light to-white">
<div class="max-w-6xl mx-auto px-4">
<h2 class="text-center text-5xl font-black mb-16">Layanan <span class="text-gradient-pink">Angel</span></h2>

<div class="grid md:grid-cols-3 gap-8">

<div class="bg-white p-10 rounded-3xl shadow-xl hover-pink-glow">
<div class="w-20 h-20 gradient-pink rounded-2xl flex items-center justify-center mx-auto mb-6">
<i class="fas fa-code text-white text-2xl"></i>
</div>
<h3 class="text-2xl font-bold text-center mb-4">Web Development</h3>
<p class="text-center text-gray-600 mb-6">Laravel, PHP, Fullstack Development</p>
<p class="text-center text-pink-primary font-bold">Rp 5.000.000+</p>
</div>

<div class="bg-white p-10 rounded-3xl shadow-xl hover-pink-glow">
<div class="w-20 h-20 gradient-pink rounded-2xl flex items-center justify-center mx-auto mb-6">
<i class="fas fa-palette text-white text-2xl"></i>
</div>
<h3 class="text-2xl font-bold text-center mb-4">UI/UX Design</h3>
<p class="text-center text-gray-600 mb-6">Modern Pink Aesthetic Interface</p>
<p class="text-center text-pink-primary font-bold">Rp 3.000.000+</p>
</div>

<div class="bg-white p-10 rounded-3xl shadow-xl hover-pink-glow">
<div class="w-20 h-20 gradient-pink rounded-2xl flex items-center justify-center mx-auto mb-6">
<i class="fas fa-server text-white text-2xl"></i>
</div>
<h3 class="text-2xl font-bold text-center mb-4">Backend System</h3>
<p class="text-center text-gray-600 mb-6">Admin Panel, CRUD, Database</p>
<p class="text-center text-pink-primary font-bold">Rp 7.000.000+</p>
</div>

</div>
</div>
</section>

<section id="portfolio" class="py-24 bg-white">
<div class="max-w-6xl mx-auto px-4">
<h2 class="text-center text-5xl font-black mb-16">My <span class="text-gradient-pink">Portfolio</span></h2>

<div class="grid md:grid-cols-3 gap-8">
<div class="rounded-3xl overflow-hidden shadow-xl">
<img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80">
<div class="p-6">
<h3 class="font-bold text-2xl">Company Profile</h3>
<p class="text-gray-600">Website perusahaan premium</p>
</div>
</div>

<div class="rounded-3xl overflow-hidden shadow-xl">
<img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=900&q=80">
<div class="p-6">
<h3 class="font-bold text-2xl">E-Commerce</h3>
<p class="text-gray-600">Toko online modern</p>
</div>
</div>

<div class="rounded-3xl overflow-hidden shadow-xl">
<img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=900&q=80">
<div class="p-6">
<h3 class="font-bold text-2xl">Dashboard Admin</h3>
<p class="text-gray-600">Sistem management data</p>
</div>
</div>
</div>
</div>
</section>

<section id="contact" class="py-24 gradient-pink text-white">
<div class="max-w-4xl mx-auto px-4 text-center">
<h2 class="text-5xl font-black mb-8">Hubungi Saya 💕</h2>
<p class="text-xl mb-10">Siap bantu bangun project impian kamu</p>

<form class="bg-white text-black p-10 rounded-3xl shadow-2xl max-w-3xl mx-auto space-y-6">
<input class="w-full p-5 rounded-2xl border" placeholder="Nama">
<input class="w-full p-5 rounded-2xl border" placeholder="Email">
<textarea class="w-full p-5 rounded-2xl border h-40" placeholder="Pesan"></textarea>
<button class="gradient-pink text-white py-5 px-10 rounded-2xl font-bold w-full">
Kirim Pesan
</button>
</form>
</div>
</section>

<footer class="bg-pink-dark text-white py-10 text-center">
<h3 class="text-3xl font-black mb-4">Angelira Devani 💖</h3>
<p>© 2026 Angelira Devani. All Rights Reserved.</p>
<div class="flex justify-center gap-6 mt-6 text-2xl">
<i class="fab fa-instagram"></i>
<i class="fab fa-github"></i>
<i class="fab fa-linkedin"></i>
</div>
</footer>

<script>
function toggleMenu(){
document.getElementById('mobileMenu').classList.toggle('hidden');
}
</script>

</body>
</html>