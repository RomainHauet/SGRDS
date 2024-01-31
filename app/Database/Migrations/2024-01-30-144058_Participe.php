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

        //cascade pour supprimer les données liées
        $this->forge->addForeignKey('id_Edt', 'etudiant', 'id_Edt', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_R', 'rattrapage', 'id_R', 'CASCADE', 'CASCADE');

        $this->forge->createTable('participe', true);
    }

    public function down()
    {
        $this->forge->dropTable('participe');
    }
}
