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
        $tags = $this->tagModel->getAllTags();
        $this->view('admin.Tags', $tags, 'dashboard');
    }

    public function create()
    {
        $this->view('tag.create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tagName = htmlspecialchars($_POST['tag_name'], ENT_QUOTES, 'UTF-8');

            if (empty($tagName)) {
                $this->setFlashMessage('Tag name cannot be empty.', 'danger');
                header('Location:'.APP_URL.'admin/Tags');
                exit();
            }

            $this->tagModel->createTag($tagName);
            $this->setFlashMessage('Tag created successfully.', 'success');
            header('Location: '.APP_URL.'admin/Tags');
            exit();
        } else {
            $this->setFlashMessage('Invalid request type.', 'danger');
            $this->view('tag.create');
        }
    }

    public function edit($tagId)
    {
        $tag = $this->tagModel->getTagById($tagId);
        $this->view('tag.edit', ['tag' => $tag]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tagId = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
            $tagName = htmlspecialchars($_POST['tag_name'], ENT_QUOTES, 'UTF-8');

            if (empty($tagName)) {
                $this->setFlashMessage('Tag name cannot be empty.', 'danger');
                header('Location: '.APP_URL.'admin/Tags');
                exit();
            }

            $this->tagModel->updateTag($tagId, $tagName);
            $this->setFlashMessage('Tag updated successfully.', 'success');
            header('Location: '.APP_URL.'admin/Tags');
            exit();
        } else {
            $this->setFlashMessage('Invalid request type.', 'danger');
            $tagId = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
            $this->view('tag.edit', ['tag' => $this->tagModel->getTagById($tagId)]);
        }
    }

    public function destroy()
    {
        if (isset($_GET['id'])) {
            $tagId = $_GET['id'];
            $this->tagModel->deleteTag($tagId);
            header('Location: ' . APP_URL . 'admin/Tags');
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
