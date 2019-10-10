<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $primaryKey = 'idcustomer';
    protected $fillable = ['name','address','tax_id','status'];
    
}
