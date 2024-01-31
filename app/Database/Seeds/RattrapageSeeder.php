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
                'type_Rattrapage' => 'Rattrapage1',
                'ressource' => 'ressource1',
                'date_DS' => '2021-01-01',
                'date_Rattrapage' => '2021-01-01',
                'etat' => 'etat1',
                'salle' => 'salle1',
                'heure' => 1,
                'duree' => 1,
                'enseignant' => 'enseignant1',
                'listeEleve' => 'listeEleve1',
            ],
            [
                'semestre' => 'S2',
                'type_DS' => 'DS2',
                'type_Rattrapage' => 'Rattrapage2',
                'ressource' => 'ressource2',
                'date_DS' => '2021-02-02',
                'date_Rattrapage' => '2021-02-02',
                'etat' => 'etat2',
                'salle' => 'salle2',
                'heure' => 2,
                'duree' => 2,
                'enseignant' => 'enseignant2',
                'listeEleve' => 'listeEleve2',
            ],
            [
                'semestre' => 'S3',
                'type_DS' => 'DS3',
                'type_Rattrapage' => 'Rattrapage3',
                'ressource' => 'ressource3',
                'date_DS' => '2021-03-03',
                'date_Rattrapage' => '2021-03-03',
                'etat' => 'etat3',
                'salle' => 'salle3',
                'heure' => 3,
                'duree' => 3,
                'enseignant' => 'enseignant3',
                'listeEleve' => 'listeEleve3',
            ],
        ];

        // Simple Queries
        //$this->db->query("INSERT INTO rattrapage (semestre, type_DS, type_Rattrapage, ressource, date_DS, date_Rattrapage, etat, heure, duree, enseignant, listeEleve) VALUES(:semestre:, :type_DS:, :type_Rattrapage:, :ressource:, :date_DS:, :date_Rattrapage:, :etat:, :heure:, :duree:, :enseignant:, :listeEleve:)", $data);
        
        // Using Query Builder
        foreach ($data as $d) {
            $this->db->table('rattrapage')->insert($d);
        }
    }
}
