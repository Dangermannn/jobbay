<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::post('loginUser', 'SecurityController');


Routing::get('register', 'SecurityController');
Routing::post('registerUser', 'SecurityController');

Routing::get('main_page', 'DefaultController');
Routing::get('home', 'DefaultController');

Routing::get('jobListening', 'AnnouncementsController');
Routing::get('announcementDetails', 'AnnouncementsController');

Routing::get('accountSettings', 'AccountController');
Routing::get('accountDetails', 'AccountController');

Routing::post('updateAccount', 'AccountController');

Routing::run($path);    