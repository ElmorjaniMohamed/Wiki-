<?php

namespace App\Controllers;

use App\Model\User;

class AuthController extends Controller
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Check if the user already exists
            $userModel = new User();
            if ($userModel->userExists($username, $email)) {
                $this->setFlashMessage('User already exists.', 'danger');
                header('Location: ' . APP_URL . 'signup');
                exit();
            }

            $image = $_FILES['image'];
            $uploadDir = 'assets/uploads/';
            $uploadPath = $uploadDir . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $uploadPath);

            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setRoleId(2);
            $user->setImage($uploadPath);

            if ($user->registerAuthor()) {
                $_SESSION['user'] = (object) [
                    'id' => $user->getLastInsertId(),
                    'username' => $username,
                    'email' => $email,
                    'image' => $uploadPath,
                ];

                header('Location:' . APP_URL);
                exit();
            } else {
                echo "Erreur lors de l'enregistrement.";
            }
        } else {
            $this->view('auth.register');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usernameOrEmail = $_POST['username_or_email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->selectUserByUsernameOrEmail($usernameOrEmail);

            if ($user && password_verify($password, $user->password)) {

                session_regenerate_id(true);

                $_SESSION['user'] = [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'image' => $user->image,
                ];

                setcookie('user_id', $user->id, time() + (30 * 24 * 3600), '/');
                setcookie('username', $user->username, time() + (30 * 24 * 3600), '/');
                setcookie('email', $user->email, time() + (30 * 24 * 3600), '/');

                header('Location: ' . APP_URL);
                exit();
            } else {
                $_SESSION['flash_message'] = 'Password ou username invalid';
                $_SESSION['flash_type'] = 'danger';
                header('Location: ' . APP_URL . 'login');
                exit();
            }
        } else {
            $this->view('auth.login');
        }
    }



    public function logout()
    {
        session_destroy();
        header('Location: ' . APP_URL);
        exit();
    }



    private function setFlashMessage($message, $type)
    {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_type'] = $type;
    }
}
