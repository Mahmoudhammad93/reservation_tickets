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
    return view('welcome');
});

Auth::routes();

Route::get('get_resume_info', 'ResumeController@get_resume_info');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/user_data', 'ProfileController@user_data')->name('user_data');
    Route::post('/update_user/{id}', 'ProfileController@update_profile')->name('update_profile');
    Route::post('/image_update', 'ProfileController@image_update')->name('image_update');

    // To get and set schools
    Route::post('/add_school', 'ProfileController@add_school')->name('add_school');
    Route::get('/get_schools', 'ProfileController@get_schools')->name('get_schools');
    Route::post('/delete_school/{id}', 'ProfileController@delete_school')->name('delete_school');
    Route::get('/get_school/{id}', 'ProfileController@get_school')->name('get_school');
    Route::post('/update_school/{id}', 'ProfileController@update_school')->name('update_school');

    // To get and set univesrsites
    Route::post('/add_university', 'ProfileController@add_university')->name('add_university');
    Route::get('/get_universites', 'ProfileController@get_universites')->name('get_universites');
    Route::post('/delete_university/{id}', 'ProfileController@delete_university')->name('delete_university');
    Route::get('/get_university/{id}', 'ProfileController@get_university')->name('get_university');
    Route::post('/update_university/{id}', 'ProfileController@update_university')->name('update_university');

    // To get and set masters
    Route::post('/add_master', 'ProfileController@add_master')->name('add_master');
    Route::get('/get_masters', 'ProfileController@get_masters')->name('get_masters');
    Route::post('/delete_master/{id}', 'ProfileController@delete_master')->name('delete_master');
    Route::get('/get_master/{id}', 'ProfileController@get_master')->name('get_master');
    Route::post('/update_master/{id}', 'ProfileController@update_master')->name('update_master');

    // To get and set doctorates
    Route::post('/add_doctorate', 'ProfileController@add_doctorate')->name('add_doctorate');
    Route::get('/get_doctorates', 'ProfileController@get_doctorates')->name('get_doctorates');
    Route::post('/delete_doctorate/{id}', 'ProfileController@delete_doctorate')->name('delete_doctorate');
    Route::get('/get_doctorate/{id}', 'ProfileController@get_doctorate')->name('get_doctorate');
    Route::post('/update_doctorate/{id}', 'ProfileController@update_doctorate')->name('update_doctorate');

    // To get and set works
    Route::post('/add_work', 'ProfileController@add_work')->name('add_work');
    Route::get('/get_works', 'ProfileController@get_works')->name('get_works');
    Route::post('/delete_work/{id}', 'ProfileController@delete_work')->name('delete_work');
    Route::get('/get_work/{id}', 'ProfileController@get_work')->name('get_work');
    Route::post('/update_work/{id}', 'ProfileController@update_work')->name('update_work');

    // To get and set skills
    Route::post('/add_skill', 'ProfileController@add_skill')->name('add_skill');
    Route::get('/get_skills', 'ProfileController@get_skills')->name('get_skills');
    Route::post('/delete_skill/{id}', 'ProfileController@delete_skill')->name('delete_skill');
    Route::get('/get_skill/{id}', 'ProfileController@get_skill')->name('get_skill');
    Route::post('/update_skill/{id}', 'ProfileController@update_skill')->name('update_skill');

    // To get and set cv
    Route::post('upload_cv', 'ProfileController@upload_cv')->name('upload_cv');
    Route::get('get_cv', 'ProfileController@get_cv')->name('get_cv');

    // To get profile for any user
    Route::get('user/{id}', 'ProfileController@get_any_user');

    // To get and set languages
    // for teacher languages
    Route::post('add_language', 'ProfileController@add_language')->name('add_language');
    Route::get('get_languages', 'ProfileController@get_languages')->name('get_languages');
    Route::post('delete_language/{id}', 'ProfileController@delete_language')->name('delete_language');
    Route::get('get_language/{id}', 'ProfileController@get_language')->name('get_language');
    Route::post('update_language/{id}', 'ProfileController@update_language')->name('update_language');

    // To get and set users
    Route::get('users/create','UsersController@create');
    Route::post('users/store','UsersController@store');
    Route::get('user/{id}/edit', 'UsersController@edit_user');
    Route::post('user/{id}/update', 'UsersController@update_user');

    // To get and set Permissions
    Route::get('permissions/{id}/add', 'PermissionsController@create');
    Route::post('permissions/store', 'PermissionsController@store');
    Route::get('permissions/{id}', 'PermissionsController@permissions');

    // To get and set tickets
    Route::get('tickets','TicketsController@index')->name('tickets');
    Route::get('tickets/create','TicketsController@create');
    Route::post('tickets/store','TicketsController@store');
    Route::get('ticket/{id}','TicketsController@view_ticket');
    Route::post('ticket/{id}/delete','TicketsController@delete_ticket');

    // To get and set categories
    Route::get('categories','CategoriesController@index');
    Route::get('categories/create','CategoriesController@create');
    Route::post('categories/store','CategoriesController@store');

    // To get and set projects in portfolio
    Route::post('add_project', 'ProfileController@add_project');
    Route::get('get_projects', 'ProfileController@get_projects');
    Route::get('get_project/{id}', 'ProfileController@get_project');
    Route::post('delete_project/{id}', 'ProfileController@delete_project');
    Route::post('update_project/{id}', 'ProfileController@update_project');
});
