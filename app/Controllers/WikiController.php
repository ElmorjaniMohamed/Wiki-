<?php

namespace App\Controllers;

use App\Model\Wiki;
use App\Model\Tag;
use App\Model\Category;
use App\Model\User;

class WikiController extends Controller
{
    private $wikiModel;
    private $tagModel;

    private $categoryModel;
    private $userModel;

    public function __construct()
    {
        $this->wikiModel = new Wiki();
        $this->tagModel = new Tag();
        $this->categoryModel = new Category();
        $this->userModel = new User();
    }

    public function index()
    {
        $wikis = $this->wikiModel->getAllWikis();

        $this->view('admin.Wikis', $wikis, 'dashboard');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tags = $_POST["tags"];
            $_POST['user_id'] = $_SESSION['user']->id;
            $_POST['image'] = $_FILES['image']['name'];
            unset($_POST["tags"]);

            if ($this->wikiModel->createWiki($_POST)) {
                $id_thelast_wiki = $this->wikiModel->lastId();


                $uploadDirectory = 'assets/uploads/imageWikis/';
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory . $_POST['image']);

                foreach ($tags as $t) {
                    if ($this->tagModel->createTagwiki(["wiki_id" => $id_thelast_wiki, "tag_id" => $t])) {
                    } else {
                        $this->setFlashMessage('Error creating tag for wiki.', 'danger');
                    }
                }

                $this->setFlashMessage('Wiki created successfully!', 'success');
                header('Location: ' . APP_URL . 'profile');
                exit();
            } else {
                $this->setFlashMessage('Error creating wiki entry.', 'danger');
            }
        } else {
            $this->setFlashMessage('Invalid request type.', 'danger');
            $this->view('wiki.create');
        }
    }


    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $wikiId = $_POST['id'];

            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'category_id' => $_POST['category_id']
            ];

            $this->wikiModel->updateWiki($data, $wikiId);

            $tags = isset($_POST['tags']) ? $_POST['tags'] : [];
            $this->wikiModel->updateWikiTags($wikiId, $tags);

            header('Location: ' . APP_URL . 'profile');
            exit();
        } else {
            $wikiId = $_GET['id'];
            $wiki = $this->wikiModel->getWikiById($wikiId);
            $categories = $this->categoryModel->getAllCategories();
            $tags = $this->tagModel->getAllTags();
            $wikiTags = $this->wikiModel->getWikiTags($wikiId);

            $this->view('wikis.update', ["wiki" => $wiki, "categories" => $categories, "tags" => $tags, "wikiTags" => $wikiTags]);
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $wikiId = $_GET['id'];
            $wiki = $this->wikiModel->getWikiById($wikiId);
            $categories = $this->categoryModel->getAllCategories();
            $tags = $this->tagModel->getAllTags();
            $wikiTags = $this->wikiModel->getWikiTags($wikiId);

            $this->view('wikis.edit', ["wiki" => $wiki, "categories" => $categories, "tags" => $tags, "wikiTags" => $wikiTags]);
        } else {
            $this->setFlashMessage('Invalid request. Wiki ID is missing.', 'danger');
            header('Location: ' . APP_URL . 'profile'); 
            exit();
        }
    }




    public function destroy()
    {
        if (isset($_GET['id'])) {
            $wikiId = $_GET['id'];
            $this->wikiModel->deleteWiki($wikiId);
            $this->setFlashMessage('Wiki deleted successfully.', 'success');
        } else {
            $this->setFlashMessage('Invalid request.', 'danger');
        }

        header('Location: ' . APP_URL . 'profile');
        exit();
    }

    private function validateUserIsAdmin()
    {
        if (!isset($_SESSION['user']) || !$this->isAdmin($_SESSION['user']->id)) {

            $this->setFlashMessage('You do not have permission to perform this action.', 'danger');
            header('Location: ' . APP_URL);
            exit();
        }
    }

    private function isAdmin($userId)
    {
        $userModel = new User();
        $role = $userModel->getUserRole($userId);

        if ($role == 1) {
            return $role;
        }

    }


    public function accept()
    {

        $this->validateUserIsAdmin();
        $wikiId = isset($_GET['id']) ? $_GET['id'] : null;

        if ($wikiId === null) {
            $this->setFlashMessage('Invalid request. Wiki ID is missing.', 'danger');
            header('Location: ' . APP_URL . 'admin/Wikis');
            exit();
        } else {

            try {
                $this->wikiModel->updateWikiStatus($wikiId, 'success');
                $this->setFlashMessage('Wiki accepted successfully!', 'success');
            } catch (\Exception $e) {
                $this->setFlashMessage('Error accepting wiki.', 'danger');
            }
            header('Location: ' . APP_URL . 'admin/Wikis');
            exit();
        }

    }


    public function reject()
    {
        $this->validateUserIsAdmin();
        $wikiId = isset($_GET['id']) ? $_GET['id'] : null;

        if ($wikiId === null) {
            $this->setFlashMessage('Invalid request. Wiki ID is missing.', 'danger');
            header('Location: ' . APP_URL . 'admin/Wikis');
            exit();
        } else {

            try {
                $this->wikiModel->updateWikiStatus($wikiId, 'rejected');
                $this->setFlashMessage('Wiki rejected successfully!', 'success');
            } catch (\Exception) {
                $this->setFlashMessage('Error rejecting wiki.', 'danger');
            }
            header('Location: ' . APP_URL . 'admin/Wikis');
            exit();

        }

    }

    private function setFlashMessage($message, $type)
    {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_type'] = $type;
    }
}
