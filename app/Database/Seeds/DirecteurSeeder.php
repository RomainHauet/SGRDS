<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DirecteurSeeder extends Seeder
{
    public function run()
    {
        // suprimme le contenu de la table directeur
        $this->db->table('directeur')->truncate();
        
        $data = [
            'identifiant' => 'i',
            'email' => 'tassery.hugo@gmail.com',
            'motDePasse' => 'm',
            'reset_token' => 'r',
            'reset_expires_at' => '2021-01-01 00:00:00',
        ];

        // Simple Queries
        //$this->db->query("INSERT INTO directeur (identifiant, email, motDePasse) VALUES(:identifiant:, :email:, :motDePasse:)", $data);
        
        // Using Query Builder
        $this->db->table('directeur')->insert($data);
    }
}
