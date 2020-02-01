<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributeur extends Model
{
    protected $fillable = [
        'id_dist','nom_dist','prenom_dist','matricule_dist','password_dist','sexe_dist','phone_dist','mail_dist','datenaiss_dist','heritier_dist','statut_dist'
    ];

    protected $primaryKey = 'id_dist';

    protected $foreignKey = ['id_typuser','id_catuser','refinit_dist','refinst_dist','id_bureau','id_ville'];

    protected $hidden = [];

    public function type_user() {
        return $this->belongsTo("App\TypeUser");
    }
    public function categorie_user() {
        return $this->belongsTo("App\CategorieUser");
    }
    public function distributeur() {
        return $this->belongsTo("App\Distributeur");
    }
    public function bureau() {
        return $this->belongsTo("App\Bureau");
    }
    public function ville() {
        return $this->belongsTo("App\Ville");
    }

    public function distributeurs() {
        return $this->hasMany("App\Distributeur");
    }
    public function transactions() {
        return $this->hasMany("App\Transaction");
    }
    public function commandes() {
        return $this->hasMany("App\Commande");
    }
    public function requetes() {
        return $this->hasMany("App\Requete");
    }
    public function migrations() {
        return $this->hasMany("App\Migration");
    }
}
