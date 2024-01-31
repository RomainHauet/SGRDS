<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Semestre extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_S' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'semestre' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'resource' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_S', true);
        $this->forge->createTable('semestre');
    }

    public function down()
    {
        $this->forge->dropTable('semestre');
    }
}
