<?php
	namespace App\Models;
	use CodeIgniter\Model;
	class EtudiantModel extends Model
	{
		protected $table = 'rattrapage';
		protected $primaryKey = 'id';

		protected $allowedFields = [
		'nom',
		'prenom',
		'email',
		];
	}