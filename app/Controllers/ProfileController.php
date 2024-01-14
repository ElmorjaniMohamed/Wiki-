<?php

namespace App\Controllers;

use App\Model\Category;
use App\Model\Tag;
use App\Model\Wiki;

class ProfileController extends Controller
{
    public function index()
    {
        $categoryModel = new Category;
        $tagModel = new Tag;
        $wikiModel = new Wiki;

        $categories = $categoryModel->getAllCategories();
        $tags = $tagModel->getAllTags();
        $wikis = $wikiModel->getAllWikis(); 

        $this->view('profile', ["category" => $categories, "tag" => $tags, "wikis" => $wikis]);
    }
}
