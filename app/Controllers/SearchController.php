<?php
namespace App\Controllers;

use App\Model\Wiki;


class SearchController extends Controller
{

    public function search()
    {

        if (isset($_GET["search"])) {
            $search = $_GET["search"];
            $wikiModel = new Wiki();
            $wikis = $wikiModel->getAllWikis("`title` like '%" . $search . "%'");
            echo json_encode($wikis);
        }

        if (isset($_GET["category_id"])) {
            $category_id = $_GET["category_id"];
            $wikiModel = new Wiki();
            $wikis = $wikiModel->getAllWikis("`category_id` = $category_id");
            echo json_encode($wikis);
        }

    }


}