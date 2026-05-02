@extends('app')

@section('title', 'Donasi - DonasiKu')

@section('content')

<section class="py-16 px-6 bg-gray-50 min-h-[70vh]">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-green-600 mb-2 text-center">Program Donasi</h1>
        <p class="text-gray-500 text-center mb-12">Pilih program yang ingin Anda dukung</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Bantuan Kesehatan</h3>
                <p class="text-gray-500 text-sm mb-4">Membantu masyarakat yang membutuhkan biaya pengobatan dan kesehatan.</p>
                <div class="mb-3">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Rp 12.520.000</span><span>70%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 70%"></div>
                    </div>
                </div>
                <a href="#" class="block text-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-xl transition-colors text-sm">Donasi Sekarang</a>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Pendidikan Anak</h3>
                <p class="text-gray-500 text-sm mb-4">Mendukung pendidikan anak-anak kurang mampu agar bisa meraih cita-cita.</p>
                <div class="mb-3">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Rp 8.200.000</span><span>55%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 55%"></div>
                    </div>
                </div>
                <a href="#" class="block text-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-xl transition-colors text-sm">Donasi Sekarang</a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Rumah Singgah</h3>
                <p class="text-gray-500 text-sm mb-4">Menyediakan tempat tinggal sementara bagi yang membutuhkan perlindungan.</p>
                <div class="mb-3">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Rp 5.700.000</span><span>38%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-orange-500 h-2 rounded-full" style="width: 38%"></div>
                    </div>
                </div>
                <a href="#" class="block text-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-xl transition-colors text-sm">Donasi Sekarang</a>
            </div>
        </div>
    </div>
</section>

@endsection
