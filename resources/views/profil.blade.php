@extends('app')

@section('title', 'Profil - DonasiKu')

@section('content')

<section class="py-16 px-6 bg-white min-h-[70vh]">
    <div class="container mx-auto max-w-3xl">

        <h1 class="text-3xl font-bold text-green-600 mb-2 text-center">Profil Kami</h1>
        <p class="text-gray-500 text-center mb-12">Kenali lebih jauh tentang DonasiKu</p>

        <!-- Profile Card -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8 mb-8">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-1">DonasiKu</h2>
                    <p class="text-green-600 font-medium mb-3">Platform Donasi Sosial</p>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        DonasiKu adalah platform donasi sosial yang hadir untuk membantu sesama dengan transparansi dan kemudahan. 
                        Kami menghubungkan para donatur dengan mereka yang membutuhkan bantuan secara langsung dan terpercaya.
                    </p>
                </div>
            </div>
        </div>

        <!-- Visi Misi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-green-50 rounded-2xl p-6">
                <h3 class="text-lg font-bold text-green-700 mb-3">🎯 Visi</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Menjadi platform donasi sosial terpercaya yang menghubungkan kebaikan dengan mereka yang membutuhkan di seluruh Indonesia.
                </p>
            </div>
            <div class="bg-blue-50 rounded-2xl p-6">
                <h3 class="text-lg font-bold text-blue-700 mb-3">🚀 Misi</h3>
                <ul class="text-gray-600 text-sm leading-relaxed space-y-1">
                    <li> Menyediakan platform donasi yang transparan</li>
                    <li> Memudahkan proses donasi untuk semua</li>
                    <li> Memastikan dana sampai ke tangan yang tepat</li>
                </ul>
            </div>
        </div>

        <!-- Tim -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">Tim Kami</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div>
                    <div class="w-16 h-16 bg-green-100 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <p class="font-semibold text-gray-800">Angelira Devani</p>
                    <p class="text-sm text-gray-500">Founder & Developer</p>
                </div>
                <div>
                    <div class="w-16 h-16 bg-blue-100 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <p class="font-semibold text-gray-800">Tim Desain</p>
                    <p class="text-sm text-gray-500">UI/UX Designer</p>
                </div>
                <div>
                    <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <p class="font-semibold text-gray-800">Tim Support</p>
                    <p class="text-sm text-gray-500">Customer Support</p>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
