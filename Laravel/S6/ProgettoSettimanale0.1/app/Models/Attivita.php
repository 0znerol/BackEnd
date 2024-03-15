<?php

namespace App\Models;

use App\Models\Progetto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attivita extends Model
{
    use HasFactory;

    public function attivita()
    {
        return $this->belongsTo(Progetto::class);
    }
}
