<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rabbits extends Model
{
    use HasFactory;

    protected $table= 'rabbits';

    protected $fillable = ['name','gender','born','deworming','note','photo','breed'];

    public function rabbit_in_cage():HasOne
    {
        return $this->hasOne(Rabbits_in_cages::class, 'rabbit_id', 'id');
    }
}
