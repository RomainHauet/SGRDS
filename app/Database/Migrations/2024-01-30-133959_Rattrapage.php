<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rattrapage extends Migration
{
    public function up()
    {
        // déclare les champs de la table rattrapage
        $this->forge->addField([
            'id_R' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'semestre' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'type_DS' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'type_Rattrapage' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'ressource' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'date_DS' => [
                'type' => 'DATE',
            ],
            'date_Rattrapage' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'etat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'salle' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'heure' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'duree' => [
                'type' => 'NUMERIC',
            ],
            'enseignant' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'listeEleve' => [
                'type' => 'VARCHAR',
            ],
        ]);

        // ajoute la clé primaire
        $this->forge->addKey('id_R', true);

        // crée la table rattrapage
        $this->forge->createTable('rattrapage');
    }

    public function down()
    {
        // drop table rattrapage
        $this->forge->dropTable('rattrapage');
    }
}