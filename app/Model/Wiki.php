<?php

namespace App\Model;

use PDOException;
use PDO;

class Wiki extends Model
{

    public function getAllWikis($where = null)
    {

        // if ($where == null)
        //     $wikis = $this->selectRecords('wikis');
        // else
        $wikis = $this->selectRecords('wikis', '*', $where);
        // $wikis = $this->selectRecords('wikis');
        $category_name = 'category_name';
        foreach ($wikis as &$wiki) {
            $categoryModel = new Category();
            $wiki->$category_name = $categoryModel->getCategoryById($wiki->category_id)->name;
        }
        return $wikis;
    }



    public function createWiki(array $data)
    {
        return $this->insertRecord('wikis', $data);
    }

    public function getWikiById($id)
    {
        $query = "SELECT wikis.*, categories.name AS category_name
              FROM wikis
              LEFT JOIN categories ON wikis.category_id = categories.id
              WHERE wikis.id = :id";

        $params = [':id' => $id];

        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->logError($e);
            throw new \Exception('Error fetching wiki details.');
        }
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
        $sql = "SELECT * FROM tag_wikis WHERE wiki_id = :wiki_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':wiki_id', $wikiId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserWikis($userId)
    {
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
        $sql = "DELETE FROM tag_wikis WHERE wiki_id = :wiki_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':wiki_id', $wikiId, PDO::PARAM_INT);
        $stmt->execute();
    }

    private function createWikiTag($wikiId, $tagId)
    {
        $sql = "INSERT INTO tag_wikis (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':wiki_id', $wikiId, PDO::PARAM_INT);
        $stmt->bindValue(':tag_id', $tagId, PDO::PARAM_INT);
        $stmt->execute();
    }










}
