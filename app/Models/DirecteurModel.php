<?php

namespace App\Models;

use CodeIgniter\Model;

class DirecteurModel extends Model
{
    protected $table = 'directeur';
    protected $primaryKey = 'id_D';
    
    protected $allowedFields = [
        "email",
        "motDePasse",
    ];

    protected $validationRules = [
        "email" => "required",
        "motDePasse" => "required",
    ];
}
