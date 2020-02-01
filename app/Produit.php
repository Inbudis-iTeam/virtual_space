<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'id_prod','titre_catpro','nom_prod','reference_prod','description_prod','prix_prod','qtestock_prod','stockalerte_prod','stockappro_prod','statut_prod'
    ];

    protected $primaryKey = 'id_prod';

    protected $foreignKey = ['id_admin','id_catpro'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }
    public function categorie_produit() {
        return $this->belongsTo("App\CategorieProduit");
    }

    public function commandes() {
        return $this->hasMany("App\Commande");
    }
}
