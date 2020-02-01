<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requete extends Model
{
    protected $fillable = [
        'id_req','titre_req','description_req','statut_req'
    ];

    protected $primaryKey = 'id_req';

    protected $foreignKey = ['id_dist'];

    protected $hidden = [];

    public function distributeur() {
        return $this->belongsTo("App\Distributeur");
    }
}
