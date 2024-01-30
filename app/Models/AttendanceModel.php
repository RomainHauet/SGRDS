<?php
namespace App\Controllers;

class AttendanceModel
{
    protected $table = 'attendance';

    protected $allowedFields = [
        'eleve',
        'rattrapage',
    ];

    protected $validationRules = [
        'eleve' => 'required',
        'rattrapage' => 'required',
    ];
}