<?php

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

Route::get('/', function () {
    redirect()->route('dashboard.index');
});

Route::group(['namespace' => 'Dashboard'], function () {
    Route::get('/','DashboardController@index')->name('dashboard.index');
});

Route::group(['namespace' => 'Incomes'], function () {
    Route::resource('incomes', 'IncomeController');
    Route::get('/getIncomesDatatable','IncomeController@getIncomesDatatable')->name('incomes.getIncomesDatatable');
});

Route::group(['namespace' => 'Outcomes'], function () {
    Route::resource('outcomes', 'OutcomeController');
    Route::get('/getOutcomesDatatable','OutcomeController@getOutcomesDatatable')->name('outcomes.getOutcomesDatatable');
});

Route::group(['namespace' => 'Journals'], function () {
    Route::resource('journals', 'JournalController');
    Route::get('/getJournalsDatatable','JournalController@getJournalsDatatable')->name('journals.getJournalsDatatable');
});

Route::group(['namespace' => 'Accounts'], function () {
    Route::resource('accounts', 'AccountController');
    Route::get('/getAccountsDatatable','AccountController@getAccountsDatatable')->name('accounts.getAccountsDatatable');
});
