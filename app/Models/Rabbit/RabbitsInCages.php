<?php

namespace App\Models\Rabbit;

use App\Models\Cage\CagesEye;
use App\Models\Cage\CagesName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RabbitsInCages extends Model
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

    public function eye():HasOne
    {
        return $this->hasOne(CagesEye::class, 'id', 'cage_eye');
    }

    public function cage_name():HasOne
    {
        return $this->hasOne(CagesName::class, 'id', 'cages_name_id');
    }
}
