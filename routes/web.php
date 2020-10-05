<?php

use Illuminate\Support\Facades\Route;
use App\Exports\ListUsersExport;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('welcome');
});
Route::get('/export', function () {
    return Excel::download(new ListUsersExport, 'users.xlsx');
});
