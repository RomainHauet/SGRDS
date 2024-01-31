<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DirecteurSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'identifiant' => 'i',
            'email' => 'tassery.hugo@gmail.com',
            'motDePasse' => 'm',
        ];

        // Simple Queries
        //$this->db->query("INSERT INTO directeur (identifiant, email, motDePasse) VALUES(:identifiant:, :email:, :motDePasse:)", $data);
        
        // Using Query Builder
        $this->db->table('directeur')->insert($data);
    }
}
