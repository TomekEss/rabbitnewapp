<?php

namespace App\Models\Cage;

use App\Models\Rabbit\RabbitsInCages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CagesEye extends Model
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
        return $this->hasone(CagesName::class, 'id', 'id_cages_name');
    }

    public function rabbits_in_cages(): HasMany
    {
        return $this->hasMany(RabbitsInCages::class, 'cage_eye', 'id');
    }
}
