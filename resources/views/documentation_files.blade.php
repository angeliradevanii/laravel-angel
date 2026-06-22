@extends('app')

@section('title', 'Documentation Files')

@section('content')

<div class="max-w-3xl mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">
        Upload Dokumentasi
    </h1>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form action="{{ route('documentations.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-4">

        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">
                Nama Dokumen/Gambar
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                class="mt-1 block w-full border rounded p-2"
                required
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">
                Pilih File (PDF, DOCX, PNG, JPG - Maksimal 5MB)
            </label>

            <input
                type="file"
                name="attachment"
                class="mt-1 block w-full text-sm text-gray-500"
                required
            >
        </div>

        <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded">
            Unggah File
        </button>

    </form>

</div>

@endsection