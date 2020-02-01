<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $fillable = [
        'id_anno','titre_anno','description_anno','media_anno','statut_anno'
    ];

    protected $primaryKey = 'id_anno';

    protected $foreignKey = ['id_admin'];

    protected $hidden = [];

    public function admin() {
        return $this->belongsTo("App\Admin");
    }

}