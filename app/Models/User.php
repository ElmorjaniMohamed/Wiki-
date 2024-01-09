<?php

namespace App\Model;

use Database\Connection;
use PDO;
use PDOException;

class User extends Model
{
    private $username;
    private $email;
    private $password;
    private $role_id; 
    private $image;

    protected $db;

    public function __construct()
    {
        $this->db = Connection::getInstance()->getPDO(); 
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function registerAuthor()
    {
        $data = [
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->role_id,
            'image' => $this->image,
        ];

        return $this->insertRecord('user', $data);
    }

    public function selectUserByEmail($email)
    {
        try {
            $sql = "SELECT * FROM user WHERE email = ?";
            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $email);

            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            return $result;
        } catch (PDOException $e) {
            $this->logError($e);
            return null;
        }
    }

    public function login($email, $password)
    {
        try {
            $sql = "SELECT * FROM user WHERE email = ?";
            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $email);

            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            if ($user && password_verify($password, $user->password)) {

                return $user;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            $this->logError($e);
            return null;
        }
    }
}
