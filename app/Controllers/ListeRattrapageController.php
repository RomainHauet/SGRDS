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

        return view('liste_rattrapage', ['rattrapages' => $rattrapages]);
    }

    public function modifier($id): string
    {
        //récupérer le model
        $modele_rattrapage = new RattrapageModel();

        //Lecture (find (une seule ligne) ou findAll (toutes les lignes)
        $rattrapage = $modele_rattrapage->find($id);

        return view('ajout_rattrapage', ['rattrapage' => $rattrapage]);
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
}