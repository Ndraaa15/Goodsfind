<?php

namespace App\ThirdParty;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

const SECONDS_IN_DAY = 86400;

class Supabase
{
    private $supabaseUrl;
    private $apiKey;
    private $bucketName;

    public function __construct()
    {
        $this->supabaseUrl = env('SUPABASE_URL');
        $this->apiKey = env('SUPABASE_API_KEY');
        $this->bucketName = env('SUPABASE_BUCKET_NAME');
    }

    public function upload_image($file, $fileName)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->attach('file', $file->get(), $fileName)->post("{$this->supabaseUrl}/storage/v1/object/{$this->bucketName}/{$fileName}");

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new \Exception('Failed to upload image to Supabase: ' . $response->body());
        }
    }

    public function get_signed_url($fileName)
    {
        $response = Http::withHeaders(['Authorization' => 'Bearer ' . $this->apiKey,])->post("{$this->supabaseUrl}/storage/v1/object/sign/{$this->bucketName}/{$fileName}", [
            "expiresIn" => 100 * SECONDS_IN_DAY,
        ]);


        if ($response->successful()) {
            return $this->supabaseUrl . "/storage/v1" . $response->json()['signedURL'];
        } else {
            throw new \Exception('Failed to retrieve signed URL from Supabase: ' . $response->body());
        }
    }
}
