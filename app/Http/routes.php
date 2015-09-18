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


get('/', 'SystemUserController@login');
get('login', 'SystemUserController@login');
post('login', 'SystemUserController@loginuser');

get('page', function () {
    return view('pages.organizations.lists');
    });

Route::group(['middleware' => 'auth'], function () {
    get('home', 'HomeController@index');

    get('system-user', 'SystemUserController@index');
    get('system-user/create', 'SystemUserController@create');
    post('system-user/create-new/store', 'SystemUserController@store');
    get('system-user/users-list', 'SystemUserController@userslist');


    get('organizations/create', 'OrganizationsController@create');
    post('organizations/store', 'OrganizationsController@store');

    get('login', function () {
        \Auth::logout();
         return redirect()->back();
    });
});







