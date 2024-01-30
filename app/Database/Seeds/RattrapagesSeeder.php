<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RattrapagesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'semestre' => 'S1',
                'type' => 'DS',
                'ressource' => 'Maths',
                'date' => '2021-01-29',
                'etat' => 'En attente',
                'heure' => '10h',
                'duree' => '2h',
                'enseignant' => 'M. Dupont',
                'absent' => 'M. Dupont',
                'justifie' => 'Oui',
            ],
            [
                'semestre' => 'S1',
                'type' => 'DS',
                'ressource' => 'Maths',
                'date' => '2021-01-29',
                'etat' => 'En attente',
                'heure' => '10h',
                'duree' => '2h',
                'enseignant' => 'M. Dupont',
                'absent' => 'M. Dupont',
                'justifie' => 'Oui',
            ],
            [
                'semestre' => 'S1',
                'type' => 'DS',
                'ressource' => 'Maths',
                'date' => '2021-01-29',
                'etat' => 'En attente',
                'heure' => '10h',
                'duree' => '2h',
                'enseignant' => 'M. Dupont',
                'absent' => 'M. Dupont',
                'justifie' => 'Oui',
            ],
            [
                'semestre' => 'S1',
                'type' => 'DS',
                'ressource' => 'Maths',
                'date' => '2021-01-29',
                'etat' => 'En attente',
                'heure' => '10h',
                'duree' => '2h',
                'enseignant' => 'M. Dupont',
                'absent' => 'M. Dupont',
                'justifie' => 'Oui',
            ],
            [
                'semestre' => 'S1',
                'type' => 'DS',
                'ressource' => 'Maths',
                'date' => '2021-01-29',
                'etat' => 'En attente',
                'heure' => '10h',
                'duree' => '2h',
                'enseignant' => 'M. Dupont',
                'absent' => 'M. Dupont',
                'justifie' => 'Oui',
            ],
        ];

        // Using Query Builder
        $this->db->table('rattrapages')->insertBatch($data);
    }
}
