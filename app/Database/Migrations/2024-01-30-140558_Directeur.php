<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Directeur extends Migration
{
    public function up()
    {
        // déclare les champs de la table directeur
        $this->forge->addField([
            'id_D' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'identifiant' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'motDePasse' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'reset_token' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'reset_expires_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        // ajoute la clé primaire
        $this->forge->addKey('id_D', true);

        // exécute la création de la table directeur
        $this->forge->createTable('directeur');
    }

    public function down()
    {
        // supprime la table directeur
        $this->forge->dropTable('directeur');
    }
}
