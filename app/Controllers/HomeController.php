<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Model\User;
use App\Model\Wiki;
use App\Model\Category;
use App\Model\Tag;

class HomeController extends Controller
{
    private $wikiModel;
    private $categoryModel;
    private $tagModel;
    private $userModel;

    public function __construct()
    {
        $this->wikiModel = new Wiki();
        $this->categoryModel = new Category();
        $this->tagModel = new Tag();
        $this->userModel = new User;
    }


    public function index()
    {
        $wikis = $this->wikiModel->getAllWikis();
        $users = $this->userModel->getAllUsers();
        $this->view('home', ["wikis" => $wikis, "users"=>$users]);
    }

    public function wiki()
    {
        $wikis = $this->wikiModel->getAllWikis();
        $categories = $this->categoryModel->getAllCategories();
        $this->view('wiki', ["wikis" => $wikis, "categories" => $categories]);
    }


    public function wikiDetail()
    {
        if (isset($_GET['id'])) {

            $wikiId = $_GET['id'];
            
            $wikis = $this->wikiModel->getWikiById($wikiId);
            $categoriesWithWikiCount = $this->categoryModel->getCategoriesWithWikiCount();
            $tags = $this->tagModel->getAllTags();

            $this->view('wikiDetail', ["wikis" => $wikis, "categoriesWithWikiCount" => $categoriesWithWikiCount, "tags" => $tags]);
            
            exit();
        } else {
            echo "Invalid request. Missing 'id' parameter.";
            exit();
        }
        
    }

}
