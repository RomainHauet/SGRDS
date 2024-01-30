<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipeModel extends Model
{
    protected $table = 'rattrapage';
    protected $primaryKey = 'id_R, id_Edt';
    
    protected $allowedFields = [
        'id_R',
        'id_Edt',
        'justifie',
    ];

    protected $foreignKey = [
        'id_Edt',
        'id_R',
    ];

    protected $validationRules = [
        'id_R' => 'required',
        'id_Edt' => 'required',
        'justifie' => 'required',
    ];
}
