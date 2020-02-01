<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    protected $fillable = [
        'id_typuser','titre_typuser','statut_typuser'
    ];

    protected $primaryKey = 'id_typuser';

    protected $foreignKey = ['id_admin'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }

    public function distributeurs() {
        return $this->hasMany("App\Distributeur");
    }
}
