<?php
	namespace App\Controllers;
	use CodeIgniter\Model;

	class EnseignantModel
	{
		protected $table = 'enseignants';
		protected $primaryKey = 'id';

		protected $allowedFields = [
		'nom',
		'prenom',
		'email'
		];
	}