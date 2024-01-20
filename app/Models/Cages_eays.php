<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cages_eays extends Model
{
    use HasFactory;

    protected $table = 'cages_eays';

    protected $fillable =
        [
          'id_cages_name',
          'eays_number',
          'cleaning_day'
        ];

    public function cages_name(): HasOne
    {
        return $this->hasone(Cages_name::class, 'id', 'id_cages_name');
    }
}
