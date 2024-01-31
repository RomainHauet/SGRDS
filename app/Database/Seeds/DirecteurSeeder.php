<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DirecteurSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'identifiant' => 'i',
            'email' => 'email1',
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
