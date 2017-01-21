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

/*
 * Main view route
 */
Route::get('/', function () {
    return view('welcome');
});

/*
 * Includes all the routes about the login
 */
Auth::routes();

/*
 * Schedules home view
 */
Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home',
    'middleware' => 'auth'
]);

/*
 * Attendance List index view
*/
Route::get('/list/{id}', [
    'uses' => 'ScheduleController@showList',
    'as' => 'list',
    'middleware' => 'auth'
]);

/*
 * Create an incidence in list index view
 */
Route::post('/edit', function(\Illuminate\Http\Request $request){
    return response()->json(['date' => $request['date']]);
})->name('edit');

/*
 * Create an incidence in list index view
 *
 */
Route::post('/create', [
    'uses' => 'IncidenceController@store',
    'as' => 'create',
    'middleware' => 'auth'
]);

Route::get('/excelFile', [
    'uses' => 'ScheduleController@showDataExcel'
]);

