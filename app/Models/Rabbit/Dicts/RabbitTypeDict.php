<?php

namespace App\Models\Rabbit\Dicts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RabbitTypeDict extends Model
{
    use HasFactory;

    protected $table = 'rabbit_type_dict';

    protected $fillable = [
        'name',
        'order_lp'
    ];
}
