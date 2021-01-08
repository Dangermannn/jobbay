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
Routing::get('removeAnnouncement', 'AnnouncementsController');

Routing::get('accountSettings', 'AccountController');
Routing::get('accountDetails', 'AccountController');
Routing::get('accountInfo', 'AccountController');

Routing::post('updateAccount', 'AccountController');

Routing::get('getCv', 'AccountController');
Routing::get('addUserAsApplier', 'AnnouncementsController');
Routing::get('removeApplier', 'AnnouncementsController');

Routing::get('logout', 'SecurityController');

Routing::run($path);    