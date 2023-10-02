<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksin extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orangs() 
    {
        return $this->hasMany(Orang::class, 'jenis_id', 'id');
    }
}
