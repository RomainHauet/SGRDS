<?php
	namespace App\Controllers;
	use CodeIgniter\Model;

	class EnseignantModel
	{
		protected $table = 'enseignants';

		protected $allowedFields = [
		'nom',
		'prenom',
		'id',
		'email'
		];
	}