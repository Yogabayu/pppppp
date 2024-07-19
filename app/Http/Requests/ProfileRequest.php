<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "telp" => "required|string|max:20",
            "website" => "nullable|url",
            "twitter" => "nullable|url",
            "facebook" => "nullable|url",
            "instagram" => "nullable|url",
            "linkedin" => "nullable|url",
            "freelance" => "required|string",
            "address" => "required|string",
            "tag" => "required|string",
            "photo1" => "nullable|image|max:2048|mimes:png,jpg,jpeg",
            "photo2" => "nullable|image|max:2048|mimes:png,jpg,jpeg",
        ];
    }

    public function messages(): array
    {
        return [
            'website.url' => 'Website harus pakai https://',
            'twitter.url' => 'Twitter harus pakai https://',
            'facebook.url' => 'Facebook harus pakai https://',
            'instagram.url' => 'Instagram harus pakai https://',
            'linkedin.url' => 'LinkedIn harus pakai https://',
        ];
    }
}