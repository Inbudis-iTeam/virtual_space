<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModePayement extends Model
{
    protected $fillable = [
        'id_modpay','titre_modpay','statut_modpay'
    ];

    protected $primaryKey = 'id_modpay';

    protected $foreignKey = ['id_admin'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }

    public function commandes() {
        return $this->hasMany("App\Commande");
    }
}