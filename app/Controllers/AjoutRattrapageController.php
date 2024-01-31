<?php

namespace App\Controllers;

use App\Models\RattrapageModel;
use App\Models\SemestreModel;

class AjoutRattrapageController extends BaseController
{
    public function index()
    {
        // Verifie que l'utilisateur est connecté sinon il le redirige vers la page de connexion
        /*if(!session()->get('isLoggedIn'))
        {
            helper(['form']);
            echo view('ajout_rattrapage');
        }
        else
        {
            return redirect()->to('/connexion');
        }*/

        // Récupère les semestres et toutes les ressources
        $model = new SemestreModel();
        $data['semestres'] = $model->getSemestres();
        $data['ressources'] = $model->getRessources();
        // Trie les semestres par ordre décroissant
        sort($data['semestres']);

        helper(['form']);
        echo view('ajout_rattrapage', ['semestres' => $data['semestres'], 'ressources' => $data['ressources']]);
    }

    public function ajoutRattrapage()
    {
        helper(['form']);

        $model = new RattrapageModel();
        $data = [
            'semestre' => $this->request->getVar('semestre'),
            'ressource' => $this->request->getVar('ressource'),
            'type_DS' => $this->request->getVar('type_DS'),
            'date_DS' => $this->request->getVar('date_DS'),
            'duree' => $this->request->getVar('duree'),
            'enseignant' => $this->request->getVar('enseignant'),
            'etat' => 'En attente',
            'listeEleve' => 'Personne',
        ];

        // Le rattrapage est ajouté dans la base de données
        $model->save($data);

        $session = session();
        $session->setFlashdata('success', 'Rattrapage ajouté avec succès');
        
        return redirect()->to('/');
    }
}