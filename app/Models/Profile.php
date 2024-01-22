<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = [
        'user_uuid', 'name', 'address', 'desc', 'telp', 'tag', 'photo1', 'photo2', 'website', 'twitter', 'facebook', 'instagram', 'linkedin', 'freelance',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }
}
