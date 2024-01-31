<?php

namespace App\Controllers;

use App\Models\RattrapageModel;

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
        helper(['form']);
        echo view('ajout_rattrapage');
    }

    public function ajoutRattrapage()
    {
        helper(['form']);
        $rules = [
            'ressource' => 'required',
            'date' => 'required',
            'duree' => 'required',
            'enseignant' => 'required',
        ];

        if($this->validate($rules))
        {
            $model = new RattrapageModel();
            $data = [
                'ressource' => $this->request->getVar('ressource'),
                'date' => $this->request->getVar('date'),
                'duree' => $this->request->getVar('duree'),
                'enseignant' => $this->request->getVar('enseignant'),
            ];

            // Le rattrapage est ajouté dans la base de données
            $model->save($data);

            $session = session();
            $session->setFlashdata('success', 'Rattrapage ajouté avec succès');
            
            return redirect()->to('/');
        }
        else
        {
            echo view('ajout_rattrapage', $data);
        }
    }
}