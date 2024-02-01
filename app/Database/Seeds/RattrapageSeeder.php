<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RattrapageSeeder extends Seeder
{
    public function run()
    {
        // date_DS, date_rattrapage DATE type
        $data = [
            [
                'semestre' => 'S1',
                'type_DS' => 'DS1',
                'ressource' => 'ressource1',
                'date_DS' => '2021-01-01',
                'etat' => 'En attente',
                'duree' => 1,
                'enseignant' => 'enseignant1',
                'listeEleve' => 'listeEleve1',
            ],
            [
                'semestre' => 'S2',
                'type_DS' => 'DS2',
                'ressource' => 'ressource2',
                'date_DS' => '2021-02-02',
                'etat' => 'En attente',
                'duree' => 2,
                'enseignant' => 'enseignant2',
                'listeEleve' => 'listeEleve2',
            ],
            [
                'semestre' => 'S3',
                'type_DS' => 'DS3',
                'ressource' => 'ressource3',
                'date_DS' => '2021-03-03',
                'etat' => 'En attente',
                'duree' => 3,
                'enseignant' => 'enseignant3',
                'listeEleve' => 'listeEleve3',
            ],
        ];

        // Using Query Builder
        foreach ($data as $d) {
            $this->db->table('rattrapage')->insert($d);
        }
    }
}
