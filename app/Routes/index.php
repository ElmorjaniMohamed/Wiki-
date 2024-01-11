<?php

use App\Controllers\HomeController;
use App\Controllers\WikiController;
use App\Controllers\AboutController;
use App\Controllers\AuthController;
use App\Controllers\LoginController;
use App\Controllers\SignUpController;
use App\Controllers\ContactController; 
use App\Router;

$router = new Router();

// Home page
$router->get('/WikiGenius/', HomeController::class, 'index');

// About page
$router->get('/WikiGenius/wiki', WikiController::class, 'index');

// About page
$router->get('/WikiGenius/about', AboutController::class, 'index');

// Login page
$router->get('/WikiGenius/login', LoginController::class, 'index');

// Sign Up page
$router->get('/WikiGenius/signup', SignUpController::class, 'index');

// Contact page
$router->get('/WikiGenius/contact', ContactController::class, 'index');

$router->post('/WikiGenius/auth/register', AuthController::class, 'register');
$router->post('/WikiGenius/auth/login', AuthController::class, 'login');

$router->dispatch();
