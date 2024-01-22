<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolios extends Model
{
    use HasFactory;
    protected $table = 'portofolios';
    protected $fillable = [
        'user_uuid', 'photo', 'title', 'short_desc', 'long_desc', 'link', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }
}
