<?php

namespace App\Controllers;
use App\Models\DirecteurModel;

class ConnexionController extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('page_connexion', ['couleur' => 'black', 'message' => '']);
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
                return view('page_connexion', ['couleur' => 'red', 'message' => 'Mot de passe incorrect.']);
            }
        }
        else
        {
            return view('page_connexion', ['couleur' => 'red', 'message' => 'Utilisateur inexistant.']);
        }
    }

    public function deconnexion()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
