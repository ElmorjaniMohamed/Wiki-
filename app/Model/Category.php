<?php

namespace App\Model;
use PDO;
use PDOException;

class Category extends Model
{
    public function getAllCategories()
    {
        return $this->selectRecords('categories');
    }

    public function getCategoriesWithWikiCount()
    {
        try {
            $query = "
                SELECT c.id, c.name, COUNT(w.id) as wiki_count
                FROM categories c
                LEFT JOIN wikis w ON c.id = w.category_id
                GROUP BY c.id, c.name
            ";

            $statement = $this->pdo->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->logError($e);
            throw new \Exception('Error fetching Categories With Wiki Count.');
        }
    }

    public function getCategoryById($categoryId)
    {
        return $this->selectRecords('categories', '*', "id = $categoryId")[0] ?? null;
    }

    public function createCategory($categoryName)
    {
        $data = [
            'name' => $categoryName,
            'create_date' => date('Y-m-d H:i:s'), 
        ];

        return $this->insertRecord('categories', $data);
    }

    public function updateCategory($categoryId, $categoryName)
    {
        $data = [
            'name' => $categoryName,
            'update_date' => date('Y-m-d H:i:s'),
        ];

        return $this->updateRecord('categories', $data, $categoryId);
    }

    public function deleteCategory($categoryId)
    {
        return $this->deleteRecord('categories', $categoryId);
    }
}
