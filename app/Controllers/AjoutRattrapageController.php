<?php

namespace App\Controllers;

use App\Models\EnseignantModel;
use App\Models\RattrapageModel;
use App\Models\SemestreModel;
use App\Models\EtudiantModel;
use App\Models\ParticipeModel;

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
        $etudiants = new EtudiantModel();
        $participeModel = new ParticipeModel();

        $data['semestres'] = $semestre->getSemestres();
        $data['ressources'] = $semestre->getRessources();
        $data['enseignants'] = $enseignant->getEnseignants();
        $data['etudiants'] = $etudiants->getEtudiants();
        $data['participes'] = $participeModel->getParticipes();

        // Trie les semestres par ordre décroissant
        sort($data['semestres']);        

        helper(['form']);
        echo view('ajout_rattrapage',
        [
            'semestres' => $data['semestres'],
            'ressources' => $data['ressources'],
            'enseignants' => $data['enseignants'],
            'etudiants' => $data['etudiants'],
            'participes' => $data['participes'],
        ]);
    }

    public function ajoutRattrapage()
    {
        helper(['form']);

        $rattrapageModel = new RattrapageModel();
        $enseignantModel = new EnseignantModel();
        $etudiantModel = new EtudiantModel();
        $participeModel = new ParticipeModel();

        $data = [
            'semestre' => $this->request->getVar('semestre'),
            'ressource' => $this->request->getVar('ressource'),
            'type_DS' => $this->request->getVar('type_DS'),
            'date_DS' => $this->request->getVar('date_DS'),
            'duree' => $this->request->getVar('duree'),
            'enseignant' => $this->request->getVar('enseignant'),
            'etat' => 'En attente',
        ];

        // Le rattrapage est ajouté dans la base de données
        $rattrapageModel->save($data);

        // Récupère tous les étudiants du semestre sélectionné
        if  ($this->request->getVar('etudiants') != null)
        {
            // Récupère les étudiants sélectionnés
            $etudiants = $etudiantModel->getEtudiants();

            // Récupère les étudiants du semestre sélectionné
            $data['etudiants'] = $this->request->getVar('etudiants');

            foreach ($etudiants as $etudiant)
            {
                // je vérifie si l'id de l'étudiant est dans le tableau des étudiants sélectionnés
                if( in_array($etudiant['id_Edt'], $data['etudiants']))
                {
                    // dd($etudiant['id_Edt'], $rattrapageModel->getInsertID());
                    // Ajoute à la base de données participe le rattrapage et l'étudiant et le booléen
                    $participeModel->save([
                        'id_Edt' => $etudiant['id_Edt'],
                        'id_R' => $rattrapageModel->getInsertID(),
                        'valide' => 1,
                    ]);
                }
            }
        }

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
