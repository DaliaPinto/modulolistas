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
 *
 */
Route::get('/register', [
    'uses' => 'UserController@getUserTypes',
    'as' => 'register',
]);

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
Route::get('/list/{id}/month/{month}', [
    'uses' => 'ScheduleController@showList',
    'as' => 'list',
    'middleware' => 'auth'
]);

/*
 * Edit an incidence in list index view
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
    'as' => 'createIncidence',
    'middleware' => 'auth'
]);

/*
 * Api excel route
 */
Route::get('/saveCareers', [
    'uses' => 'CareerController@saveCareers'
]);

Route::get('/saveStudents', [
    'uses' => 'StudentController@saveStudents'
]);

Route::get('/saveSubjects', [
    'uses' => 'SubjectController@saveSubjects'
]);
