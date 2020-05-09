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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'FrontController@index')->name('customer.index');
Route::prefix('user_category')->group(function () {
    Route::get('/', 'FrontController@allcategory')->name('customer.allcategory');
    Route::get('/{id}', 'FrontController@subcategory')->name('customer.subcategory');
});
Route::get('/checkout', 'FrontController@checkout')->name('customer.checkout');
Route::get('/user_item/{id}', 'FrontController@item')->name('customer.item');

Route::get('/customer_login', 'FrontController@login')->name('customer.login');
Route::post('/customer_login', 'CustomerController@postLogin')->name('customer.postLogin');

Route::get('/customer_register', 'FrontController@register')->name('customer.register');
Route::post('/customer_register', 'CustomerController@store')->name('customer.store');

Route::post('/postOrder', 'CustomerController@postOrder')->name('customer.postOrder');



Route::get('/cart', 'CartController@index')->name('cart_index');

Route::post('/add-to-cart/{id}', 'CartController@getAddToCart')->name('add_to_card');
Route::post('/del-cart/{id}', 'CartController@getDelItemCart')->name('delete_card');

Route::get('clear', 'CartController@clear')->name('clear');

Route::get('/Add_to_cart', 'CartController@Add_to_cart')->name('Add_to_cart');
Route::get('/Remove_item', 'CartController@Remove_item')->name('Remove_item');


Route::get('/test_function_auth', 'CartController@test_function_auth')->name('test_function_auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'adminController@admin')->name('admin');


Route::middleware(['checkacl:admin'], ['auth'])->group(function () {


    // modulle gallery
    Route::prefix('statistical')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'StatisticalController@index')->name('statistical.index');
        // Route::get('/create', 'GalleryController@create')->name('gallery.add');
        // Route::post('/create', 'GalleryController@store')->name('gallery.store');
        // Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        // Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        // Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
    });

    // modulle gallery
    Route::prefix('gallery')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'GalleryController@index')->name('gallery.index');
        Route::get('/create', 'GalleryController@create')->name('gallery.add');
        Route::post('/create', 'GalleryController@store')->name('gallery.store');
        // Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        // Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        // Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
    });

    // modulle item
    Route::prefix('item')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'ItemController@index')->name('item.index');
        Route::get('/create', 'ItemController@create')->name('item.add');
        Route::post('/create', 'ItemController@store')->name('item.store');
        Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
    });


    // modulle trademark
    Route::prefix('trademark')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'TrademarkController@index')->name('trademark.index');
        Route::get('/create', 'TrademarkController@create')->name('trademark.add');
        Route::post('/create', 'TrademarkController@store')->name('trademark.store');
        Route::get('/edit/{id}', 'TrademarkController@edit')->name('trademark.edit');
        Route::post('/edit/{id}', 'TrademarkController@update')->name('trademark.edit');
        Route::get('/delete/{id}', 'TrademarkController@delete')->name('trademark.delete');
    });

    // modulle resource
    Route::prefix('resource')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'ResourceController@index')->name('resource.index');
        Route::get('/create', 'ResourceController@create')->name('resource.add');
        Route::post('/create', 'ResourceController@store')->name('resource.store');
        Route::get('/edit/{id}', 'ResourceController@edit')->name('resource.edit');
        Route::post('/edit/{id}', 'ResourceController@update')->name('resource.edit');
        Route::get('/delete/{id}', 'ResourceController@delete')->name('resource.delete');
    });

    // modulle category
    Route::prefix('category')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.add');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/edit/{id}', 'CategoryController@update')->name('category.edit');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });

    // modulle user
    Route::prefix('users')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/create', 'UserController@create')->name('user.add');
        Route::post('/create', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/edit/{id}', 'UserController@update')->name('user.edit');
        Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
    });
    // module role
    Route::prefix('roles')->group(function () {
        // Route::middleware(['checkacl:role-list'])->get('/', 'RoleController@index')->name('role.index');
        // Route::middleware(['checkacl:role-add'])->get('/create', 'RoleController@create')->name('role.add');
        // Route::middleware(['checkacl:role-add'])->post('/create', 'RoleController@store')->name('role.store');
        // Route::middleware(['checkacl:role-edit'])->get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        // Route::middleware(['checkacl:role-edit'])->post('/edit/{id}', 'RoleController@update')->name('role.edit');
        // Route::middleware(['checkacl:role-delete'])->get('/delete/{id}', 'RoleController@delete')->name('role.delete');
        
        Route::get('/', 'RoleController@index')->name('role.index');
        Route::get('/create', 'RoleController@create')->name('role.add');
        Route::post('/create', 'RoleController@store')->name('role.store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        Route::post('/edit/{id}', 'RoleController@update')->name('role.edit');
        Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete');
    });

});