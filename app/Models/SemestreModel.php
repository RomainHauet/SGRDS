<?php

namespace App\Models;

use CodeIgniter\Model;

class SemestreModel extends Model
{
    protected $table = 'semestre';
    protected $primaryKey = 'id_S';

    protected $allowedFields =
    [
        'semestre', 'resource'
    ];

    protected $validationRules =
    [
        'semestre' => 'required',
        'resource' => 'required',
    ];

}
