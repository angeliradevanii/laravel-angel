@extends('app')

@section('title', 'Edit Campaign - DonasiKu')

@section('content')

<section class="bg-white text-center px-6 py-16 border-b border-gray-100">
    <h1 class="text-4xl font-bold text-green-600 mb-3">Edit Campaign</h1>
    <p class="text-gray-500 text-lg">Perbarui data program donasi</p>
</section>

<section class="py-12 px-6 bg-gray-50 min-h-screen">
    <div class="container mx-auto max-w-3xl">
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 text-sm">
                <p class="font-bold mb-2">Data belum lengkap:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm p-8">
            <form action="{{ route('campaign.update', $campaign->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <h2 class="text-xl font-bold border-b-2 border-green-500 pb-2">Informasi Kampanye</h2>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Campaign</label>
                        <input type="text" name="title" value="{{ old('title', $campaign->title) }}" required
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" required
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition resize-none">{{ old('description', $campaign->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Target Donasi (Rp)</label>
                            <input type="number" name="target_donation" value="{{ old('target_donation', $campaign->target_donation) }}" required min="0"
                                class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Dana Terkumpul (Rp)</label>
                            <input type="number" name="collected_donation" value="{{ old('collected_donation', $campaign->collected_donation) }}" min="0"
                                class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Batas Waktu</label>
                            <input type="date" name="deadline" value="{{ old('deadline', optional($campaign->deadline)->format('Y-m-d')) }}" required
                                class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition">
                        </div>
                    </div>
                </div>

                <div class="space-y-4 bg-green-50 border border-green-100 p-5 rounded-2xl">
                    <h2 class="text-xl font-bold text-green-700">Info Rekening Pencairan</h2>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Bank</label>
                        <input type="text" name="bank_name" value="{{ old('bank_name', optional($campaign->account)->bank_name) }}" required
                            class="w-full border border-gray-200 bg-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 transition">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Rekening</label>
                            <input type="text" name="account_number" value="{{ old('account_number', optional($campaign->account)->account_number) }}" required
                                class="w-full border border-gray-200 bg-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pemilik Rekening</label>
                            <input type="text" name="account_holder" value="{{ old('account_holder', optional($campaign->account)->account_holder) }}" required
                                class="w-full border border-gray-200 bg-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 transition">
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <h2 class="text-xl font-bold text-emerald-700">Pilih Kategori</h2>
                    @php
                        $selectedCategories = old('categories', $campaign->categories->pluck('id')->toArray());
                    @endphp
                    <div class="flex flex-wrap gap-3">
                        @forelse($categories as $category)
                            <label class="inline-flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-700 cursor-pointer hover:border-green-300 hover:bg-green-50 transition">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-checkbox text-green-500"
                                    @checked(in_array($category->id, $selectedCategories))>
                                <span>{{ $category->name }}</span>
                            </label>
                        @empty
                            <p class="text-sm text-red-500">Kategori belum ada. Jalankan seeder terlebih dahulu atau isi tabel categories.</p>
                        @endforelse
                    </div>
                </div>

                <div class="flex gap-3 pt-2 flex-wrap">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-full transition-colors shadow-sm text-sm">
                        Update Campaign
                    </button>
                    <a href="{{ route('campaign.index') }}"
                        class="border border-green-400 text-green-600 hover:bg-green-50 font-semibold px-8 py-3 rounded-full transition-colors text-sm">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
