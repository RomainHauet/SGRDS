<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipeModel extends Model
{
    protected $table = 'participe';
    protected $primaryKey = 'id_R, id_Edt';
    
    protected $allowedFields = [
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
