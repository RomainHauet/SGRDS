<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Enseignant extends Migration
{
    public function up()
    {
        // déclare les champs de la table enseignant
        $this->forge->addField([
            'id_Ens' => [
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

        // ajoute la clé primaire
        $this->forge->addKey('id_Ens', true);

        // exécute la création de la table enseignant
        $this->forge->createTable('enseignant');
    }

    public function down()
    {
        // supprime la table enseignant
        $this->forge->dropTable('enseignant');
    }
}
