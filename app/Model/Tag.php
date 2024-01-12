<?php

namespace App\Model;

class Tag extends Model
{
    public function getAllTags()
    {
        return $this->selectRecords('tag');
    }

    public function getTagById($tagId)
    {
        return $this->selectRecords('tag', '*', "id = $tagId")[0] ?? null;
    }

    public function createTag($tagName)
    {
        $data = [
            'name' => $tagName,
            'create_date' => date('Y-m-d H:i:s'),
        ];

        return $this->insertRecord('tag', $data);
    }

    public function updateTag($tagId, $tagName)
    {
        $data = [
            'name' => $tagName,
            'update_date' => date('Y-m-d H:i:s'),
        ];

        return $this->updateRecord('tag', $data, $tagId);
    }

    public function deleteTag($tagId)
    {
        return $this->deleteRecord('tag', $tagId);
    }
}
