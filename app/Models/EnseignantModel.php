<?php
use CodeIgniter\Model;

	class EnseignantModel
	{
		protected $table = 'enseignant';
		protected $primaryKey = 'id_Ens';

		protected $allowedFields = [
		'nom',
		'prenom',
		'email'
		];
	}