<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Model\User;
class AboutController extends Controller {
    


    private $userModel;
    public function __construct()
    {
        $this->userModel = new User;
    }

    
    public function index() {

        $users = $this->userModel->getAllUsers();
        $this->view('about', ["users"=>$users]);
    }
}
