<?php
	namespace App\Controllers;
	use CodeIgniter\Model;

	class AttendanceModel
	{
		protected $table = 'attendances';

		protected $allowedFields = [
		'eleve',
		'rattrapage',
		];
	}