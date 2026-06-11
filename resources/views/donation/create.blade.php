@extends('app')

@section('title', 'Form Donasi - DonasiKu')

@section('content')

<section class="bg-white text-center px-6 py-16 border-b border-gray-100">
    <h1 class="text-4xl font-bold text-green-600 mb-3">Form Donasi</h1>
    <p class="text-gray-500 text-lg">Lengkapi data donasi untuk campaign yang dipilih</p>
</section>

<section class="py-12 px-6 bg-gray-50 min-h-screen">
    <div class="container mx-auto max-w-4xl grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm p-6 sticky top-24">
                <h2 class="text-xl font-bold text-gray-800 mb-3">{{ $campaign->title }}</h2>
                <p class="text-sm text-gray-500 mb-4">{{ $campaign->description }}</p>

                <div class="space-y-2 text-sm mb-4">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Terkumpul</span>
                        <span class="font-semibold text-green-600">Rp {{ number_format($campaign->collected_donation, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Target</span>
                        <span class="font-semibold text-gray-700">Rp {{ number_format($campaign->target_donation, 0, ',', '.') }}</span>
                    </div>
                </div>

                @if($campaign->account)
                    <div class="bg-green-50 border border-green-100 rounded-xl p-4 text-sm text-green-800">
                        <p class="font-bold mb-1">Rekening Tujuan</p>
                        <p>{{ $campaign->account->bank_name }}</p>
                        <p>{{ $campaign->account->account_number }}</p>
                        <p>a.n. {{ $campaign->account->account_holder }}</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="lg:col-span-2">
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 text-sm">
                    <p class="font-bold mb-2">Data donasi belum lengkap:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm p-8">
                <form action="{{ route('donation.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Donatur</label>
                        <input type="text" name="donor_name" value="{{ old('donor_name') }}" required
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition"
                            placeholder="Masukkan nama donatur">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nominal Donasi (Rp)</label>
                        <input type="number" name="amount" value="{{ old('amount') }}" min="1000" required
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition"
                            placeholder="Contoh: 50000">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pesan / Doa</label>
                        <textarea name="message" rows="4"
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition resize-none"
                            placeholder="Tulis pesan singkat jika ada...">{{ old('message') }}</textarea>
                    </div>

                    <div class="flex gap-3 flex-wrap">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-8 py-3 rounded-full transition-colors shadow-sm text-sm">
                            Simpan Donasi
                        </button>
                        <a href="{{ route('donasi') }}" class="border border-green-400 text-green-600 hover:bg-green-50 font-semibold px-8 py-3 rounded-full transition-colors text-sm">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
