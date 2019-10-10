<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $table = 'recipes';
    protected $fillable = ['proid','image','date','money'];
    
}
