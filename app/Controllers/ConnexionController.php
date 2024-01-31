<?php

namespace App\Controllers;
use App\Models\DirecteurModel;

class ConnexionController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('page_connexion');
    }
    public function loginAuth()
    {
        $session = session();
        $directeurModel = new DirecteurModel();
        $username = $this->request->getVar('identifiant');
        $password = $this->request->getVar('motDePasse');
        $data = $directeurModel->where('identifiant', $username)->first();

        if($data)
        {
            $pass = $data['motDePasse'];
            $authenticatePassword = $password == $pass ? true : false;
            if($authenticatePassword){

                $session->set('isLoggedIn', true);
                return redirect()->to('/');
            }
            else
            {
                $session->setFlashdata('mdpError', 'Mot de passe incorrect.');
                return redirect()->to('/connexion');
            }
        }
        else
        {
            $session->setFlashdata('utilisateurError', 'Utilisateur n\'existe pas.');
            return redirect()->to('/connexion');
        }
    }

    public function deconnexion()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
