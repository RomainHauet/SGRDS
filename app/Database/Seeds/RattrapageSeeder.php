<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RattrapageSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'semestre' => 'S1',
                'type_DS' => 'DS1',
                'ressource' => 'ressource1',
                'date_DS' => '2021-01-01',
                'etat' => 'En attente',
                'duree' => 1,
                'enseignant' => 'enseignant1',
                'commentaire' => 'commentaire1',
            ],
            [
                'semestre' => 'S2',
                'type_DS' => 'DS2',
                'ressource' => 'ressource2',
                'date_DS' => '2021-02-02',
                'etat' => 'En attente',
                'duree' => 2,
                'enseignant' => 'enseignant2',
            ],
            [
                'semestre' => 'S3',
                'type_DS' => 'DS3',
                'ressource' => 'ressource3',
                'date_DS' => '2021-03-03',
                'etat' => 'En attente',
                'duree' => 3,
                'enseignant' => 'enseignant3',
            ],
            [
                'semestre' => 'S4',
                'type_DS' => 'DS4',
                'ressource' => 'ressource4',
                'date_DS' => '2021-04-04',
                'etat' => 'En attente',
                'duree' => 4,
                'enseignant' => 'enseignant4',
                'commentaire' => 'commentaire1',
            ],
            [
                'semestre' => 'S5',
                'type_DS' => 'DS5',
                'ressource' => 'ressource5',
                'date_DS' => '2021-05-05',
                'etat' => 'En attente',
                'duree' => 5,
                'enseignant' => 'enseignant5',
                'commentaire' => 'commentaire1',
            ],
            [
                'semestre' => 'S6',
                'type_DS' => 'DS6',
                'ressource' => 'ressource6',
                'date_DS' => '2021-06-06',
                'etat' => 'En attente',
                'duree' => 6,
                'enseignant' => 'enseignant6',
                'commentaire' => 'commentaire1',
            ],
            [
                'semestre' => 'S7',
                'type_DS' => 'DS7',
                'ressource' => 'ressource7',
                'date_DS' => '2021-07-07',
                'etat' => 'En attente',
                'duree' => 7,
                'enseignant' => 'enseignant7',
                'commentaire' => 'commentaire1',
            ],
            [
                'semestre' => 'S8',
                'type_DS' => 'DS8',
                'ressource' => 'ressource8',
                'date_DS' => '2021-08-08',
                'etat' => 'En attente',
                'duree' => 8,
                'enseignant' => 'enseignant8',
                'commentaire' => 'commentaire1',
            ],
            [
                'semestre' => 'S9',
                'type_DS' => 'DS9',
                'ressource' => 'ressource9',
                'date_DS' => '2021-09-09',
                'etat' => 'En attente',
                'duree' => 9,
                'enseignant' => 'enseignant9',
                'commentaire' => 'commentaire1',
            ],
        ];

        // Using Query Builder
        foreach ($data as $d) {
            $this->db->table('rattrapage')->insert($d);
        }
    }
}
