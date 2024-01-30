<?php

namespace App\Models;

use CodeIgniter\Model;

class DirecteurModel extends Model
{
    protected $table = 'directeur';
    protected $primaryKey = 'id_D';
    
    protected $allowedFields = [
        "identifiant",
        "email",
        "motDePasse",
    ];

    protected $validationRules = [
        "identifiant" => "required",
        "email" => "required",
        "motDePasse" => "required",
    ];
}
