<?php
namespace App\Controllers;

use App\Models\EnseignantModel;
use App\Models\EtudiantModel;
use App\Models\ParticipeModel;
use App\Models\RattrapageModel;
use App\Models\SemestreModel;

class ListeRattrapageController extends BaseController
{
    public function index(): string
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapages = $modele_rattrapage->findAll();
        //pour chaque rattrapage, on récupère le nom de l'enseignant
        $enseignant = new EnseignantModel();
        $enseignants = $enseignant->getEnseignants();

        return view('liste_rattrapage', ['rattrapages' => $rattrapages, 'enseignants' => $enseignants]);
    }

    public function modifier($id): string
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapage = $modele_rattrapage->find($id);

        $semestre = new SemestreModel();
        $enseignant = new EnseignantModel();
        $data['semestres'] = $semestre->getSemestres();
        $data['ressources'] = $semestre->getRessources();
        $data['enseignants'] = $enseignant->getEnseignants();
        // Trie les semestres par ordre décroissant
        sort($data['semestres']);

        helper(['form']);
        return view('ajout_rattrapage', ['semestres' => $data['semestres'], 'ressources' => $data['ressources'], 'enseignants' => $data['enseignants'], 'rattrapage' => $rattrapage]);
    }

    public function modifierRattrapage($id)
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapage = $modele_rattrapage->find($id);

        $rattrapage['ressource'] = $this->request->getVar('ressource');
        $rattrapage['date_DS'] = $this->request->getVar('date_DS');
        $rattrapage['duree'] = $this->request->getVar('duree');
        $rattrapage['enseignant'] = $this->request->getVar('enseignant');
        $rattrapage['etat'] = "En attente";

        $modele_rattrapage->update($id, $rattrapage);

        return redirect()->to('/');
    }

    public function supprimerRattrapage($id)
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        $modele_rattrapage->delete($id);

        return redirect()->to('/');
    }

    public function valider($id)
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapage = $modele_rattrapage->find($id);

        //Envoi d'un mail aux étudiants

        $participeModel = new ParticipeModel();
        $participe = $participeModel->where('id_R', $id)->findAll();

        $étudiantModel = new EtudiantModel();
        // on récupère tous les étudiants qui participent au rattrapage
        $emailService = \Config\Services::email();

        $from = 'tassery.hugo@gmail.com';
        $subject = 'Ajout d\'un rattrapage le ' . $rattrapage['date_DS'];
        $emailService->setFrom($from);
        $emailService->setSubject($subject);

        for ($i = 0; $i < count($participe); $i++) {
            $étudiant = $étudiantModel->where('id_Edt', $participe[$i]['id_Edt'])->findAll();
            $emailService->setTo($étudiant['email']);

            $message = " Bonjour " . $étudiant['prenom'] . " " . $étudiant['nom'] . ",
            Vous avez été convoqué à un rattrapage le  " . $rattrapage['date_DS'] . " de " . $rattrapage['duree'] . " heure(s) par " . $rattrapage['enseignant'] . " 
            dans la salle " .$rattrapage['salle']. ".
            Merci de vous présenter.";

            $to = $étudiant['email'];

            $emailService->setMessage($message);
            if ($emailService->send()) {
                echo 'E-mail envoyé à '. $étudiant['prenom']." ". $étudiant['nom'] .' avec succès.';
            } else {
                echo $emailService->printDebugger();
            }

        }
        

        return view('valider_rattrapage', ['rattrapage' => $rattrapage]);
    }

    public function validerRattrapage($id)
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapage = $modele_rattrapage->find($id);

        $rattrapage['etat'] = "Validé";

        $modele_rattrapage->update($id, $rattrapage);

        return redirect()->to('/');
    }

    public function nonRattrapage($id)
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapage = $modele_rattrapage->find($id);

        $rattrapage['commentaire'] = $this->request->getVar('commentaire');
        $rattrapage['etat'] = "Neutralisé";

        $modele_rattrapage->update($id, $rattrapage);
        
        return redirect()->to('/');
    }

}
