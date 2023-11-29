<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'educations';
    protected $fillable = [
        'user_uuid','sekolah','jurusan','start','end','desc',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_uuid','uuid');
    }
}
