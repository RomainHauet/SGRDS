<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipeModel extends Model
{
    protected $table = 'participe';
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

    public function getParticipes()
    {
        return $this->findAll();
    }
}
