<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    protected $fillable = [
        'id_migrat','date_migrat','rang_migrat','statut_trans'
    ];

    protected $primaryKey = 'id_migrat';

    protected $foreignKey = ['id_dist','id_typmig','id_bureau'];

    protected $hidden = [];

    public function distributeur() {
        return $this->belongsTo("App\Distributeur");
    }
    public function type_migration() {
        return $this->belongsTo("App\TypeMigration");
    }
    public function Bureau() {
        return $this->belongsTo("App\bureau");
    }

}
