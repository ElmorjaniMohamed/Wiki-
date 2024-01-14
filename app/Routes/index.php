<?php

use App\Controllers\HomeController;
use App\Controllers\WikiController;
use App\Controllers\AboutController;
use App\Controllers\AuthController;
use App\Controllers\CategoryController;
use App\Controllers\LoginController;
use App\Controllers\SignUpController;
use App\Controllers\ContactController;
use App\Controllers\ProfileController;
use App\Controllers\TagController;
use App\Router;

$router = new Router();

// Home page
$router->get('/WikiGenius/', HomeController::class, 'index');

// About page
$router->get('/WikiGenius/wiki', HomeController::class, 'wiki');

// About page
$router->get('/WikiGenius/about', AboutController::class, 'index');

// Login page
$router->get('/WikiGenius/login', LoginController::class, 'index');

// Sign Up page
$router->get('/WikiGenius/signup', SignUpController::class, 'index');

// Contact page
$router->get('/WikiGenius/contact', ContactController::class, 'index');

// profile page
$router->get('/WikiGenius/profile', ProfileController::class, 'index');

// Register and Login
$router->post('/WikiGenius/auth/register', AuthController::class, 'register');
$router->post('/WikiGenius/auth/login', AuthController::class, 'login');

// Logout
$router->get('/WikiGenius/logout', AuthController::class, 'logout');

//Categories
$router->get('/WikiGenius/admin/Categories', CategoryController::class, 'index');
$router->get('/WikiGenius/Category/create', CategoryController::class, 'create');
$router->post('/WikiGenius/Category/store', CategoryController::class, 'store');
$router->get('/WikiGenius/Category/edit', CategoryController::class, 'edit');
$router->post('/WikiGenius/Category/update', CategoryController::class, 'update');
$router->get('/WikiGenius/Category/destroy', CategoryController::class, 'destroy');

//Tags
$router->get('/WikiGenius/admin/Tags', TagController::class, 'index');
$router->get('/WikiGenius/Tag/create', TagController::class, 'create');
$router->post('/WikiGenius/Tag/store', TagController::class, 'store');
$router->get('/WikiGenius/Tag/edit', TagController::class, 'edit');
$router->post('/WikiGenius/Tag/update', TagController::class, 'update');
$router->get('/WikiGenius/Tag/destroy', TagController::class, 'destroy');

// Wikis
$router->get('/WikiGenius/admin/Wikis', WikiController::class, 'index');
$router->get('/WikiGenius/wiki/create', WikiController::class, 'createWikiForm');
$router->post('/WikiGenius/wiki/store', WikiController::class, 'store');
$router->get('/WikiGenius/wiki/edit', WikiController::class, 'edit');
$router->post('/WikiGenius/wiki/update', WikiController::class, 'update');
$router->get('/WikiGenius/wiki/accept', WikiController::class, 'accept');
$router->get('/WikiGenius/wiki/reject', WikiController::class, 'reject');

$router->dispatch();
