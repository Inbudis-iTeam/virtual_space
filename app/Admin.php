<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'id_admin','username_admin','password_admin','islogin','info_admin'
    ];

    protected $primaryKey = 'id_admin';

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }

    public function admins() {
        return $this->hasMany("App\Admin");
    }
    public function categorie_users() {
        return $this->hasMany("App\CategorieUser");
    }
    public function type_users() {
        return $this->hasMany("App\TypeUser");
    }
    public function type_bureaus() {
        return $this->hasMany("App\TypeBureau");
    }
    public function type_migrations() {
        return $this->hasMany("App\TypeMigration");
    }
    public function categorie_produits() {
        return $this->hasMany("App\CategorieProduit");
    }
    public function mode_payements() {
        return $this->hasMany("App\ModePayement");
    }
    public function villes() {
        return $this->hasMany("App\Ville");
    }
    public function quartiers() {
        return $this->hasMany("App\Quartier");
    }
    public function bureaus() {
        return $this->hasMany("App\Bureau");
    }
    public function annonces() {
        return $this->hasMany("App\Annonce");
    }
    public function produits() {
        return $this->hasMany("App\Produit");
    }

    
}
