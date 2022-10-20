<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


$routes->match(['get','post'],'/logout', 'Auth::logout');

$routes->match(['get','post'],'/forget_Password', 'Auth::forget_Password');
$routes->match(['get','post'],'/reset_password/(:any)', 'Auth::reset_Password/$1');

$routes->get('/register/activate/(:any)', 'Auth::activate/$1');

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->match(['get','post'],'/dash', 'Dashboard::index');
    $routes->match(['get','post'],'/profile', 'Dashboard::profile');
    $routes->match(['get','post'],'/update_admin_image/(:any)', 'Dashboard::update_admin_image/$1');
    $routes->get('/loggedInUser', 'Auth::UserDetails');
    $routes->match(['get','post'],'/delete/(:any)', 'Auth::deleteUser/$1');
    $routes->get('/block/(:any)', 'Auth::BlockUser/$1');
    $routes->get('create_blog', 'Dashboard::create_blog');
    $routes->match(['get','post'],'save_blog', 'Dashboard::save_blog');
    $routes->get('fetch_blog', 'Dashboard::fetch_blog_data');
    $routes->get('blog_edit/(:any)', 'Dashboard::blog_edit/$1');
    $routes->post('update_blog/(:any)', 'Dashboard::blog_update/$1');
    $routes->match(['get','post'],'/delete_blog/(:any)', 'Dashboard::blog_delete/$1');
    $routes->get('/show_blog/(:any)', 'Dashboard::show_blog/$1');
    $routes->get('create_category', 'Dashboard::create_category');
    $routes->get('choose_category', 'Dashboard::choose_category');
    $routes->post('save_category', 'Dashboard::category_save');
    $routes->get('view_category', 'Dashboard::dash_category_view');
    $routes->get('/edit_category/(:any)', 'Dashboard::dash_category_edit/$1');
    $routes->post('/category_update/(:any)', 'Dashboard::dash_category_update/$1');
    $routes->match(['get','post'],'/category_delete/(:any)', 'Dashboard::delete_category/$1');
    $routes->get('/edit_data/(:any)', 'Dashboard::edit/$1');
    $routes->put('/update_data/(:any)', 'Dashboard::update/$1');
    $routes->get('/block_id/(:any)', 'Dashboard::Block/$1');
    $routes->get('/unblock_id/(:any)', 'Dashboard::Unblock/$1');
    $routes->match(['get','post'],'/register', 'Auth::register');
    $routes->match(['get','post'],'/save', 'Auth::save');
    $routes->get('/showComment/(:any)','BlogController::showComment/$1');
    $routes->get('/showComment_outer/(:any)','BlogController::showComment_outer/$1');
    $routes->get('/blockcomment/(:any)','Dashboard::Blockcomment/$1');
    $routes->get('/unblockcomment/(:any)','Dashboard::Unblockcomment/$1');
    $routes->match(['get','post'],'/reply/(:any)', 'Dashboard::reply_comment/$1');
    $routes->match(['get','post'],'/viewreply/(:any)', 'Dashboard::view_reply_comment/$1');
    $routes->match(['get','post'],'/viewreply_outer/(:any)', 'BlogController::view_reply_outer/$1');

});



$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->match(['get','post'],'/userdash', 'User::user_index');
    $routes->match(['get','post'],'/useredit/(:any)', 'User::user_edit/$1');
    $routes->put('/userupdate/(:any)', 'User::user_update/$1');
    $routes->match(['get','post'],'/userprofile', 'User::user_profile');

});

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes){
    $routes->match(['get','post'],'/login', 'Auth::login');
    $routes->match(['get','post'],'/check', 'Auth::check');
});

    $routes->match(['get','post'],'/register2', 'BlogController::register2');
    $routes->match(['get','post'],'/save2', 'BlogController::save2');
    $routes->match(['get','post'],'/register2/activate2/(:any)', 'BlogController::activate2/$1');

    $routes->get('home', 'Dashboard::home');   

    $routes->get('Blogging','BlogController::blog_welcm');
    $routes->get('layout_category','BlogController::layout_choose_category');

    $routes->get('categorywise_blog/(:any)','BlogController::categorywise_blog/$1');
    $routes->get('categorywise_full_blog/(:any)','BlogController::categorywise_full_blog/$1');


$routes->group('',['filter'=>'likeandDislikeAuth'],function($routes)
{
    $routes->get('/like/(:num)','BlogController::like/$1');
    $routes->get('/dislike/(:num)','BlogController::dislike/$1');
    $routes->match(['get','post'],'/comment/(:num)','BlogController::comment/$1');
    
});
    
    $routes->match(['get','post'],'/deleteComment/(:any)', 'BlogController::deleteComment/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
