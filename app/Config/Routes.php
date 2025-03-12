<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */






//  no login required
$routes->get('/', 'Absen::index');
$routes->post('absen/absen', 'Absen::absensi');
$routes->get('dashboard', 'Absen::dashboard');
$routes->get('absensi', 'Absen::kehadiran');

$routes->get('/admin', 'Absen::admin', ['filter' => 'auth']); // Hanya bisa diakses setelah login
$routes->get('/login', 'Absen::login');
$routes->post('/doLogin', 'Absen::doLogin');
$routes->get('/logout', 'Absen::logout');

$routes->get('/hapus_absensi/(:num)', 'Absen::hapusAbsensi/$1');
$routes->get('/update_status/(:num)/(:alpha)', 'Absen::updateStatus/$1/$2');

// $routes->get('dashboard', 'Dashboard::index');

$routes->get('siswa', 'Siswa::index');
$routes->get('siswa/create', 'Siswa::create');
$routes->post('siswa/save', 'Siswa::save');
$routes->get('siswa/edit/(:any)', 'Siswa::edit/$1');
$routes->post('siswa/update', 'Siswa::update');
$routes->post('siswa/update/(:any)', 'Siswa::update/$1');
$routes->get('siswa/delete/(:any)', 'Siswa::delete/$1');
// new

$routes->get('/login', 'AuthController::login');
$routes->post('/doLogin', 'AuthController::doLogin');
$routes->get('/logout', 'AuthController::logout');

// Route untuk admin
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
});

// Route untuk user
$routes->group('user', ['filter' => 'auth:user'], function ($routes) {
    $routes->get('dashboard', 'UserController::dashboard');
});