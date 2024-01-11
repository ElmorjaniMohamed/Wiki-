<?php
namespace App\Controllers;

use App\Model\Category;

class CategoryController extends Controller
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function index()
    {
        // Récupérer toutes les catégories depuis le modèle
        $categories = $this->categoryModel->getAllCategories();

        // Afficher la vue avec les catégories
        $this->view('admin.Categories',['categories' => $categories],'dashboard');

    }
    public function create()
    {
        // Afficher le formulaire de création de catégorie
        $this->view('category.create');
    }

    public function store()
    {
        // Récupérer les données du formulaire
        $categoryName = $_POST['category_name'];

        // Enregistrer la nouvelle catégorie
        $this->categoryModel->createCategory($categoryName);

        // Rediriger vers la liste des catégories
        header('Location: /WikiGenius/category');
        exit();
    }

    public function edit($categoryId)
    {
        // Récupérer les informations de la catégorie à éditer
        $category = $this->categoryModel->getCategoryById($categoryId);

        // Afficher le formulaire d'édition de catégorie
        $this->view('category.edit', ['category' => $category]);
    }

    public function update($categoryId)
    {
        // Récupérer les données du formulaire
        $categoryName = $_POST['category_name'];

        // Mettre à jour la catégorie
        $this->categoryModel->updateCategory($categoryId, $categoryName);

        // Rediriger vers la liste des catégories
        header('Location: /WikiGenius/category');
        exit();
    }

    public function destroy($categoryId)
    {
        // Supprimer la catégorie
        $this->categoryModel->deleteCategory($categoryId);

        // Rediriger vers la liste des catégories
        header('Location: /WikiGenius/category');
        exit();
    }
}
