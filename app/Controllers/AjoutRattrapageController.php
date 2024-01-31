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
            'ressource' => 'required|min_length[3]|max_length[50]',
            'date' => 'required',
            'duree' => 'required',
            'enseignant' => 'required|min_length[3]|max_length[50]',
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
            $model->save($data);

            $session = session();
            $session->setFlashdata('success', 'Rattrapage ajouté avec succès');
            
            return redirect()->to('/');
        }
        else
        {
            $data['validation'] = $this->validator;
            echo view('ajout_rattrapage', $data);
        }
    }
}