<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SemestreSeeder extends Seeder
{
    public function run()
    {
        // suprimme le contenu de la table semestre
        $this->db->table('semestre')->truncate();
        
        $data = [
            [
                'semestre' => 'S1',
                'resource' => [
                    'R1.01',
                    'R1.02',
                    'R1.03',
                    'R1.04',
                    'R1.05',
                    'R1.06',
                    'R1.07',
                    'R1.08',
                    'R1.09',
                    'R1.10',
                    'R1.11',
                    'R1.12',
                ],
            ],

            [
                'semestre' => 'S2',
                'resource' => [
                    'R2.01',
                    'R2.02',
                    'R2.03',
                    'R2.04',
                    'R2.05',
                    'R2.06',
                    'R2.07',
                    'R2.08',
                    'R2.09',
                    'R2.10',
                    'R2.11',
                    'R2.12',
                    'R2.13',
                    'R2.14',
                ],
            ],
            [
                'semestre' => 'S3',
                'resource' => [
                    'R3.01',
                    'R3.02',
                    'R3.03',
                    'R3.04',
                    'R3.05',
                    'R3.06',
                    'R3.07',
                    'R3.08',
                    'R3.09',
                    'R3.10',
                    'R3.11',
                    'R3.12',
                    'R3.13',
                    'R3.14',
                    'P3.01',
                ],
            ],
            [
                'semestre' => 'S4',
                'resource' => [
                    'R4.01',
                    'R4.02',
                    'R4.03',
                    'R4.04',
                    'R4.05',
                    'R4.06',
                    'R4.07',
                    'R4.08',
                    'R4.09',
                    'R4.10',
                    'R4.11',
                    'R4.12',
                    'P4.01',
                    'S4.ST',
                ],
            ],
            [
                'semestre' => 'S5',
                'resource' => [
                    'R5.01',
                    'R5.02',
                    'R5.03',
                    'R5.04',
                    'R5.05',
                    'R5.06',
                    'R5.07',
                    'R5.08',
                    'R5.09',
                    'R5.10',
                    'R5.11',
                    'R5.12',
                    'R5.13',
                    'R5.14',
                ],
            ],
            [
                'semestre' => 'S6',
                'resource' => [
                    'R6.01',
                    'R6.02',
                    'R6.03',
                    'R6.04',
                    'R6.05',
                    'R6.06',
                    'R6.ST',
                ],
            ],
        ];

        // Using Query Builder
        foreach ($data as $semestre) {
            $this->db->table('semestre')->insert($semestre);
        }
    }
}
