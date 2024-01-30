<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EtudiantSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom' => 'Michel',
                'prenom' => 'Jean',
                'email' => 'jean.michel@univ-lehavre.fr',
            ],
            [
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'email' => 'jean.dupont@univ-lehavre.fr',
            ],
        ];

        // Using Query Builder
        foreach ($data as $etudiant) {
            $this->db->table('etudiant')->insert($etudiant);
        }
    }
}
