<?php

namespace App\Controllers;

use App\Model\Tag;

class TagController extends Controller
{
    private $tagModel;

    public function __construct()
    {
        $this->tagModel = new Tag();
    }

    public function index()
    {
        // Récupérer tous les tags depuis le modèle
        $tags = $this->tagModel->getAllTags();

        // Afficher la vue avec les tags
        $this->view('tag.index', ['tags' => $tags]);
    }

    public function create()
    {
        // Afficher le formulaire de création de tag
        $this->view('tag.create');
    }

    public function store()
    {
        // Récupérer les données du formulaire
        $tagName = $_POST['tag_name'];

        // Enregistrer le nouveau tag
        $this->tagModel->createTag($tagName);

        // Rediriger vers la liste des tags
        header('Location: /WikiGenius/tag');
        exit();
    }

    public function edit($tagId)
    {
        // Récupérer les informations du tag à éditer
        $tag = $this->tagModel->getTagById($tagId);

        // Afficher le formulaire d'édition de tag
        $this->view('tag.edit', ['tag' => $tag]);
    }

    public function update($tagId)
    {
        // Récupérer les données du formulaire
        $tagName = $_POST['tag_name'];

        // Mettre à jour le tag
        $this->tagModel->updateTag($tagId, $tagName);

        // Rediriger vers la liste des tags
        header('Location: /WikiGenius/tag');
        exit();
    }

    public function destroy($tagId)
    {
        // Supprimer le tag
        $this->tagModel->deleteTag($tagId);

        // Rediriger vers la liste des tags
        header('Location: /WikiGenius/tag');
        exit();
    }
}
