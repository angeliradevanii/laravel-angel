@extends('app')

@section('title', 'Donasi - DonasiKu')

@section('content')

<section class="bg-white text-center px-6 py-16 border-b border-gray-100">
    <h1 class="text-4xl font-bold text-green-600 mb-3">Program Donasi</h1>
    <p class="text-gray-500 text-lg">Pilih campaign yang ingin Anda dukung</p>
</section>

<section class="py-12 px-6 bg-gray-50 min-h-screen">
    <div class="container mx-auto max-w-6xl">
        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-3.5 rounded-2xl text-sm font-medium mb-8">
                <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-8 text-sm">
                <p class="font-bold mb-2">Donasi belum berhasil:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($campaigns->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm p-16 text-center">
                <h2 class="text-xl font-bold text-gray-700 mb-2">Belum ada campaign tersedia</h2>
                <p class="text-gray-500 mb-6">Silakan buat campaign terlebih dahulu melalui menu Campaign.</p>
                <a href="{{ route('campaign.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-8 py-3 rounded-full transition-colors text-sm">
                    Buat Campaign
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach($campaigns as $campaign)
                    @php
                        $target = (float) $campaign->target_donation;
                        $collected = (float) $campaign->collected_donation;
                        $persen = $target > 0 ? min(100, round(($collected / $target) * 100)) : 0;
                    @endphp
                    <div class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow flex flex-col">
                        <div class="flex flex-wrap gap-2 mb-3">
                            @forelse($campaign->categories as $category)
                                <span class="bg-green-50 text-green-700 border border-green-100 text-xs font-semibold px-3 py-1 rounded-full">{{ $category->name }}</span>
                            @empty
                                <span class="bg-gray-50 text-gray-500 border border-gray-100 text-xs font-semibold px-3 py-1 rounded-full">Donasi Umum</span>
                            @endforelse
                        </div>

                        <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $campaign->title }}</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-3 flex-1">{{ $campaign->description }}</p>

                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Rp {{ number_format($campaign->collected_donation, 0, ',', '.') }}</span>
                                <span>{{ $persen }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ $persen }}%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Target: Rp {{ number_format($campaign->target_donation, 0, ',', '.') }}</p>
                        </div>

                        @if($campaign->account)
                            <div class="bg-green-50 rounded-xl p-3 text-xs text-green-800 mb-4">
                                <p class="font-semibold">Rekening: {{ $campaign->account->bank_name }}</p>
                                <p>{{ $campaign->account->account_number }} - {{ $campaign->account->account_holder }}</p>
                            </div>
                        @endif

                        <a href="{{ route('donation.create', $campaign->id) }}" class="block text-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2.5 rounded-xl transition-colors text-sm">
                            Donasi Sekarang
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        @if(isset($donations) && $donations->isNotEmpty())
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Donasi Terbaru</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($donations as $donation)
                        <div class="border border-gray-100 rounded-xl p-4">
                            <div class="flex justify-between gap-4 mb-1">
                                <p class="font-semibold text-gray-800">{{ $donation->donor_name }}</p>
                                <p class="font-bold text-green-600">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                            </div>
                            <p class="text-sm text-gray-500">Untuk: {{ optional($donation->campaign)->title }}</p>
                            @if($donation->message)
                                <p class="text-sm text-gray-600 mt-2 italic">“{{ $donation->message }}”</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

@endsection
