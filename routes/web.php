<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('/how-it-works', 'WelcomeController@howit')->name('howit');
Route::get('/about-us', 'WelcomeController@about')->name('about');
Route::get('/guarantees', 'WelcomeController@gr')->name('gr');
Route::get('/terms-and-conditions', 'WelcomeController@tc')->name('tc');
Route::get('/make-order', 'WelcomeController@order')->name('order');
Route::post('/f/pricing', 'WelcomeController@fpricing')->name('fpricing');
Route::post('/init/order', 'WelcomeController@init_order')->name('init');
Route::post('/finish/order/{orderid}', 'WelcomeController@finishOrder')->name('finishOrder');
Route::get('/pay/order/{orderid}', 'WelcomeController@pay')->name('pay');
Route::get('/clients/order/secure/{link}', 'WelcomeController@order_view')->name('order_view');
Route::get('/admins/stream/{file}', 'AdminController@stream')->name('stream');

/** fake seo routes */
Route::get('/accounting-homework-help', 'SeoController@a')->name('a');
Route::get('/algebra-homework-help', 'SeoController@b')->name('b');
Route::get('/calculus-homework-help', 'SeoController@c')->name('c');
Route::get('/chemistry-homework-help', 'SeoController@d')->name('d');
Route::get('/college-homework-help', 'SeoController@e')->name('e');
Route::get('/computer-science-homework-help', 'SeoController@f')->name('f');
Route::get('/economics-homework-help', 'SeoController@g')->name('g');
Route::get('/excel-homework-help', 'SeoController@h')->name('h');
Route::get('/finance-homework-help', 'SeoController@i')->name('i');
Route::get('/geometry-homework-help', 'SeoController@j')->name('j');
Route::get('/java-homework-help', 'SeoController@k')->name('k');
Route::get('/physics-homework-help', 'SeoController@l')->name('l');
Route::get('/programming-homework-help', 'SeoController@m')->name('m');
Route::get('/science-homework-help', 'SeoController@n')->name('n');
Route::get('/statistics-homework-help', 'SeoController@o')->name('o');
Route::get('/spanish-homework-help', 'SeoController@p')->name('p');
Route::get('/history-homework-help', 'SeoController@q')->name('q');
Route::get('/french-homework-help', 'SeoController@r')->name('r');
Route::get('/english-homework-help', 'SeoController@s')->name('s');
Route::get('/c-homework-help', 'SeoController@t')->name('t');
Route::get('/biology-homework-help', 'SeoController@u')->name('u');
Route::get('/social-studies-homework-help', 'SeoController@v')->name('v');
Route::get('/python-homework-help', 'SeoController@w')->name('w');
Route::get('/psychology-homework-help', 'SeoController@x')->name('x');
Route::get('/precalculus-homework-help', 'SeoController@y')->name('y');
Route::get('/philosophy-homework-help', 'SeoController@z')->name('z');
Route::get('/matlab-homework-help', 'SeoController@aa')->name('aa');
Route::get('/math-homework-help', 'SeoController@bb')->name('bb');
Route::get('/high-school-homework-help', 'SeoController@cc')->name('cc');
Route::get('/engineering-homework-help', 'SeoController@dd')->name('dd');
Route::get('/coding-homework-help', 'SeoController@ee')->name('ee');
Route::get('/school-homework-help', 'SeoController@ff')->name('ff');
Route::get('/cpm-homework-help', 'SeoController@gg')->name('gg');
Route::get('/homework-answers', 'SeoController@hh')->name('hh');

/** auth */
Auth::routes();

/** admin */
Route::prefix('/myacadem/admin')->group( function() {
    Route::get('/', 'AdminController@index')->name('a_home');
    /** orders */
    Route::get('/orders', 'AdminController@a_orders')->name('a_orders');
    Route::get('/order/{id}', 'AdminController@order')->name('a_order');
    Route::post('/order/del/{id}', 'AdminController@delorder')->name('a_delorder');
    /** works */
    Route::get('/works', 'AdminController@a_works')->name('a_works');
    Route::get('/work/{id}', 'AdminController@work')->name('a_work');
    Route::post('/work', 'AdminController@add_work')->name('add_work');
    Route::get('drop/work/{id}', 'AdminController@work_drop')->name('work_drop');
    /** pricing */
    Route::get('/prices', 'AdminController@a_prices')->name('a_prices');
    Route::post('edit/price', 'AdminController@edit_price')->name('edit_price');
    Route::post('/price', 'AdminController@add_price')->name('add_price');
    /** ref styles */
    Route::get('/refs', 'AdminController@refs')->name('a_refs');
    Route::get('/ref/{id}', 'AdminController@ref')->name('a_ref');
    /** bushs */
    Route::get('/bushs', 'AdminController@a_bushs')->name('a_bushs');
    Route::get('/bush/{id}', 'AdminController@bush')->name('a_bush');
    Route::post('/bush/del/{id}', 'AdminController@delbush')->name('a_delbush');
    /** admins */
    Route::get('/admins', 'AdminController@a_admins')->name('a_admins');
    Route::get('/admin/del/{id}', 'AdminController@a_deladmin')->name('a_deladmin');
    Route::post('/admin/add', 'AdminController@admin_add')->name('admin_add');
});
Route::fallback(function () {
    return response(['status'=> 499, 'message' => 'oops! Congrats! you\'ve reached point of no return']);
});
