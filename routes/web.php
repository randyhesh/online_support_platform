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

Route::get('/', 'App\Http\Controllers\web\NavigationController@index')->name('dashboard');
Route::post('/login', 'App\Http\Controllers\web\LoginController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\web\LoginController@logoutUser')->name('logout');

//customer actions
Route::post('/saveTicket', 'App\Http\Controllers\web\TicketController@saveTicket')->name('save_ticket');
Route::get('/customer_search_ticket', 'App\Http\Controllers\web\TicketController@searchTicketByCustomer')->name('customer_search_ticket');

//support agent
Route::get('/ticket_list', 'App\Http\Controllers\web\TicketController@getTicketList')->name('ticket_list');
Route::get('/agent_search_ticket', 'App\Http\Controllers\web\TicketController@searchTicketByAgent')->name('agent_search_ticket');
Route::get('/open_ticket', 'App\Http\Controllers\web\TicketController@getOpenTicketView')->name('open_ticket');
Route::post('/save_reply', 'App\Http\Controllers\web\TicketController@saveReply')->name('save_reply');

//admin
Route::get('/getUserList', 'App\Http\Controllers\web\NavigationController@getUserList')->name('user_list');




