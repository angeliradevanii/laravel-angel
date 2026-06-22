<?php

use App\Models\DocumentationFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('gambar dapat diunggah lalu tampil pada halaman dokumentasi', function () {
    Storage::fake('public');

    $response = $this->post(route('documentations.store'), [
        'title' => 'Dokumentasi Kegiatan',
        'attachment' => UploadedFile::fake()->image('kegiatan.jpg'),
    ]);

    $response->assertRedirect(route('documentations.index'));

    $documentation = DocumentationFile::firstOrFail();

    expect($documentation->file_type)->toBe('jpg');
    Storage::disk('public')->assertExists($documentation->file_path);

    $this->get(route('documentations.index'))
        ->assertOk()
        ->assertSee('Dokumentasi Kegiatan');
});

test('file yang dihapus juga terhapus dari storage', function () {
    Storage::fake('public');

    $path = UploadedFile::fake()->image('hapus.jpg')->store('images', 'public');

    $documentation = DocumentationFile::create([
        'title' => 'File untuk Dihapus',
        'file_path' => $path,
        'file_type' => 'jpg',
    ]);

    $this->delete(route('documentations.destroy', $documentation))
        ->assertRedirect(route('documentations.index'));

    Storage::disk('public')->assertMissing($path);
    $this->assertDatabaseMissing('documentation_files', ['id' => $documentation->id]);
});
