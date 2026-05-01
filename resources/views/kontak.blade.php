@extends('app')

@section('title', 'Kontak - DonasiKu')

@section('content')

<section class="py-16 px-6 bg-white min-h-[70vh]">
    <div class="container mx-auto max-w-2xl">
        <h1 class="text-3xl font-bold text-green-600 mb-2 text-center">Hubungi Kami</h1>
        <p class="text-gray-500 text-center mb-12">Ada pertanyaan? Kami siap membantu Anda</p>

        <!-- Contact Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <div class="bg-green-50 rounded-2xl p-6 flex items-start gap-4">
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-800 mb-1">Email</p>
                    <p class="text-gray-500 text-sm">support@donasiku.com</p>
                </div>
            </div>
            <div class="bg-blue-50 rounded-2xl p-6 flex items-start gap-4">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-800 mb-1">Telepon</p>
                    <p class="text-gray-500 text-sm">0812-xxxx-xxxx</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Kirim Pesan</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" placeholder="Nama lengkap Anda" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" placeholder="email@example.com" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                    <textarea rows="4" placeholder="Tulis pesan Anda..." class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 resize-none"></textarea>
                </div>
                <button class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-xl transition-colors">
                    Kirim Pesan
                </button>
            </div>
        </div>
    </div>
</section>

@endsection
