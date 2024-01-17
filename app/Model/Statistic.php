<?php

namespace App\Model;
use PDO;
class Statistic extends Model
{
    public function getTotalUsers()
    {
        $query = "SELECT COUNT(*) as total_users FROM user";
        $result = $this->pdo->query($query);
        $totalUsers = $result->fetchColumn();

        return $totalUsers;
    }

    public function getTotalWikis()
    {
        $query = "SELECT COUNT(*) as total_wikis FROM wikis";
        $result = $this->pdo->query($query);
        $totalWikis = $result->fetchColumn();

        return $totalWikis;
    }

    public function getTotalCategories()
    {
        $query = "SELECT COUNT(*) as total_categories FROM categories";
        $result = $this->pdo->query($query);
        $totalCategories = $result->fetchColumn();

        return $totalCategories;
    }

    public function getTotalTags()
    {
        $query = "SELECT COUNT(*) as total_tags from tags";
        $result= $this->pdo->query($query);
        $totalTags = $result->fetchColumn();
        
        return $totalTags;

    }

    public function getUsers()
    {
        $query = "SELECT u.id, u.username, u.email, u.image, r.role
                  FROM user u
                  JOIN role r ON u.role_id = r.id";
        $result = $this->pdo->query($query);
        $users = $result->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }
}