<?php
namespace App\Controllers;

class AttendanceModel
{
    protected $table = 'attendances';

    protected $allowedFields = [
        'eleve',
        'rattrapage',
    ];
}
