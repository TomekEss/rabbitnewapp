<?php

namespace App\Models\Rabbit;

use App\Models\Rabbit\Dicts\RabbitTypeDict;
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
        return $this->hasOne(RabbitsInCages::class, 'rabbit_id', 'id');
    }

    public function rabbit_type():HasOne
    {
        return $this->hasOne(RabbitTypeDict::class, 'id', 'breed');
    }
}
