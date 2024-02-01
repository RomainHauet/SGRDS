<?php
	namespace App\Models;
	use CodeIgniter\Model;
	class RattrapageModel extends Model
	{
		protected $table = 'rattrapage';
		protected $primaryKey = 'id_R';

		protected $allowedFields = [
			'semestre',
			'type_DS',
			'type_Rattrapage',
			'ressource',
			'date_DS',
			'date_Rattrapage',
			'etat',
			'salle',
			'heure',
			'duree',
			'enseignant',
			'commentaire',
		];

		protected $validationRules = [
			'semestre' => 'required',
			'type_DS' => 'required',
			'ressource' => 'required',
			'date_DS' => 'required',
			'etat' => 'required',
			'enseignant' => 'required',
		];
	}