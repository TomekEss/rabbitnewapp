<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rabbits_in_cages extends Model
{
    use HasFactory;

    protected $table = 'rabbits_in_cages';

    protected $fillable = [
        'rabbit_id',
        'cage_eye',
        'cages_name_id',
    ];

    public function rabbit():HasOne
    {
        return $this->hasOne(Rabbits::class, 'id', 'rabbit_id');
    }

    public function cage_eye():HasOne
    {
        return $this->hasOne(Cages_eyes::class, 'id', 'cage_eye');
    }
}
