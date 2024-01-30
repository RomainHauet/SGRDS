<?php
namespace App\Controllers;

class EnseignantModel
{
    protected $table = 'enseignants';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nom',
        'prenom',
        'email',
    ];
}
