<?php
namespace App\Controllers;

use App\Models\EnseignantModel;

class Enseignant extends BaseController
{
    public function index()
    {
        $model = new EnseignantModel();

        $enseignants = $model->findAll();
        return view('enseignant/overview', ['enseignants' => $enseignants]);
    }

    public function view($id = null)
    {
        $model = new EnseignantModel();

        $data['enseignant'] = $model->getEnseignant($id);

        if (empty($data['enseignant'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pas d\'enseignant : ' . $id);
        }

        $data['title'] = $data['enseignant']['nom'];

        echo view('templates/header', $data);
        echo view('enseignant/view', $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $model = new EnseignantModel();

        if ($this->request->getPost()([
            'nom' => 'required|min_length[3]|max_length[255]',
            'prenom' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|min_length[3]|max_length[255]',
        ])) {
            $model->save([
                'nom' => $this->request->getPost('nom'),
                'prenom' => $this->request->getPost('prenom'),
                'email' => $this->request->getPost('email'),
            ]);

            echo view('templates/header', ['title' => 'Enseignant ajouté']);
            echo view('enseignant/success');
            echo view('templates/footer');
        } else {
            echo view('templates/header', ['title' => 'Ajouter un enseignant']);
            echo view('enseignant/create');
            echo view('templates/footer');
        }
    }

    public function edit($id = null)
    {
        $model = new EnseignantModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'nom' => 'required|min_length[3]|max_length[255]',
            'prenom' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|min_length[3]|max_length[255]',
        ])) {
            $model->save([
                'id_E' => $id,
                'nom' => $this->request->getPost('nom'),
                'prenom' => $this->request->getPost('prenom'),
                'email' => $this->request->getPost('email'),
            ]);

            echo view('templates/header', ['title' => 'Enseignant modifié']);
            echo view('enseignant/success');
            echo view('templates/footer');
        } else {
            $data['enseignant'] = $model->getEnseignant($id);

            if (empty($data['enseignant'])) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the enseignant item: ' . $id);
            }

            $data['title'] = 'Modifier un enseignant';

            echo view('templates/header', $data);
            echo view('enseignant/edit', $data);
            echo view('templates/footer');
        }
    }
}
