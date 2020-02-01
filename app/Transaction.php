<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id_trans','date_trans','type_trans','matinit_trans','matref_trans','montant_trans','statut_trans'
    ];

    protected $primaryKey = 'id_trans';

    protected $foreignKey = ['id_dist'];

    protected $hidden = [];

    public function distributeur() {
        return $this->belongsTo("App\Distributeur");
    }

}
