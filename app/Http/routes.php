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



get('organizations/login', 'OrganizationsController@login');
post('organizations/login', 'OrganizationsController@loginuser');


Route::group(['before' => 'organizationauth'], function () {
    get('organizations/first-signin/{id}', 'OrganizationsController@firstsignin');
    post('organizations/first-signin/storeorgdetails', 'OrganizationsController@storeorgdetails');

    get('organizations/first-signin/work-days/{id}', 'OrganizationsController@workdays');
    post('organizations/work-days/store', 'OrganizationsController@workdaysstore');

    get('organizations/first-signin/rest-times/{id}', 'OrganizationsController@resttimes');
    post('organizations/first-signin/rest-times/store', 'OrganizationsController@storeresttimes');

    get('organizations/first-signin/background/{id}', 'OrganizationsController@background');
    post('organizations/first-signin/background/store', 'OrganizationsController@backgroundstore');
});

Route::group(['before' => 'userauth'], function () {
    get('home', 'HomeController@index');

    get('system-user', 'SystemUserController@index');
    get('system-user/create', 'SystemUserController@create');
    post('system-user/create-new/store', 'SystemUserController@store');
    get('system-user/users-list', 'SystemUserController@userslist');



    get('organizations/create', 'OrganizationsController@create');
    post('organizations/store', 'OrganizationsController@store');
    get('organizations/organizations-list', 'OrganizationsController@organizationlist');
});

get('logout', function () {
    \Auth::logout();
    return redirect()->back();
});

get('count', function () {
    $org = \DB::table('organization_details')
            ->where('organization_details.organization', '=', 2)
            ->get(['id']);

    if ($org != null) {
        echo $org[0]->id;
    }
});






