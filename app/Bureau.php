<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    protected $fillable = [
        'id_bureau','titre_bureau','statut_bureau'
    ];

    protected $primaryKey = 'id_bureau';

    protected $foreignKey = ['id_admin','id_typbur','id_quart'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }
    public function type_bureau() {
        return $this->belongsTo("App\TypeBureau");
    }
    public function quartier() {
        return $this->belongsTo("App\Quartier");
    }

    public function distributeurs() {
        return $this->hasMany("App\Distributeur");
    }
    public function migrations() {
        return $this->hasMany("App\Migration");
    }
}
