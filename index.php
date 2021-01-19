<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('accessDenied', 'DefaultController');

Routing::get('login', 'DefaultController');
Routing::post('loginUser', 'SecurityController');


Routing::get('register', 'SecurityController');
Routing::post('registerUser', 'SecurityController');

Routing::get('main_page', 'DefaultController');
Routing::get('home', 'DefaultController');

Routing::get('jobListening', 'AnnouncementsController');
Routing::get('announcementDetails', 'AnnouncementsController');
Routing::get('announcementForm', 'AnnouncementsController');
Routing::get('removeAnnouncement', 'AnnouncementsController');
Routing::post('addAnnouncement', 'AnnouncementsController');

Routing::post('accountSettings', 'AccountController');
Routing::get('accountDetails', 'AccountController');
Routing::get('accountInfo', 'AccountController');

Routing::post('updateAccount', 'AccountController');

Routing::get('getCv', 'AccountController');
Routing::post('addUserAsApplier', 'AnnouncementsController');
Routing::post('removeApplier', 'AnnouncementsController');
Routing::get('logout', 'SecurityController');


Routing::get('allUsers', 'AccountController');
Routing::get('removeUser', 'AccountController');
Routing::get('activeUsers', 'AccountController');

Routing::run($path);    