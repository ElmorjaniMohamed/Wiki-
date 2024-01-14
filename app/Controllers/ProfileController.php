<?php

namespace App\Controllers;

use App\Model\Category;
use App\Model\Tag;
use App\Model\Wiki;

class ProfileController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . APP_URL . 'login');
            exit();
        }

        $categoryModel = new Category;
        $tagModel = new Tag;
        $wikiModel = new Wiki;

        $categories = $categoryModel->getAllCategories();
        $tags = $tagModel->getAllTags();
        $userWikis = $wikiModel->getUserWikis($_SESSION['user']->id);

        $this->view('profile', ["category" => $categories, "tag" => $tags, "wikis" => $userWikis]);
    }
}
