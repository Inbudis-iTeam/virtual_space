<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = [
        'id_ville','titre_ville','statut_ville'
    ];

    protected $primaryKey = 'id_ville';

    protected $foreignKey = ['id_admin'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }

    public function distributeurs() {
        return $this->hasMany("App\Distributeur");
    }
    public function quartiers() {
        return $this->hasMany("App\Quartier");
    }
}
