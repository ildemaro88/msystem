<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModPayment extends Model {

    protected $table = "payment";
    protected $primaryKey = "id";
    protected $fillable = [
        'parent_id',
        'type_payment',
        'aumont',
        'status'
    ];


    public function TypePayment() {
        return $this->hasOne('\App\TypePayment', 'id', 'type_payment');
    }
}
