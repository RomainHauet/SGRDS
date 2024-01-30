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
			'listeeleve',
		];

		protected $validationRules = [
			'semestre' => 'required',
			'type' => 'required',
			'ressource' => 'required',
			'date' => 'required',
			'etat' => 'required',
			'heure' => 'required',
			'duree' => 'required',
			'enseignant' => 'required',
			'listeeleve' => 'required',
		];
	}