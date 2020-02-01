<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieUser extends Model
{
    protected $fillable = [
        'id_catuser','titre_catuser','statut_catuser'
    ];

    protected $primaryKey = 'id_catuser';

    protected $foreignKey = ['id_admin'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }

    public function distributeurs() {
        return $this->hasMany("App\Distributeur");
    }
}
