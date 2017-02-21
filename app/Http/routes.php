<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
   return view('welcome');
});

Route::get('admin', function () {
    return view('admin_template');
});

Route::group(['prefix'=>'admin'],function(){
	Route::resource('income','IncomeController');
	Route::resource('expense','ExpenseController');
	Route::resource('transaction','TransactionController');
	Route::resource('loan','LoanController');
	


	Route::group(['prefix'=>'config'],function(){
		Route::resource('income','IncomeTypesController');
		Route::resource('expense','ExpenseTypesController');
		Route::resource('accounts','BankAccountsController');
		Route::resource('bonds','BondsAmountController');

	});




});

