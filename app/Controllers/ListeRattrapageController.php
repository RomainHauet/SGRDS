<?php
namespace App\Controllers;

use App\Models\DirecteurModel;
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
        $enseignant = new EnseignantModel();
        $etudiant = new EtudiantModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapages = $modele_rattrapage->findAll();
        //pour chaque rattrapage, on récupère le nom de l'enseignant
        $enseignant = new EnseignantModel();
        $enseignants = $enseignant->getEnseignants();
        $etudiants = $etudiant->getEtudiants();

        return view('liste_rattrapage', ['rattrapages' => $rattrapages, 'enseignants' => $enseignants, 'etudiants' => $etudiants]);
    }

    public function modifier($id): string
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapage = $modele_rattrapage->find($id);

        $semestre = new SemestreModel();
        $enseignant = new EnseignantModel();
        $etudiant = new EtudiantModel();

        $data['semestres'] = $semestre->getSemestres();
        $data['ressources'] = $semestre->getRessources();
        $data['enseignants'] = $enseignant->getEnseignants();
        $data['etudiants'] = $etudiant->getEtudiants();
        // Trie les semestres par ordre décroissant
        sort($data['semestres']);

        helper(['form']);
        return view('ajout_rattrapage',
        [
            'semestres' => $data['semestres'],
            'ressources' => $data['ressources'],
            'enseignants' => $data['enseignants'],
            'rattrapage' => $rattrapage,
            'etudiants' => $data['etudiants']
        ]);
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


        return view('valider_rattrapage', ['rattrapage' => $rattrapage]);
    }

    public function validerRattrapage($id)
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapage = $modele_rattrapage->find($id);

        $rattrapage['commentaire'] = $this->request->getVar('commentaire');

        $rattrapage['salle'] = $this->request->getVar('salle');
        $rattrapage['type_Rattrapage'] = $this->request->getVar('type_Rattrapage');
        $rattrapage['heure'] = $this->request->getVar('heure');
        $rattrapage['date_Rattrapage'] = $this->request->getVar('date_Rattrapage');

        $rattrapage['etat'] = "Validé";

        $modele_rattrapage->update($id, $rattrapage);


        //Envoi d'un mail aux etudiants

        $participeModel = new ParticipeModel();
        $participe = $participeModel->where('id_R', $id)->findAll();

        $etudiantModel = new EtudiantModel();
        // on récupère tous les etudiants qui participent au rattrapage
        $emailService = \Config\Services::email();

        $from = 'tassery.hugo@gmail.com';
        $subject = 'Ajout d\'un rattrapage le ' . $rattrapage['date_DS'];
        $emailService->setFrom($from);
        $emailService->setSubject($subject);

        for ($i = 0; $i < count($participe); $i++) {
            $etudiant = $etudiantModel->where('id_Edt', $participe[$i]['id_Edt'])->first();
            if ($etudiant != null) {
                $emailService->setTo($etudiant['email']);

                $message = " Bonjour " . $etudiant['prenom'] . " " . $etudiant['nom'] . ",
            Vous avez été convoqué à un rattrapage le  " . $rattrapage['date_DS'] . " de " . $rattrapage['duree'] . " heure(s) par " . $rattrapage['enseignant'] . "
            dans la salle " . $rattrapage['salle'] . ".
            Merci de vous présenter.";

                $emailService->setFrom($from);
                $emailService->setMessage($message);
                if ($emailService->send()) {
                    echo 'E-mail envoyé à ' . $etudiant['prenom'] . " " . $etudiant['nom'] . ' avec succès.';
                } else {
                    echo $emailService->printDebugger();
                }
            }

        }

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

        //Envoi d'un mail au directeur

        $emailDir = 'tassery.hugo@gmail.com';

        $directeurModel = new DirecteurModel();
        $directeur = $directeurModel->where('email', $emailDir)->first();
        $emailService = \Config\Services::email();

        $enseignantModel = new EnseignantModel();
        $enseignant = $enseignantModel->where('id_Ens', $rattrapage['enseignant'])->first();

        $message = " Bonjour Directeur,
            Le rattrapage du " . $rattrapage['date_DS'] . " de " . $rattrapage['duree'] . " heure(s) a été annulé par " . $enseignant['prenom'] . " " . $enseignant['nom'] . ".
            Merci de votre compréhension.";

        $from = 'tassery.hugo@gmail.com';
        $to = $directeur['email'];
        $subject = 'Annulation d\'un rattrapage le ' . $rattrapage['date_DS'] . ' par ' . $rattrapage['enseignant'];

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
