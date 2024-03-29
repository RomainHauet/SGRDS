<?php
namespace App\Controllers;

use App\Models\DirecteurModel;
use CodeIgniter\Controller;

class ForgotPasswordController extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('forgot_password', ['message' => '', 'couleur' => 'black']);
    }

    public function sendResetLink()
    {
        $email = $this->request->getPost('email');
        $userModel = new DirecteurModel();
        $user = $userModel->where('email', $email)->first();

// Dans la méthode sendResetLink du contrôleur ForgotPasswordController

        $email = $this->request->getPost('email');
        //echo 'Adresse e-mail soumise : ' . $email;
        if ($user)
        {

// Générer un jeton de réinitialisation de MDP et enregistrer-le dans BD

            $token = bin2hex(random_bytes(16));
            $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $userModel->set('reset_token', $token)
                ->set('reset_expires_at', $expiration)
                ->update($user['id_D']);

// Envoyer l'e-mail avec le lien de réinitialisation

            $resetLink = site_url("reset-password/$token");
            $message = "Cliquez sur le lien suivant pour réinitialiser MDP: $resetLink";

// Utilisez la classe Email de CodeIgniter pour envoyer l'e-mail

            $emailService = \Config\Services::email();

//paramètres du mail

            $from = 'tassery.hugo@gmail.com';
            $to = $this->request->getPost('to');
            $subject = $this->request->getPost('subject');

//envoi du mail

            $emailService->setTo($email);
            $emailService->setFrom($from);
            $emailService->setSubject('Réinitialisation de mot de passe');
            $emailService->setMessage($message);

            if ($emailService->send())
            {
                return view('forgot_password', ['message' => 'Mail envoyé avec succès.', 'couleur' => 'black']);
            }
            else
            {
                return view('forgot_password', ['message' => $emailService->printDebugger(), 'couleur' => 'red']);
            }
        }
        else
        {
            return view('forgot_password', ['message' => 'Adresse e-mail non valide.', 'couleur' => 'red']);
        }
    }

	
}
