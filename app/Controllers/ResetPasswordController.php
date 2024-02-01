<?php
namespace App\Controllers;

use App\Models\DirecteurModel;

class ResetPasswordController extends BaseController
{
    public function index($token)
    {
        helper(['form']);
        $userModel = new DirecteurModel();
        $user = $userModel->where('reset_token', $token)
            ->where('reset_expires_at >', date('Y-m-d H:i:s'))
            ->first();
        if ($user)
        {
            return view('reset_password', ['token' => $token, 'couleur' => 'black', 'message' => '']);
        }
        else
        {
            return view('reset_password_success', ['token' => $token, 'couleur' => 'red', 'message' => 'Lien expiré.']);
        }
    }

    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = "" . $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

// Valider et traiter les données du formulaire

        $userModel = new DirecteurModel();
        $user = $userModel->where('reset_token', $token)
            ->where('reset_expires_at >', date('Y-m-d H:i:s'))
            ->first();
        //dd($user, $password, $confirmPassword);
        if ($user && $password === $confirmPassword)
        {
            // Mettre à jour le mot de passe et réinitialiser le jeton

            //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $user['motDePasse'] = $password;
			$user['reset_token'] = 'r';
			$user['reset_expires_at'] = '2021-01-01 00:00:00';
			$userModel->update($user['id_D'], $user);

            if ($user['motDePasse'] === $password)
            {
                return view('reset_password_success', ['token' => $token, 'couleur' => 'black', 'message' => 'Mot de passe réinitialisé avec succès !']);
            }
            else
            {
                return view('reset_password_success', ['token' => $token, 'couleur' => 'red', 'message' => 'Erreur avec la base de données, merci de réessayer ultérieurement.']);
            }
        }
        else
        {
            return view('reset_password', ['token' => $token, 'couleur' => 'red', 'message' => 'Les 2 mots de passe ne sont pas identiques.']);
        }
    }
}
