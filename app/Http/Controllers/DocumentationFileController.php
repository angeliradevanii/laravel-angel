<?php

namespace App\Http\Controllers;

use App\Models\DocumentationFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentationFileController extends Controller
{
    public function index()
    {
        $files = DocumentationFile::latest()->get();

        return view('documentation_files', compact('files'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'attachment' => ['required', 'file', 'mimes:pdf,doc,docx,png,jpg,jpeg', 'max:5120'],
        ], [
            'title.required' => 'Nama dokumen atau gambar wajib diisi.',
            'attachment.required' => 'Silakan pilih file yang ingin diunggah.',
            'attachment.mimes' => 'File harus berformat PDF, DOC, DOCX, PNG, JPG, atau JPEG.',
            'attachment.max' => 'Ukuran file maksimal 5 MB.',
        ]);

        $file = $request->file('attachment');
        $extension = strtolower($file->getClientOriginalExtension());
        $folder = in_array($extension, ['pdf', 'doc', 'docx'], true)
            ? 'documents'
            : 'images';

        $path = $file->store($folder, 'public');

        DocumentationFile::create([
            'title' => trim($validated['title']),
            'file_path' => $path,
            'file_type' => $extension,
        ]);

        return redirect()
            ->route('documentations.index')
            ->with('success', 'File berhasil diunggah dan sudah tampil di galeri.');
    }

    public function download(DocumentationFile $documentationFile)
    {
        abort_unless(
            Storage::disk('public')->exists($documentationFile->file_path),
            404,
            'File tidak ditemukan di penyimpanan.'
        );

        $downloadName = (Str::slug($documentationFile->title) ?: 'dokumentasi')
            . '.' . strtolower($documentationFile->file_type);

        return response()->download(
            Storage::disk('public')->path($documentationFile->file_path),
            $downloadName
        );
    }

    public function destroy(DocumentationFile $documentationFile)
    {
        Storage::disk('public')->delete($documentationFile->file_path);
        $documentationFile->delete();

        return redirect()
            ->route('documentations.index')
            ->with('success', 'File berhasil dihapus.');
    }
}
