<?php
	namespace App\Models;
	use CodeIgniter\Model;
	class RattrapageModel extends Model
	{
		protected $table = 'rattrapages';

		protected $allowedFields = [
		'classe',
		'matiere',
		'date',
		'heure',
		'duree',
		'prof',
		'absent',
		'justifie',
		];
	}