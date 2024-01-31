<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Participe extends Migration
{
    public function up()
    {
        // id de l'étudiant et id du rattrapage (clé primaire clé étrangère)
        $this->forge->addField([
            'id_Edt' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_R' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey(['id_Edt', 'id_R']);

        $this->forge->addForeignKey('id_Edt', 'etudiant', 'id_Edt');
        $this->forge->addForeignKey('id_R', 'rattrapage', 'id_R');

        $this->forge->createTable('participe');
    }

    public function down()
    {
        $this->forge->dropTable('participe');
    }
}
