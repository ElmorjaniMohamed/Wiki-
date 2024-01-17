<?php

namespace App\Controllers;

use App\Model\Statistic;
use App\Model\Wiki;
use App\Model\Tag;

class StatisticController extends Controller
{
    private $statModel;
    private $wikiModal;
    private $tagModel ;
    public function __construct()
    {
        $this->statModel = new Statistic();
        $this->wikiModal = new Wiki();
        $this->tagModel = new Tag();
    }

    public function index()
    {
        $totalUsers = $this->statModel->getTotalUsers();
        $totalWikis = $this->statModel->getTotalWikis();
        $totalCategories = $this->statModel->getTotalCategories();
        $totalTags = $this->statModel->getTotalTags();
        $users = $this->statModel->getUsers();
        $wikis = $this->wikiModal->getAllWikis();
        $tags = $this->tagModel->getAllTags();

        $this->view('admin.index', [
            'totalUsers' => $totalUsers,
            'totalWikis' => $totalWikis,
            'totalCategories' => $totalCategories,
            'tolatTags' => $totalTags,
            'users' => $users,
            'wikis' => $wikis,
            'tags' => $tags
        ], 'dashboard');
    }
}
