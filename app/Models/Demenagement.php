<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demenagement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'etat',
        'situation_local_depart',
        'situation_local_arrivee',
        'liaison_local_depart',
        'liaison_local_arrivee',
        'pays_depart',
        'ville_depart',
        'quartier_depart',
        'distance_route_depart',
        'pays_arrivee',
        'ville_arrivee',
        'quartier_arrivee',
        'distance_route_arrivee',
        'jour_demenagement',
        'heure_demenagement',
        'objects',
        'object_fragiles',
        'autres',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_demenageur');
    }
}
