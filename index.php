<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::post('login', 'SecurityController');


Routing::get('register', 'DefaultController');
Routing::get('main_page', 'DefaultController');
Routing::get('home', 'DefaultController');

Routing::get('jobListening', 'AnnouncementsController');
Routing::get('accountSettings', 'AccountController');

Routing::run($path);    