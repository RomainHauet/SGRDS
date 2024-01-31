<?php

namespace App\Controllers;

use App\Models\RattrapageModel;
use App\Models\SemestreModel;
use App\Models\EnseignantModel;

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

            //Envoi d'un mail à l'enseignant

            $enseignantModel = new EnseignantModel();
            $enseignant = $enseignantModel->where('id_E', $data['enseignant'])->first();
            $emailService = \Config\Services::email();

            $message = " Bonjour". $enseignant['prenom']." ". $enseignant['nom'] .",
            Un rattrapage a été ajouté à votre emploi du temps le ". $data['date'] ." de ". $data['duree'] ." heure(s). 
            Merci de valider ou de refuser ce rattrapage sur le site de gestion des rattrapages de l'IUT.";

            $from = 'tassery.hugo@gmail.com';
            $to = $enseignant['email'];
            $subject = 'Ajout d\'un rattrapage le '. $data['date'];

            $emailService->setTo($to);
            $emailService->setFrom($from);
            $emailService->setSubject($subject);
            $emailService->setMessage($message);
            if ($emailService->send()) {
                echo 'E-mail envoyé avec succès.';
            } else {
                echo $emailService->printDebugger();
            }

            return redirect()->to('/');
        }
        else
        {
            echo view('/');
        }
    }
}