<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'id_command','date_command','numero_command','quantite_command','montant_command','etat_command','totalttc_command','statut_command'
    ];

    protected $primaryKey = 'id_command';

    protected $foreignKey = ['id_dist','id_modpay'];

    protected $hidden = [];

    public function distributeur() {
        return $this->belongsTo("App\Distributeur");
    }
    public function mode_payement() {
        return $this->belongsTo("App\ModePayement");
    }

    public function ligne_cdes() {
        return $this->hasMany("App\LigneCde");
    }
}