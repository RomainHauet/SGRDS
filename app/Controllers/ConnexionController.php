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
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $directeurModel->where('username', $username)->first();

        if($data)
        {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);

            if($authenticatePassword){
                $ses_data = [
                'id' => $data['id'],
                'username' => $data['username'],
                'email' => $data['email'],
                'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('/');
            }
            else
            {
                $session->setFlashdata('msg', 'Mot de passe incorrect.');
                return redirect()->to('/');
            }
        }
        else
        {
            $session->setFlashdata('msg', 'Utilisateur n\'existe pas.');
            return redirect()->to('/');
        }
    }
}
