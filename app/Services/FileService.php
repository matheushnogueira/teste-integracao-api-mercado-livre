<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class FileService
{
  public function uploadFile(Request $request)
  {
    try {
      $image = $request->file('file');

      $image->store('products', 'public');

      $imagePath = $image->getRealPath();

      $imageData = base64_encode(file_get_contents($imagePath));

      $responseImgbb = Http::withoutVerifying()->asForm()->post('https://api.imgbb.com/1/upload', [
        'key' => env('IMGBB_API_KEY'),
        'image' => $imageData,
      ]);

      $imageUrl = $responseImgbb->json('data.url');

      $file = File::create([
        'url' => $imageUrl,
        'file_name' => $image->getClientOriginalName(),
        'file_path' => 'products/' . $image->hashName(),
        'mime_type' => $image->getMimeType(),
        'size' => $image->getSize(),
      ]);

      return $file;
    } catch (\Exception $e) {
      throw new Exception($e->getMessage());
      Log::error('Erro ao fazer upload de arquivo: ' . $e->getMessage());
    }
  }
}
