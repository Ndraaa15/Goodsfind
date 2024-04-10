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
        $this->supabaseUrl = "https://arcudskzafkijqukfool.supabase.co";
        $this->apiKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImFyY3Vkc2t6YWZraWpxdWtmb29sIiwicm9sZSI6ImFub24iLCJpYXQiOjE2Nzc2NDk3MjksImV4cCI6MTk5MzIyNTcyOX0.CjOVpoFAdq3U-AeAzsuyV6IGcqx2ZnaXjneTis5qd6w";
        $this->bucketName = "Goodsvind";
    }

    public function uploadImage($file)
    {
        Log::info("uploading file to supabase: {$file}");
        $filepath = $file->getClientOriginalName();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->attach('file', $file->get(), $file->getClientOriginalName())->post("{$this->supabaseUrl}/storage/v1/object/{$this->bucketName}/{$filepath}");

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new \Exception('Failed to upload image to Supabase: ' . $response->body());
        }
    }

    public function getSignedUrl($file)
    {
        $filepath = $file->getClientOriginalName();
        $response = Http::withHeaders(['Authorization' => 'Bearer ' . $this->apiKey,])->post("{$this->supabaseUrl}/storage/v1/object/sign/{$this->bucketName}/{$filepath}", [
            "expiresIn" => 999 * SECONDS_IN_DAY,
        ]);


        if ($response->successful()) {
            return $this->supabaseUrl . "/storage/v1" . $response->json()['signedURL'];
        } else {
            // Handle the case where the request was not successful
            throw new \Exception('Failed to retrieve signed URL from Supabase: ' . $response->body());
        }
    }
}
