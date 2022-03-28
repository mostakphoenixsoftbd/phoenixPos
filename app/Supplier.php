<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table        =   'suppliers';
    protected $fillable     =   ['supplier_id', 'supplier_name', 'address',
                                'phone', 'email'];
 
}
