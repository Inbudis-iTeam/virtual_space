<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieProduit extends Model
{
    protected $fillable = [
        'id_catpro','titre_catpro','statut_catpro'
    ];

    protected $primaryKey = 'id_catpro';

    protected $foreignKey = ['id_admin','id_subcatpro'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }
    public function categorie_produit() {
        return $this->belongsTo("App\CategorieProduit");
    }

    public function categorie_produits() {
        return $this->hasMany("App\CategorieProduit");
    }
    public function produits() {
        return $this->hasMany("App\Produit");
    }
}
