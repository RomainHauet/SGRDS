<?php

namespace App\Models;

use CodeIgniter\Model;

class EtudiantModel extends Model
{
    protected $table = 'rattrapage';
    protected $primaryKey = 'id_Edt';
    
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
