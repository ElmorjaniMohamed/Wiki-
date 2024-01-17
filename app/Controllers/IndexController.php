<?php

namespace App\Controllers;

use App\Model\User;

class IndexController extends Controller
{
    
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }
}