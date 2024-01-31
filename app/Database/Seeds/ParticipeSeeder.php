<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ParticipeSeeder extends Seeder
{
    public function run()
    {
        // récupère les id des étudiants et des rattrapages et choisie aléatoirement parmi eux
        $etudiants = $this->db->table('etudiant')->select('id_Edt')->get()->getResultArray();
        $rattrapages = $this->db->table('rattrapage')->select('id_R')->get()->getResultArray();

        // affiche les données
        $data = [];
        foreach ($etudiants as $etudiant) {
            $data[] = [
                'id_Edt' => $etudiant['id_Edt'],
                'id_R' => $rattrapages[array_rand($rattrapages)]['id_R'],
            ];
        }

        // Using Query Builder
        foreach ($data as $participe) {
            $this->db->table('participe')->insert($participe);
        }
    }
}