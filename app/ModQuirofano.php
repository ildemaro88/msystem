<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModQuirofano extends Model {

    protected $table = "quirofano";
    protected $primaryKey = "id";
    protected $fillable = [
        'name'
    ];
}
