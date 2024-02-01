<?php

namespace App\Controllers;

use App\Models\EnseignantModel;
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
        $semestre = new SemestreModel();
        $enseignant = new EnseignantModel();
        $data['semestres'] = $semestre->getSemestres();
        $data['ressources'] = $semestre->getRessources();
        $data['enseignants'] = $enseignant->getEnseignants();
        // Trie les semestres par ordre décroissant
        sort($data['semestres']);

        helper(['form']);
        echo view('ajout_rattrapage', ['semestres' => $data['semestres'], 'ressources' => $data['ressources'], 'enseignants' => $data['enseignants']]);
    }

    public function ajoutRattrapage()
    {
        helper(['form']);

        $rattrapageModel = new RattrapageModel();
        $enseignantModel = new EnseignantModel();
        $data = [
            'semestre' => $this->request->getVar('semestre'),
            'ressource' => $this->request->getVar('ressource'),
            'type_DS' => $this->request->getVar('type_DS'),
            'salle' => 'Aucune',
            'heure' => '0:01',
            'date_DS' => $this->request->getVar('date_DS'),
            'duree' => $this->request->getVar('duree'),
            'enseignant' => $enseignantModel->getEnseignant($this->request->getVar('enseignant')),
            'etat' => 'En attente',
            'listeEleve' => 'Personne',
        ];

        // Le rattrapage est ajouté dans la base de données
        $rattrapageModel->save($data);

        $session = session();
        $session->setFlashdata('success', 'Rattrapage ajouté avec succès');

        //Envoi d'un mail à l'enseignant

        $enseignantModel = new EnseignantModel();
        $enseignant = $enseignantModel->where('id_Ens', $this->request->getVar('enseignant'))->first();
        $emailService = \Config\Services::email();

        $message = " Bonjour " . $enseignant['prenom'] . " " . $enseignant['nom'] . ",
            Un rattrapage a été ajouté à votre emploi du temps le " . $data['date_DS'] . " de " . $data['duree'] . " heure(s).
            Merci de valider ou de refuser ce rattrapage sur le site de gestion des rattrapages de l'IUT.";

        $from = 'tassery.hugo@gmail.com';
        $to = $enseignant['email'];
        $subject = 'Ajout d\'un rattrapage le ' . $data['date_DS'];

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
}
