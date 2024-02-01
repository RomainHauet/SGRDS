<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederGeneration extends Seeder
{
    public function run()
    {
        $this->call('RattrapageSeeder');
        $this->call('DirecteurSeeder');
        $this->call('EtudiantSeeder');
        $this->call('EnseignantSeeder');
        //$this->call('ParticipeSeeder');
        $this->call('SemestreSeeder');
    }
}