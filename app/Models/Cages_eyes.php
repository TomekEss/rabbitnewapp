<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cages_eyes extends Model
{
    use HasFactory;

    protected $table = 'cages_eyes';

    protected $fillable =
        [
          'id_cages_name',
          'eyes_number',
          'cleaning_day'
        ];

    public function cages_name(): HasOne
    {
        return $this->hasone(Cages_name::class, 'id', 'id_cages_name');
    }

    public function rabbits_in_cages(): HasMany
    {
        return $this->hasMany(Rabbits_in_cages::class, 'cage_eye', 'id');
    }
}
