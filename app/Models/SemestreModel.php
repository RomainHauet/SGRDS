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

    public function getSemestres()
    {
        $query = $this->db->query('SELECT DISTINCT semestre FROM semestre');
        $semestres = $query->getResultArray();
        $semestres = array_column($semestres, 'semestre');
        return $semestres;
    }

    public function getRessources()
    {
        $query = $this->db->query('SELECT DISTINCT resource FROM semestre');
        $ressources = $query->getResultArray();
        $ressources = array_column($ressources, 'resource');
        return $ressources;
    }
}
