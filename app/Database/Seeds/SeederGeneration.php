<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederGeneration extends Seeder
{
    public function run()
    {
        $this->call('RattrapagesSeeder');
        //$this->call('ElevesSeeder');
        //$this->call('EnseignantsSeeder');
        //$this->call('MatieresSeeder');
        //$this->call('SallesSeeder');
        //$this->call('SeancesSeeder');
        //$this->call('UtilisateursSeeder');
    }
}