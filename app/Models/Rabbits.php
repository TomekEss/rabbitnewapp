<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rabbits extends Model
{
    use HasFactory;

    protected $table= 'rabbits';

    protected $fillable = ['name','gender','born','deworming','note'];
}
