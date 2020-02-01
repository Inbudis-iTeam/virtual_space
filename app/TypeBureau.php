<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeBureau extends Model
{
    protected $fillable = [
        'id_typbur','titre_typburr','statut_typbur'
    ];

    protected $primaryKey = 'id_typbur';

    protected $foreignKey = ['id_admin'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }

    public function type_bureaus() {
        return $this->hasMany("App\TypeBureau");
    }
}
