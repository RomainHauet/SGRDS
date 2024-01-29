<?php
	namespace App\Models;
	use CodeIgniter\Model;
	class RattrapageModel extends Model
	{
		protected $table = 'rattrapages';
		protected $primaryKey = 'id';
		protected $allowedFields = [
		'semestre',
		'type',
		'ressource',
		'date',
		'etat',
		'heure',
		'duree',
		'enseignant',
		'absent',
		'justifie',
		];
	}