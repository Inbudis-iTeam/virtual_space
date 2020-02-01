<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Njangui extends Model
{
    protected $fillable = [
        'id_njang','montant_njang','statut_njang'
    ];

    protected $primaryKey = 'id_njang';

    protected $foreignKey = ['owner'];

    protected $hidden = [];

    public function distributeur() {
        return $this->belongsTo("App\Distributeur");
    }
}
