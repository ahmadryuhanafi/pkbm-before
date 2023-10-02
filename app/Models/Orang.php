<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vaksin() 
    {
        return $this->belongsTo(Vaksin::class, 'jenis_id', 'id');
    }
}
