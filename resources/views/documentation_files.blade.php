@extends('app')

@section('title', 'Manajemen File & Gambar - DonasiKu')

@section('content')
<section class="bg-white text-center px-6 py-14 border-b border-gray-100">
    <span class="inline-flex items-center rounded-full bg-green-50 px-4 py-1.5 text-sm font-semibold text-green-700 mb-4">
        Laravel File Management
    </span>
    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Manajemen File & Gambar</h1>
    <p class="text-gray-500 max-w-2xl mx-auto">
        Unggah file, lihat seluruh data yang tersimpan, lalu klik salah satu gambar atau dokumen untuk menampilkan preview.
    </p>
</section>

<section class="bg-gray-50 min-h-screen px-6 py-10">
    <div class="container mx-auto max-w-6xl">
        @if (session('success'))
            <div class="mb-7 flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.3" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-7 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                <div class="mb-2 flex items-center gap-2 font-semibold">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 4.5h.008v.008H12v-.008z" />
                    </svg>
                    File belum dapat diunggah
                </div>
                <ul class="list-disc space-y-1 pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-5">
            <div class="lg:col-span-2">
                <div class="rounded-3xl bg-white p-6 shadow-sm md:p-7">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Unggah Dokumentasi</h2>
                        <p class="mt-1 text-sm text-gray-500">Mendukung PDF, DOC, DOCX, PNG, JPG, dan JPEG maksimal 5 MB.</p>
                    </div>

                    <form action="{{ route('documentations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        <div>
                            <label for="title" class="mb-2 block text-sm font-semibold text-gray-700">
                                Nama Dokumen/Gambar
                            </label>
                            <input
                                id="title"
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                maxlength="100"
                                placeholder="Contoh: Dokumentasi kegiatan sosial"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
                                required
                            >
                        </div>

                        <div>
                            <label for="attachment" class="mb-2 block text-sm font-semibold text-gray-700">
                                Pilih File
                            </label>
                            <label for="attachment" class="group flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 px-5 py-8 text-center transition hover:border-green-400 hover:bg-green-50">
                                <span class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-green-100 text-green-600 transition group-hover:bg-green-200">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l-3 3m3-3l3 3M6.75 19.5h10.5A2.25 2.25 0 0019.5 17.25V6.75A2.25 2.25 0 0017.25 4.5H6.75A2.25 2.25 0 004.5 6.75v10.5A2.25 2.25 0 006.75 19.5z" />
                                    </svg>
                                </span>
                                <span class="font-semibold text-gray-700">Klik untuk memilih file</span>
                                <span class="mt-1 text-xs text-gray-500">atau tarik file ke area ini</span>
                                <span id="chosen-file-name" class="mt-3 hidden max-w-full truncate rounded-full bg-white px-3 py-1 text-xs font-semibold text-green-700 shadow-sm"></span>
                            </label>
                            <input
                                id="attachment"
                                type="file"
                                name="attachment"
                                accept=".pdf,.doc,.docx,.png,.jpg,.jpeg"
                                class="sr-only"
                                required
                            >
                        </div>

                        <div id="local-preview-wrapper" class="hidden rounded-2xl border border-gray-200 bg-gray-50 p-4">
                            <div class="mb-3 flex items-center justify-between gap-3">
                                <div>
                                    <p class="text-sm font-semibold text-gray-700">Preview sebelum diunggah</p>
                                    <p class="text-xs text-gray-500">Pastikan file yang dipilih sudah benar.</p>
                                </div>
                                <button id="clear-file" type="button" class="text-xs font-semibold text-red-500 hover:text-red-600">Batalkan</button>
                            </div>
                            <div id="local-preview" class="overflow-hidden rounded-xl border border-gray-200 bg-white"></div>
                        </div>

                        <button type="submit" class="w-full rounded-xl bg-green-500 px-5 py-3 font-semibold text-white shadow-sm transition hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-200">
                            Unggah File
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-3">
                <div class="rounded-3xl bg-white p-6 shadow-sm md:p-7">
                    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">Preview File Terpilih</h2>
                            <p id="selected-file-description" class="mt-1 text-sm text-gray-500">
                                Klik salah satu file pada galeri di bawah.
                            </p>
                        </div>
                        <a id="selected-download-button" href="#" class="hidden rounded-full border border-green-200 bg-green-50 px-4 py-2 text-sm font-semibold text-green-700 transition hover:bg-green-100">
                            Unduh File
                        </a>
                    </div>

                    <div id="selected-preview" class="flex min-h-80 items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50">
                        <div class="px-6 py-12 text-center">
                            <svg class="mx-auto mb-3 h-12 w-12 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25z" />
                            </svg>
                            <p class="font-semibold text-gray-500">Belum ada file yang dipilih</p>
                            <p class="mt-1 text-sm text-gray-400">Gambar akan tampil besar dan PDF akan terbuka di area ini.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 rounded-3xl bg-white p-6 shadow-sm md:p-7">
            <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Galeri File & Gambar</h2>
                    <p class="mt-1 text-sm text-gray-500">Pilih kartu untuk melihat preview. Total: {{ $files->count() }} file.</p>
                </div>
                <span class="rounded-full bg-gray-100 px-4 py-2 text-xs font-semibold text-gray-600">
                    Data terbaru tampil lebih dulu
                </span>
            </div>

            @if ($files->isEmpty())
                <div class="rounded-2xl border-2 border-dashed border-gray-200 px-6 py-14 text-center">
                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-green-50 text-green-500">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-700">Belum ada file tersimpan</h3>
                    <p class="mt-1 text-sm text-gray-400">Unggah file pertama melalui form di atas.</p>
                </div>
            @else
                <div id="file-gallery" class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($files as $file)
                        @php
                            $fileType = strtolower($file->file_type);
                            $isImage = in_array($fileType, ['png', 'jpg', 'jpeg'], true);
                            $isPdf = $fileType === 'pdf';
                            $publicUrl = asset('storage/' . $file->file_path);
                        @endphp

                        <article
                            tabindex="0"
                            role="button"
                            aria-label="Pilih {{ $file->title }} untuk preview"
                            class="file-card group cursor-pointer overflow-hidden rounded-2xl border-2 border-transparent bg-gray-50 outline-none transition hover:-translate-y-0.5 hover:border-green-200 hover:shadow-md focus:border-green-500 focus:ring-4 focus:ring-green-100"
                            data-title="{{ $file->title }}"
                            data-type="{{ $fileType }}"
                            data-preview-url="{{ $publicUrl }}"
                            data-download-url="{{ route('documentations.download', $file) }}"
                        >
                            <div class="relative flex aspect-video items-center justify-center overflow-hidden bg-gray-100">
                                @if ($isImage)
                                    <img
                                        src="{{ $publicUrl }}"
                                        alt="{{ $file->title }}"
                                        class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                                        loading="lazy"
                                    >
                                @elseif ($isPdf)
                                    <div class="text-center text-red-500">
                                        <svg class="mx-auto h-14 w-14" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5A3.375 3.375 0 0010.125 2.25H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.625a9 9 0 00-9-9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15h7.5m-7.5 3h4.5" />
                                        </svg>
                                        <span class="mt-2 block text-xs font-bold uppercase">PDF</span>
                                    </div>
                                @else
                                    <div class="text-center text-blue-500">
                                        <svg class="mx-auto h-14 w-14" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5A3.375 3.375 0 0010.125 2.25H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.625a9 9 0 00-9-9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5h6M9 16.5h6M9 10.5h1.5" />
                                        </svg>
                                        <span class="mt-2 block text-xs font-bold uppercase">{{ $fileType }}</span>
                                    </div>
                                @endif

                                <span class="absolute left-3 top-3 rounded-full bg-white/90 px-2.5 py-1 text-[11px] font-bold uppercase text-gray-600 shadow-sm backdrop-blur">
                                    {{ $fileType }}
                                </span>

                                <span class="selection-badge absolute right-3 top-3 hidden h-7 w-7 items-center justify-center rounded-full bg-green-500 text-white shadow-md">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </span>
                            </div>

                            <div class="p-4">
                                <h3 class="truncate font-bold text-gray-800" title="{{ $file->title }}">{{ $file->title }}</h3>
                                <p class="mt-1 text-xs text-gray-500">Diunggah {{ $file->created_at->format('d M Y, H:i') }}</p>

                                <div class="mt-4 flex gap-2 border-t border-gray-200 pt-3">
                                    <button type="button" class="preview-trigger flex-1 rounded-lg bg-green-500 px-3 py-2 text-xs font-semibold text-white transition hover:bg-green-600">
                                        Pilih & Preview
                                    </button>
                                    <a href="{{ route('documentations.download', $file) }}" class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-xs font-semibold text-gray-600 transition hover:border-green-300 hover:text-green-600" onclick="event.stopPropagation()">
                                        Unduh
                                    </a>
                                    <form action="{{ route('documentations.destroy', $file) }}" method="POST" onclick="event.stopPropagation()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg border border-red-100 bg-red-50 px-3 py-2 text-xs font-semibold text-red-500 transition hover:bg-red-500 hover:text-white" onclick="return confirm('Yakin ingin menghapus file ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('attachment');
        const chosenName = document.getElementById('chosen-file-name');
        const localPreviewWrapper = document.getElementById('local-preview-wrapper');
        const localPreview = document.getElementById('local-preview');
        const clearFile = document.getElementById('clear-file');
        const selectedPreview = document.getElementById('selected-preview');
        const selectedDescription = document.getElementById('selected-file-description');
        const selectedDownloadButton = document.getElementById('selected-download-button');
        const cards = Array.from(document.querySelectorAll('.file-card'));
        let localObjectUrl = null;

        const escapeHtml = (value = '') => String(value).replace(/[&<>"']/g, (character) => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;',
        })[character]);

        const documentPlaceholder = (fileName, extension) => {
            const safeFileName = escapeHtml(fileName);
            const safeExtension = escapeHtml(extension).toUpperCase();

            return `
            <div class="flex min-h-52 flex-col items-center justify-center px-6 py-10 text-center">
                <svg class="mb-3 h-14 w-14 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5A3.375 3.375 0 0010.125 2.25H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.625a9 9 0 00-9-9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5h6M9 16.5h6M9 10.5h1.5" />
                </svg>
                <p class="max-w-full truncate font-semibold text-gray-700">${safeFileName}</p>
                <p class="mt-1 text-sm text-gray-500">File ${safeExtension} siap diunggah.</p>
            </div>`;
        };

        const resetLocalPreview = () => {
            if (localObjectUrl) {
                URL.revokeObjectURL(localObjectUrl);
                localObjectUrl = null;
            }
            input.value = '';
            chosenName.textContent = '';
            chosenName.classList.add('hidden');
            localPreviewWrapper.classList.add('hidden');
            localPreview.innerHTML = '';
        };

        input?.addEventListener('change', () => {
            const file = input.files?.[0];
            if (!file) {
                resetLocalPreview();
                return;
            }

            if (localObjectUrl) {
                URL.revokeObjectURL(localObjectUrl);
            }

            localObjectUrl = URL.createObjectURL(file);
            chosenName.textContent = file.name;
            chosenName.classList.remove('hidden');
            localPreviewWrapper.classList.remove('hidden');

            if (file.type.startsWith('image/')) {
                localPreview.innerHTML = `<img src="${localObjectUrl}" alt="Preview file terpilih" class="h-64 w-full object-contain bg-white">`;
            } else if (file.type === 'application/pdf') {
                localPreview.innerHTML = `<iframe src="${localObjectUrl}" title="Preview PDF" class="h-72 w-full bg-white"></iframe>`;
            } else {
                const extension = file.name.includes('.') ? file.name.split('.').pop() : 'dokumen';
                localPreview.innerHTML = documentPlaceholder(file.name, extension);
            }
        });

        clearFile?.addEventListener('click', resetLocalPreview);

        const selectCard = (card, shouldScroll = true) => {
            cards.forEach((item) => {
                item.classList.remove('border-green-500', 'ring-4', 'ring-green-100', 'bg-green-50');
                item.classList.add('border-transparent', 'bg-gray-50');
                item.querySelector('.selection-badge')?.classList.add('hidden');
                item.querySelector('.selection-badge')?.classList.remove('flex');
                item.setAttribute('aria-pressed', 'false');
            });

            card.classList.remove('border-transparent', 'bg-gray-50');
            card.classList.add('border-green-500', 'ring-4', 'ring-green-100', 'bg-green-50');
            card.querySelector('.selection-badge')?.classList.remove('hidden');
            card.querySelector('.selection-badge')?.classList.add('flex');
            card.setAttribute('aria-pressed', 'true');

            const title = card.dataset.title;
            const type = card.dataset.type?.toLowerCase();
            const previewUrl = card.dataset.previewUrl;
            const downloadUrl = card.dataset.downloadUrl;
            const safeTitle = escapeHtml(title);
            const safeType = escapeHtml(type).toUpperCase();

            selectedDescription.textContent = `${title} • ${type?.toUpperCase()}`;
            selectedDownloadButton.href = downloadUrl;
            selectedDownloadButton.classList.remove('hidden');

            if (['png', 'jpg', 'jpeg'].includes(type)) {
                selectedPreview.innerHTML = `<img src="${previewUrl}" alt="${safeTitle}" class="h-[30rem] w-full object-contain bg-white">`;
            } else if (type === 'pdf') {
                selectedPreview.innerHTML = `<iframe src="${previewUrl}" title="Preview ${safeTitle}" class="h-[30rem] w-full bg-white"></iframe>`;
            } else {
                selectedPreview.innerHTML = `
                    <div class="px-8 py-14 text-center">
                        <svg class="mx-auto mb-4 h-16 w-16 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5A3.375 3.375 0 0010.125 2.25H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.625a9 9 0 00-9-9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5h6M9 16.5h6M9 10.5h1.5" />
                        </svg>
                        <h3 class="text-lg font-bold text-gray-700">${safeTitle}</h3>
                        <p class="mt-2 text-sm text-gray-500">Browser tidak dapat menampilkan preview langsung untuk file ${safeType}. Gunakan tombol Unduh File untuk membukanya.</p>
                        <a href="${downloadUrl}" class="mt-5 inline-flex rounded-full bg-green-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-green-600">Unduh dan Buka</a>
                    </div>`;
            }

            if (shouldScroll) {
                selectedPreview.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        };

        cards.forEach((card) => {
            card.addEventListener('click', (event) => {
                if (event.target.closest('a, form, button') && !event.target.closest('.preview-trigger')) {
                    return;
                }
                selectCard(card);
            });

            card.addEventListener('keydown', (event) => {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    selectCard(card);
                }
            });
        });

        if (cards.length > 0) {
            selectCard(cards[0], false);
        }
    });
</script>
@endsection
