<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rattrapages extends Migration
{
    public function up()
    {
        // protected $table = 'rattrapages';
		// protected $primaryKey = 'id';
		// protected $allowedFields = [
		// 'semestre',
		// 'type',
		// 'ressource',
		// 'date',
		// 'etat',
		// 'heure',
		// 'duree',
		// 'enseignant',
		// 'absent',
		// 'justifie',
		// ];

        // déclare les champs de la table rattrapages
        $this->forge->addField([
            'id_R' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'semestre' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'type' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'ressource' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'date' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'etat' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'heure' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'duree' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'enseignant' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'absent' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'justifie' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ]);

        // ajoute la clé primaire
        $this->forge->addKey('id_R', true);

        // crée la table rattrapages
        $this->forge->createTable('rattrapages');
    }

    public function down()
    {
        // drop table rattrapages
        $this->forge->dropTable('rattrapages');
    }
}
