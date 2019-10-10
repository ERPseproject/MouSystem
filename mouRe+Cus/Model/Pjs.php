<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pjs extends Model
{
    protected $table = 'pjs';
    protected $fillable = ['name','leader','mem1','mem2','mem3','proid','type'
    ,'cname','budget','fname','opend','closed','year','total'];
    
}   
