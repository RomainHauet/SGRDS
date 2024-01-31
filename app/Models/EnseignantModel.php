<?php

namespace App\Models;

use CodeIgniter\Model;

class EnseignantModel extends Model
{
    protected $table = 'enseignant';
    protected $primaryKey = 'id_Ens';
    
    protected $allowedFields = [
        'nom',
        'prenom',
        'email',
    ];

    protected $validationRules = [
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required',
    ];
}
