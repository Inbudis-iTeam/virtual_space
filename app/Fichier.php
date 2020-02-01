<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    protected $fillable = [
        'id_file','auteur','referto_file','titre_file','chemin_file','taille_file','description_file','statut_file'
    ];

    protected $primaryKey = 'id_file';

    protected $foreignKey = [];

    protected $hidden = [];
}
