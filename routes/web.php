<?php


use App\Http\Controllers\ClientController;

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AccountController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\SettingController;
;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes(['register' => false]);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::get('/clients', [ClientController::class,'index'])->name('client.index');


    Route::get('/transactions', [TransactionController::class,'show'])->name('transaction.show');
    Route::post('/add', [TransactionController::class,'add'])->name('transaction.add');
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.show');
    Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
    Route::patch('/permission/{permission}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    Route::get('/role', [RoleController::class, 'show'])->name('role.show');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::patch('/role/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::get('/user', [UserController::class, 'show'])->name('user.show');
    Route::patch('/user/block/{transaction}', [UserController::class, 'block'])->name('user.block');
    Route::patch('/user/unblock/{transaction}', [UserController::class, 'unblock'])->name('user.unblock');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::patch('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile.show');
    Route::patch('/profile', [UserController::class, 'userUpdate'])->name('user.profile.update');
    Route::get('/user/sales', [UserController::class, 'mySales'])->name('user.sale');
    Route::post('/user/my/sales/filter/date', [UserController::class, 'mySalesFilter'])->name('user.sale.filter');
    Route::get('/user/my/sales/customer/year/month', [UserController::class, 'mySalesFilterYearMothOnCustomer'])->name('user.sale.customer.year.month');

    Route::get('/account/type', [AccountTypeController::class, 'index'])->name('account.type.index');
    Route::post('/account/type', [AccountTypeController::class, 'store'])->name('account.type.store');
    Route::patch('/account/type/{accountType}', [AccountTypeController::class, 'update'])->name('account.type.update');
    Route::delete('/account/type/{accountType}', [AccountTypeController::class, 'destroy'])->name('account.type.destroy');
    Route::get('/accounts', [AccountController::class, 'index'])->name('account.index');
    Route::post('/accounts', [AccountController::class, 'store'])->name('account.store');
    Route::patch('/account/{account}', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account/{account}', [AccountController::class, 'destroy'])->name('account.destroy');

});


