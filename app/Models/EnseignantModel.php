<?php
use CodeIgniter\Model;

	class EnseignantModel
	{
		protected $table = 'rattrapage';
		protected $primaryKey = 'id_Ens';

		protected $allowedFields = [
		'nom',
		'prenom',
		'email'
		];
	}