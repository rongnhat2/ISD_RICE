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
Route::post('item_finded', 'FrontController@item_finded')->name('customer.finded');

Route::get('about_us', 'FrontController@about_us')->name('customer.about_us');
Route::get('contact_us', 'FrontController@contact_us')->name('customer.contact_us');

Route::get('/customer_login', 'FrontController@login')->name('customer.login');
Route::post('/customer_login', 'CustomerController@postLogin')->name('customer.postLogin');
Route::get('/customer_register', 'FrontController@register')->name('customer.register');
Route::post('/customer_register', 'CustomerController@store')->name('customer.store');
Route::get('/customer_update', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer_update', 'CustomerController@update')->name('customer.update');
Route::get('/changePassword', 'CustomerController@changePassword')->name('customer.changePassword');
Route::post('/changePassword', 'CustomerController@updatePassword')->name('customer.updatePassword');

Route::post('/postOrder', 'CustomerController@postOrder')->name('customer.postOrder');
Route::get('submitVoting', 'CustomerController@submitVoting')->name('item.submitVoting');
Route::get('submitComment', 'CustomerController@submitComment')->name('item.submitComment');

Route::get('/cart', 'CartController@index')->name('cart_index');
Route::get('clear', 'CartController@clear')->name('clear');
Route::get('/Add_to_cart', 'CartController@Add_to_cart')->name('Add_to_cart');
Route::get('/Remove_item', 'CartController@Remove_item')->name('Remove_item');
Route::get('/UpdateAmount', 'CartController@UpdateAmount')->name('UpdateAmount');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'adminController@admin')->name('admin');
Route::get('/login', 'CustomerController@admingetLogin')->name('getlogin');
Route::post('/loginAdmin', 'CustomerController@adminpostLogin')->name('login');

