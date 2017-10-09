<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModNotifications extends Model
{
    protected $table ="cms_notifications";
    protected $primaryKey = "id";
    protected $fillable = [
        "id_cms_users",
        "content",
        "url",
        "is_read"
    ];
}
