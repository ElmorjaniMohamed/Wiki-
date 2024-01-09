<?php

namespace App\Model;
use Database\Connection;

use PDO;
use PDOException;

class Tag extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = Connection::getInstance()->getPDO(); 
    }
    public function getAllTags()
    {
        return $this->selectRecords('tag');
    }

    public function getTagById($tagId)
    {
        $tags = $this->selectRecords('tag', '*', "id = $tagId");

        return (!empty($tags)) ? $tags[0] : null;
    }

    public function createTag($tagName)
    {
        $data = [
            'tag' => $tagName,
        ];

        return $this->insertRecord('tag', $data);
    }

    public function updateTag($tagId, $tagName)
    {
        $data = [
            'tag' => $tagName,
        ];

        return $this->updateRecord('tag', $data, $tagId);
    }

    public function deleteTag($tagId)
    {
        return $this->deleteRecord('tag', $tagId);
    }
}
