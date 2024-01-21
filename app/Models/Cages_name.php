<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cages_name extends Model
{
    use HasFactory;

    protected $table = 'cages_name';

    protected $fillable =
        [
            'name',
            'eyes_number'
        ];

    public function cages_eye(): HasMany
    {
        return $this->hasMany(Cages_eyes::class, 'id_cages_name', 'id');
    }
}
