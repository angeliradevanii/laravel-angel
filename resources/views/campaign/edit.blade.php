@extends('app')

@section('title', 'Edit Campaign - DonasiKu')

@section('content')

<!-- Hero -->
<section class="bg-white text-center px-6 py-16 border-b border-gray-100">
    <h1 class="text-4xl font-bold text-green-600 mb-3">Edit Campaign</h1>
    <p class="text-gray-500 text-lg">Perbarui data program donasi</p>
</section>

<!-- Form -->
<section class="py-12 px-6 bg-gray-50 min-h-screen">
    <div class="container mx-auto max-w-2xl">
        <div class="bg-white rounded-2xl shadow-sm p-8">
            <form action="{{ route('campaign.update', $campaign->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Campaign</label>
                    <input type="text" name="title" value="{{ $campaign->title }}" required
                        class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition">
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="4" required
                        class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition resize-none">{{ $campaign->description }}</textarea>
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Target Donasi (Rp)</label>
                    <input type="number" name="target_donation" value="{{ $campaign->target_donation }}" required min="0"
                        class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition">
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Donasi Terkumpul (Rp)</label>
                    <input type="number" name="collected_donation" value="{{ $campaign->collected_donation }}" min="0"
                        class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition">
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deadline</label>
                    <input type="date" name="deadline" value="{{ $campaign->deadline }}" required
                        class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent focus:bg-white transition">
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold px-8 py-3 rounded-full transition-colors shadow-sm text-sm">
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
