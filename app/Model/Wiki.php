<?php

namespace App\Model;

use PDOException;
use PDO;
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

    public function updateWiki(array $data, int $id)
    {

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

    public function getWikiTags($wikiId)
    {
        $sql = "SELECT * FROM wiki_tags WHERE wiki_id = :wiki_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':wiki_id', $wikiId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserWikis($userId) {
        $sql = "SELECT * FROM wikis WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateWikiTags($wikiId, $tags)
    {
        $this->deleteWikiTags($wikiId);

        foreach ($tags as $tagId) {
            $this->createWikiTag($wikiId, $tagId);
        }
    }

    private function deleteWikiTags($wikiId)
    {
        $sql = "DELETE FROM wiki_tags WHERE wiki_id = :wiki_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':wiki_id', $wikiId, PDO::PARAM_INT);
        $stmt->execute();
    }

    private function createWikiTag($wikiId, $tagId)
    {
        $sql = "INSERT INTO wiki_tags (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':wiki_id', $wikiId, PDO::PARAM_INT);
        $stmt->bindValue(':tag_id', $tagId, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    

    



    

}
