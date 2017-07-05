<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsUser extends Model
{
    protected $table = "cms_users";
    protected $primaryKey = "id";
    protected $fillable = [
      "name",
      "photo",
      "email",
      "id_cms_privileges"
    ];
    public function privilege(){
      return $this->belongsTo('App\CmsPrivileges',"id_cms_privileges");
    }
}
