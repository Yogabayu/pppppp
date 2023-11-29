<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'experiences';
    protected $fillable = ['user_uuid','position','office','start','end','desc','type',];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_uuid','uuid');
    }
}
