<?php
namespace App\Controllers;
use App\Models\EleveModele;
use App\Models\RattrapageModel;
class ListeRattrapageController extends BaseController
{
    public function index(): string
    {
    //récupérer le model
    $modele_rattrapage = new RattrapageModel();

    //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
    $rattrapages = $modele_rattrapage->findAll();
    var_dump($rattrapages);

    return view('liste_rattrapage',['rattapages' => $rattrapages]);
    }
}