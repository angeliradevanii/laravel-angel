<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-green-600 tracking-tight">
            DonasiKu
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}" class="text-gray-700 font-medium hover:text-green-600 transition-colors {{ request()->routeIs('home') ? 'text-green-600 font-semibold' : '' }}">Home</a>
            <a href="{{ route('donasi') }}" class="text-gray-700 font-medium hover:text-green-600 transition-colors {{ request()->routeIs('donasi') ? 'text-green-600 font-semibold' : '' }}">Donasi</a>
            <a href="{{ route('profil') }}" class="text-gray-700 font-medium hover:text-green-600 transition-colors {{ request()->routeIs('profil') ? 'text-green-600 font-semibold' : '' }}">Profil</a>
            <a href="{{ route('kontak') }}" class="text-gray-700 font-medium hover:text-green-600 transition-colors {{ request()->routeIs('kontak') ? 'text-green-600 font-semibold' : '' }}">Kontak</a>
        </nav>

        <!-- CTA Button -->
        <a href="{{ route('donasi') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2.5 rounded-full transition-colors shadow-sm">
            Donasi Sekarang
        </a>
    </div>
</header>
