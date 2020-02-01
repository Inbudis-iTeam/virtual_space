<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quartier extends Model
{
    protected $fillable = [
        'id_quart','titre_quart','statut_quart'
    ];

    protected $primaryKey = 'id_quart';

    protected $foreignKey = ['id_admin','id_ville'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }
    public function ville() {
        return $this->belongsTo("App\Ville");
    }

    public function bureaus() {
        return $this->hasMany("App\Bureau");
    }
}
