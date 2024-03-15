<?php

namespace App\Models;

use App\Models\Attivita;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Progetto extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attivita()
    {
        return $this->hasMany(Attivita::class);
    }

    protected $fillable = [
        'title',
        'description',
        'thumb',
        'user_id'
    ];
}
