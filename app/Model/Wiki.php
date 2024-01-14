<?php

namespace App\Model;

use PDOException;

class Wiki extends Model
{
    
    public function getAllWikis()
    {
        return $this->selectRecords('wikis');
    }

    public function createWiki(array $data)
    {
        return $this->insertRecord('wikis', $data);
    }

    public function getWikiById($id)
    {
        $where = "id = $id";
        return $this->selectRecords('wikis', '*', $where)[0] ?? null;
    }

    public function updateWiki($id, $title, $content, $status)
    {
        $data = [
            'title' => $title,
            'content' => $content,
            'status' => $status,
        ];

        $this->updateRecord('wikis', $data, $id);
    }

    public function deleteWiki($id)
    {
        $this->deleteRecord('wikis', $id);
    }

    public function updateWikiStatus($wikiId, $status)
    {
        $query = "UPDATE wikis SET status = :status WHERE id = :id";
        $params = [':status' => $status, ':id' => $wikiId];

        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            $this->logQuery($query); 
        } catch (PDOException $e) {
            $this->logError($e); 
            throw new \Exception('Error updating wiki status.');
        }
    }

    



    

}
