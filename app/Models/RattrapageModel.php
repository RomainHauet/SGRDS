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
			'listeEleve',
		];

		protected $validationRules = [
			'semestre' => 'required',
			'type_DS' => 'required',
			//'type_Rattrapage' => 'required',
			'ressource' => 'required',
			'date_DS' => 'required',
			//'date_Rattrapage' => 'required',
			'etat' => 'required',
			//'heure' => 'required',
			//'duree' => 'required',
			'enseignant' => 'required',
			'listeEleve' => 'required',
		];
	}