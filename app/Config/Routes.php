<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/product', 'Product::index');
$routes->get('/product/categories/(:any)', 'Product::categories/$1');
$routes->get('/product/brands/(:any)', 'Product::brands/$1');
$routes->get('/item/(:any)', 'Item::index/$1');
$routes->post('/checkout/(:any)', 'CheckOut::index/$1', ['as' => 'checkout.process']);
$routes->get('/checkout/getCity', 'CheckOut::getCity');
$routes->get('/checkout/getCost', 'CheckOut::getCost');
$routes->get('/auth/google', 'Auth::redirectToGoogle');
$routes->get('/auth/google/callback', 'Auth::handleGoogleCallback');
$routes->get('/auth/google/callback/register', 'Auth::handleGoogleCallback');
$routes->get('/account', 'Account::index');
$routes->get('/set-password', 'Auth::setPasswordForm');
$routes->post('/set-password', 'Auth::setPassword');
$routes->post('/payment', 'Payment::index');
$routes->post('/payment/success', 'Payment::paymentSuccess');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/products', 'Admin::products');
$routes->get('/admin/products/add', 'Admin::productsAddView');
$routes->post('/admin/products/addProcess', 'Admin::productsAddProcess');
$routes->get('/admin/products/view/(:any)', 'Admin::productsView/$1');
$routes->post('/admin/products/edit/(:any)', 'Admin::productsEditProcess/$1');
$routes->get('/admin/products/delete/(:num)', 'Admin::productsDelete/$1');
$routes->get('/admin/categories', 'Admin::categories');
$routes->post('admin/categories/add', 'Admin::categoriesAdd');
$routes->get('/admin/categories/delete/(:num)', 'Admin::categoriesDelete/$1');
$routes->post('/admin/categories/edit/(:num)', 'Admin::categoriesEdit/$1');
$routes->get('/admin/brands', 'Admin::brands');
$routes->post('/admin/brands/add', 'Admin::brandsAdd');
$routes->get('/admin/brands/delete/(:num)', 'Admin::brandsDelete/$1');
$routes->post('/admin/brands/edit/(:num)', 'Admin::brandsEdit/$1');
