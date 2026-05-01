<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-green-600 tracking-tight">
            DonasiKu
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}" class="text-gray-700 font-medium hover:text-green-600 transition-colors">Home</a>
            <a href="#donasi" class="text-gray-700 font-medium hover:text-green-600 transition-colors">Donasi</a>
            <a href="#profil" class="text-gray-700 font-medium hover:text-green-600 transition-colors">Profil</a>
            <a href="#kontak" class="text-gray-700 font-medium hover:text-green-600 transition-colors">Kontak</a>
        </nav>

        <!-- CTA Button -->
        <a href="#donasi" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2.5 rounded-full transition-colors shadow-sm">
            Donasi Sekarang
        </a>
    </div>
</header>
