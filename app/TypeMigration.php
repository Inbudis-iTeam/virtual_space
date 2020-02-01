<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeMigration extends Model
{
    protected $fillable = [
        'id_typmig','titre_typmig','statut_typmig'
    ];

    protected $primaryKey = 'id_typmig';

    protected $foreignKey = ['id_admin'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }

    public function migrations() {
        return $this->hasMany("App\Migration");
    }
}
