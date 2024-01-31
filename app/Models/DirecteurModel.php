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
        "reset_token",
        "reset_expires_at",
    ];

    protected $validationRules = [
        "identifiant" => "required",
        "email" => "required",
        "motDePasse" => "required",
    ];
}
