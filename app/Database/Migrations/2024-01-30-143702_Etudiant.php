<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Etudiant extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_Edt' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'prenom' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addKey('id_Edt', true);

        $this->forge->createTable('etudiant');
    }

    public function down()
    {
        $this->forge->dropTable('etudiant');
    }
}
