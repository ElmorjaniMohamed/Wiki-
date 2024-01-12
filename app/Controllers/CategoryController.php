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
        $categories = $this->categoryModel->getAllCategories();
        $this->view('admin.Categories', $categories, 'dashboard');
    }

    public function create()
    {
        $this->view('category.create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryName = htmlspecialchars($_POST['category_name'], ENT_QUOTES, 'UTF-8');

            if (empty($categoryName)) {
                $this->setFlashMessage('Category name cannot be empty.', 'danger');
            } else {
                $this->categoryModel->createCategory($categoryName);
                $this->setFlashMessage('Category created successfully.', 'success');
            }

            header('Location:' . APP_URL . 'admin/Categories');
            exit();
        } else {
            $this->setFlashMessage('Invalid request type.', 'danger');
            $this->view('category.create');
        }
    }


    public function edit($categoryId)
    {
        $category = $this->categoryModel->getCategoryById($categoryId);
        $this->view('category.edit', ['category' => $category]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $categoryId = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
            $categoryName = htmlspecialchars($_POST['category_name'], ENT_QUOTES, 'UTF-8');
    
            if (empty($categoryName)) {
                $this->setFlashMessage('Category name cannot be empty.', 'danger');
                header('Location: ' . APP_URL . 'admin/Categories');
                exit();
            }
    
            $this->categoryModel->updateCategory($categoryId, $categoryName);
            header('Location: ' . APP_URL . 'admin/Categories');
            exit();
        } else {
            $this->setFlashMessage('Invalid request type.', 'danger');
           
            $categoryId = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
            $this->view('category.edit', ['category' => $this->categoryModel->getCategoryById($categoryId)]);
        }
    }
    

    public function destroy()
    {
        if (isset($_GET['id'])) {
            $categoryId = $_GET['id'];
            $this->categoryModel->deleteCategory($categoryId);
            header('Location: ' . APP_URL . 'admin/Categories');
            exit();
        } else {
            echo "Invalid request. Missing 'id' parameter.";
            exit();
        }
    }


    private function setFlashMessage($message, $type)
    {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_type'] = $type;
    }
}
