<?php

namespace App\Model;
use Database\Connection;

use PDO;

class Category extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = Connection::getInstance()->getPDO(); 
    }
    public function getAllCategories()
    {
        return $this->selectRecords('category');
    }

    public function getCategoryById($categoryId)
    {
        return $this->selectRecords('category', '*', "id = $categoryId")[0] ?? null;
    }

    public function createCategory($categoryName)
    {
        $data = [
            'category' => $categoryName,
        ];

        return $this->insertRecord('category', $data);
    }

    public function updateCategory($categoryId, $categoryName)
    {
        $data = [
            'category' => $categoryName,
        ];

        return $this->updateRecord('category', $data, $categoryId);
    }

    public function deleteCategory($categoryId)
    {
        return $this->deleteRecord('category', $categoryId);
    }
}
