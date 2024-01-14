<?php

namespace App\Model;
use App\Model\Wiki;
use PDO;
use PDOException;

class User extends Model
{
    private $username;
    private $email;
    private $password;
    private $role_id;
    private $image;



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

    public function getUserRole($userId)
    {
        try {
            $sql = "SELECT role_id FROM user WHERE id = ?";
            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $userId);

            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            return $result ? $result->role_id : null;
        } catch (PDOException $e) {
            $this->logError($e);
            return null;
        }
    }

    public function getLastInsertId()
    {
        try {
            $sql = "SELECT LAST_INSERT_ID() as last_id";
            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            return $result->last_id;
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

    public function userExists($username, $email)
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM user WHERE username = ? OR email = ?";
            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $email);

            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            return $result->count > 0;
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    public function selectUserByUsernameOrEmail($usernameOrEmail)
    {
        try {
            $sql = "SELECT * FROM user WHERE username = :username OR email = :email";
            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':username', $usernameOrEmail);
            $stmt->bindParam(':email', $usernameOrEmail);

            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            return $user;
        } catch (PDOException $e) {
            $this->logError($e);
            return null;
        }

    }

    

    private function setFlashMessage($message, $type)
    {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_type'] = $type;
    }

}
