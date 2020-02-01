<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $fillable = [
        'id_perf','sur6mois_perf','sur12mois_perf'
    ];

    protected $primaryKey = 'id_perf';

    protected $foreignKey = ['id_dist'];

    protected $hidden = [];

    public function distributeur() {
        return $this->belongsTo("App\Distributeur");
    }
}
