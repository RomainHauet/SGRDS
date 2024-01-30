<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RattrapagesSeeder extends Seeder
{
    public function run()
    {
        //$this->db->table('rattrapages')->truncate();

        $data = [
            'semestre' => 'S1',
            'type'    => 'DS',
            'ressource'    => 'Maths',
            'date'    => '2021-01-30',
            'etat'    => 'En cours',
            'heure'    => '10h',
            'duree'    => '2h',
            'enseignant'    => 'M. Dupont',
            'listeeleve'    => '["Jean", "Paul", "Jacques"]',
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO rattrapages (semestre, type, ressource, date, etat, heure, duree, enseignant, listeeleve) VALUES(:semestre:, :type:, :ressource:, :date:, :etat:, :heure:, :duree:, :enseignant:, :listeeleve:)', $data);

        // Using Query Builder
        $this->db->table('rattrapages')->insert($data);
    }
}
