<?php

namespace App\Model;

class Tag extends Model
{
    public function getAllTags()
    {
        return $this->selectRecords('tags');
    }
    
    public function getTagById($tagId)
    {
        return $this->selectRecords('tags', '*', "id = $tagId")[0] ?? null;
    }

    public function createTag($tagName)
    {
        $data = [
            'name' => $tagName,
            'create_date' => date('Y-m-d H:i:s'),
        ];

        return $this->insertRecord('tags', $data);
    }
    public function createTagwiki($data)
    {
        return $this->insertRecord('tag_wikis', $data);
    }

    public function updateTag($tagId, $tagName)
    {
        $data = [
            'name' => $tagName,
            'update_date' => date('Y-m-d H:i:s'),
        ];

        return $this->updateRecord('tags', $data, $tagId);
    }

    public function deleteTag($tagId)
    {
        return $this->deleteRecord('tags', $tagId);
    }

    
}
