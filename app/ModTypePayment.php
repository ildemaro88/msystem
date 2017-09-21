<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModTypePayment extends Model
{
    protected $table = "type_payment";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
    ];
}