Route::middleware(['checkacl:admin'], ['auth'])->group(function () {

    // modulle discount
    Route::prefix('pages')->group(function () {
        Route::get('/', 'PageController@index')->name('pages.index');
        Route::post('update', 'PageController@update')->name('pages.update');
    });

    // modulle discount
    Route::prefix('allship')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'ShipController@allshipindex')->name('allship.index');
        Route::get('/edit/{id}', 'ShipController@allshipedit')->name('shipall.edit');
    });

    // modulle discount
    Route::prefix('ship')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'ShipController@index')->name('ship.index');
        Route::get('/edit/{id}', 'ShipController@edit')->name('ship.edit');
        Route::get('/success/{id}', 'ShipController@success')->name('ship.success');
        Route::get('/remove/{id}', 'ShipController@remove')->name('ship.remove');
        Route::get('getShip', 'ShipController@getShip')->name('ship.getShip');
    });

    // modulle discount
    Route::prefix('discount')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'DiscountController@index')->name('discount.index');
        Route::get('/create', 'DiscountController@create')->name('discount.add');
        Route::post('/create', 'DiscountController@store')->name('discount.store');
        Route::get('/updateDiscount', 'DiscountController@update')->name('discount.update');
    });

    // modulle warehouse
    Route::prefix('warehouse')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'WarehouseController@index')->name('warehouse.index');
        Route::get('/create', 'WarehouseController@create')->name('warehouse.add');
        Route::post('/create', 'WarehouseController@store')->name('warehouse.store');
    });

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

        Route::middleware(['checkacl:gallery-list'])->get('/', 'GalleryController@index')->name('gallery.index');
        Route::middleware(['checkacl:gallery-add'])->get('/create', 'GalleryController@create')->name('gallery.add');
        Route::middleware(['checkacl:gallery-add'])->post('/create', 'GalleryController@store')->name('gallery.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        // Route::get('/', 'GalleryController@index')->name('gallery.index');
        // Route::get('/create', 'GalleryController@create')->name('gallery.add');
        // Route::post('/create', 'GalleryController@store')->name('gallery.store');
        // Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        // Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        // Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
        Route::get('getLibrary', 'GalleryController@getLibrary')->name('discount.getLibrary');
    });

    // modulle item
    Route::prefix('item')->group(function () {

        Route::middleware(['checkacl:item-list'])->get('/', 'ItemController@index')->name('item.index');
        Route::middleware(['checkacl:item-add'])->get('/create', 'ItemController@create')->name('item.add');
        Route::middleware(['checkacl:item-add'])->post('/create', 'ItemController@store')->name('item.store');
        Route::middleware(['checkacl:item-edit'])->get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        Route::middleware(['checkacl:item-edit'])->post('/edit/{id}', 'ItemController@update')->name('item.edit');
        Route::middleware(['checkacl:item-delete'])->get('/delete/{id}', 'ItemController@delete')->name('item.delete');
    
        // Route::get('/', 'ItemController@index')->name('item.index');
        // Route::get('/create', 'ItemController@create')->name('item.add');
        // Route::post('/create', 'ItemController@store')->name('item.store');
        // Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        // Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        // Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
        Route::get('getItem', 'ItemController@getItem')->name('item.getItem');
    });


    // modulle trademark
    Route::prefix('trademark')->group(function () {

        Route::middleware(['checkacl:trademark-list'])->get('/', 'TrademarkController@index')->name('trademark.index');
        Route::middleware(['checkacl:trademark-add'])->get('/create', 'TrademarkController@create')->name('trademark.add');
        Route::middleware(['checkacl:trademark-add'])->post('/create', 'TrademarkController@store')->name('trademark.store');
        Route::middleware(['checkacl:trademark-edit'])->get('/edit/{id}', 'TrademarkController@edit')->name('trademark.edit');
        Route::middleware(['checkacl:trademark-edit'])->post('/edit/{id}', 'TrademarkController@update')->name('trademark.edit');
        Route::middleware(['checkacl:trademark-delete'])->get('/delete/{id}', 'TrademarkController@delete')->name('trademark.delete');
    
        // Route::get('/', 'TrademarkController@index')->name('trademark.index');
        // Route::get('/create', 'TrademarkController@create')->name('trademark.add');
        // Route::post('/create', 'TrademarkController@store')->name('trademark.store');
        // Route::get('/edit/{id}', 'TrademarkController@edit')->name('trademark.edit');
        // Route::post('/edit/{id}', 'TrademarkController@update')->name('trademark.edit');
        // Route::get('/delete/{id}', 'TrademarkController@delete')->name('trademark.delete');
    });

    // modulle resource
    Route::prefix('resource')->group(function () {

        Route::middleware(['checkacl:resource-list'])->get('/', 'ResourceController@index')->name('resource.index');
        Route::middleware(['checkacl:resource-add'])->get('/create', 'ResourceController@create')->name('resource.add');
        Route::middleware(['checkacl:resource-add'])->post('/create', 'ResourceController@store')->name('resource.store');
        Route::middleware(['checkacl:resource-edit'])->get('/edit/{id}', 'ResourceController@edit')->name('resource.edit');
        Route::middleware(['checkacl:resource-edit'])->post('/edit/{id}', 'ResourceController@update')->name('resource.edit');
        Route::middleware(['checkacl:resource-delete'])->get('/delete/{id}', 'ResourceController@delete')->name('resource.delete');
    
        // Route::get('/', 'ResourceController@index')->name('resource.index');
        // Route::get('/create', 'ResourceController@create')->name('resource.add');
        // Route::post('/create', 'ResourceController@store')->name('resource.store');
        // Route::get('/edit/{id}', 'ResourceController@edit')->name('resource.edit');
        // Route::post('/edit/{id}', 'ResourceController@update')->name('resource.edit');
        // Route::get('/delete/{id}', 'ResourceController@delete')->name('resource.delete');
    });

    // modulle category
    Route::prefix('category')->group(function () {

        Route::middleware(['checkacl:category-list'])->get('/', 'CategoryController@index')->name('category.index');
        Route::middleware(['checkacl:category-add'])->get('/create', 'CategoryController@create')->name('category.add');
        Route::middleware(['checkacl:category-add'])->post('/create', 'CategoryController@store')->name('category.store');
        Route::middleware(['checkacl:category-edit'])->get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::middleware(['checkacl:category-edit'])->post('/edit/{id}', 'CategoryController@update')->name('category.edit');
        Route::middleware(['checkacl:category-delete'])->get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    
        // Route::get('/', 'CategoryController@index')->name('category.index');
        // Route::get('/create', 'CategoryController@create')->name('category.add');
        // Route::post('/create', 'CategoryController@store')->name('category.store');
        // Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        // Route::post('/edit/{id}', 'CategoryController@update')->name('category.edit');
        // Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });

    // modulle Admin
    Route::prefix('users')->group(function () {

        Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        // Route::get('/', 'UserController@index')->name('user.index');
        // Route::get('/create', 'UserController@create')->name('user.add');
        // Route::post('/create', 'UserController@store')->name('user.store');
        // Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
    });

    // module Chức vụ
    Route::prefix('roles')->group(function () {
        Route::middleware(['checkacl:role-list'])->get('/', 'RoleController@index')->name('role.index');
        Route::middleware(['checkacl:role-add'])->get('/create', 'RoleController@create')->name('role.add');
        Route::middleware(['checkacl:role-add'])->post('/create', 'RoleController@store')->name('role.store');
        Route::middleware(['checkacl:role-edit'])->get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        Route::middleware(['checkacl:role-edit'])->post('/edit/{id}', 'RoleController@update')->name('role.edit');
        Route::middleware(['checkacl:role-delete'])->get('/delete/{id}', 'RoleController@delete')->name('role.delete');
        
        // Route::get('/', 'RoleController@index')->name('role.index');
        // Route::get('/create', 'RoleController@create')->name('role.add');
        // Route::post('/create', 'RoleController@store')->name('role.store');
        // Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        // Route::post('/edit/{id}', 'RoleController@update')->name('role.edit');
        // Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete');
    });

});