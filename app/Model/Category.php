<?php

namespace App\Model;

class Category extends Model
{
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
            'name' => $categoryName,
            'create_date' => date('Y-m-d H:i:s'), 
        ];

        return $this->insertRecord('category', $data);
    }

    public function updateCategory($categoryId, $categoryName)
    {
        $data = [
            'name' => $categoryName,
            'update_date' => date('Y-m-d H:i:s'),
        ];

        return $this->updateRecord('category', $data, $categoryId);
    }

    public function deleteCategory($categoryId)
    {
        return $this->deleteRecord('category', $categoryId);
    }
}
