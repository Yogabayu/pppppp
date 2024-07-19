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
            "name" => "required",
            "desc" => "required",
            "telp" => "required",
            "website" => "required",
            "twitter" => "required",
            "facebook" => "required",
            "instagram" => "required",
            "linkedin" => "required",
            "freelance" => "required",
            "photo1" => "mimes:png,jpg",
            "photo2" => "mimes:png,jpg",
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