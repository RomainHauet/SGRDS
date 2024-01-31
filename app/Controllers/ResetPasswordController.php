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
        if ($user) {
            return view('reset_password', ['token' => $token]);
        } else {
            return 'Lien de réinitialisation non valide.';
        }
    }

    public function indexB()
    {
        helper(['form']);
        return view('reset_password_success');
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
        if ($user && $password === $confirmPassword) {

// Mettre à jour le mot de passe et réinitialiser le jeton

            //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $userModel->set('password', $password)
                ->set('reset_token', 'r')
                ->set('reset_expires_at', '2021-01-01 00:00:00')
                ->update($user['id_D']);
            return 'Mot de passe réinitialisé avec succès.';
        } else {
            return 'Erreur lors de la réinitialisation du mot de passe.';
        }
    }
}
