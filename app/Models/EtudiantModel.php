<?php
	namespace App\Models;
	use CodeIgniter\Model;
	class EtudiantModel extends Model
	{
		protected $table = 'etudiants';

		protected $allowedFields = [
		'nom',
		'prenom',
		'id',
		'email',
		];
	}