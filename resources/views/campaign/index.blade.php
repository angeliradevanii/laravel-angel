@extends('app')

@section('title', 'Daftar Campaign - DonasiKu')

@section('content')

<section class="bg-white text-center px-6 py-16 border-b border-gray-100">
    <h1 class="text-4xl font-bold text-green-600 mb-3">Daftar Campaign</h1>
    <p class="text-gray-500 text-lg">Kelola semua program donasi, kategori, rekening, dan data donasi</p>
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

        <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Semua Campaign</h2>
                <p class="text-sm text-gray-500 mt-1">Data sudah menggunakan Eloquent Relationship: account, donations, dan categories.</p>
            </div>
            <a href="{{ route('campaign.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2.5 rounded-full transition-colors shadow-sm text-sm">
                + Tambah Campaign
            </a>
        </div>

        @if($campaigns->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm p-16 text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-700 mb-2">Belum ada campaign</h3>
                <p class="text-gray-400 text-sm mb-6">Mulai buat campaign donasi pertama kamu.</p>
                <a href="{{ route('campaign.create') }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold px-8 py-2.5 rounded-full transition-colors text-sm">
                    Buat Campaign Pertama
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($campaigns as $campaign)
                    @php
                        $target = (float) $campaign->target_donation;
                        $collected = (float) $campaign->collected_donation;
                        $persen = $target > 0 ? min(100, round(($collected / $target) * 100)) : 0;
                    @endphp
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow p-6 flex flex-col">
                        <div class="flex-1">
                            <div class="flex flex-wrap gap-2 mb-3">
                                @forelse($campaign->categories as $category)
                                    <span class="bg-green-50 text-green-700 border border-green-100 text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $category->name }}
                                    </span>
                                @empty
                                    <span class="bg-gray-50 text-gray-500 border border-gray-100 text-xs font-semibold px-3 py-1 rounded-full">
                                        Tanpa kategori
                                    </span>
                                @endforelse
                            </div>

                            <h3 class="font-bold text-gray-800 text-lg mb-2 leading-snug">{{ $campaign->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4 line-clamp-3">{{ $campaign->description }}</p>

                            <div class="mb-4">
                                <div class="flex justify-between text-xs text-gray-500 mb-1.5">
                                    <span>Progress Donasi</span>
                                    <span class="font-semibold text-green-600">{{ $persen }}%</span>
                                </div>
                                <div class="w-full bg-green-100 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full transition-all" style="width: {{ $persen }}%"></div>
                                </div>
                            </div>

                            <div class="space-y-2 mb-4">
                                <div class="flex justify-between text-sm gap-3">
                                    <span class="text-gray-500">Target</span>
                                    <span class="font-semibold text-gray-700">Rp {{ number_format($campaign->target_donation, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-sm gap-3">
                                    <span class="text-gray-500">Terkumpul</span>
                                    <span class="font-semibold text-green-600">Rp {{ number_format($campaign->collected_donation, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-sm gap-3">
                                    <span class="text-gray-500">Donatur</span>
                                    <span class="font-semibold text-gray-700">{{ $campaign->donations->count() }} orang</span>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-3 text-xs text-gray-600 mb-5">
                                <p class="font-semibold text-gray-700 mb-1">Rekening Pencairan</p>
                                @if($campaign->account)
                                    <p>{{ $campaign->account->bank_name }} - {{ $campaign->account->account_number }}</p>
                                    <p>a.n. {{ $campaign->account->account_holder }}</p>
                                @else
                                    <p>Belum ada rekening.</p>
                                @endif
                                <p class="mt-2 text-green-700 font-semibold">Deadline: {{ optional($campaign->deadline)->format('d M Y') }}</p>
                            </div>
                        </div>

                        <div class="flex gap-2 pt-4 border-t border-gray-100">
                            <a href="{{ route('campaign.edit', $campaign->id) }}"
                                class="flex-1 text-center border-2 border-green-500 text-green-600 hover:bg-green-500 hover:text-white font-semibold py-2 rounded-xl text-sm transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('campaign.destroy', $campaign->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full border-2 border-red-300 text-red-500 hover:bg-red-500 hover:text-white font-semibold py-2 rounded-xl text-sm transition-colors"
                                    onclick="return confirm('Yakin ingin menghapus campaign ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

@endsection
