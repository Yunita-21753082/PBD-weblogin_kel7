<?php

require_once __DIR__ . '/../vendor/autoload.php';

use ProgrammerZamanNow\Belajar\PHP\MVC\App\Router;
use ProgrammerZamanNow\Belajar\PHP\MVC\Config\Database;
use ProgrammerZamanNow\Belajar\PHP\MVC\Controller\HomeController;
use ProgrammerZamanNow\Belajar\PHP\MVC\Controller\UserController;
use ProgrammerZamanNow\Belajar\PHP\MVC\Middleware\MustNotLoginMiddleware;
use ProgrammerZamanNow\Belajar\PHP\MVC\Middleware\MustLoginMiddleware;

Database::getConnection('prod');

// Home Controller
Router::add('GET', '/', HomeController::class, 'index', []);

//User Controller
Router::add('GET', '/users/register', HomeController::class, 'register', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/register', HomeController::class, 'postRegister', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/login', HomeController::class, 'login', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/login', HomeController::class, 'postLogin', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/logout', HomeController::class, 'logout', [MustLoginMiddleware::class]);

Router::run();