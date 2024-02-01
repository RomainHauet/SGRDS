<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EnseignantSeeder extends Seeder
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
            [
                'nom' => 'DuJardin',
                'prenom' => 'Jean',
                'email' => 'romain.hauet@etu.univ-lehavre.fr',
            ],
        ];

        // Using Query Builder
        foreach ($data as $enseignant) {
            $this->db->table('enseignant')->insert($enseignant);
        }
    }
}
