<?php

$this->group(['prefix' => 'painel', 'namespace' => 'Painel'], function () {

	$this->any('brands/search', 'BrandController@search')->name('brands.search');

	$this->resource('brands', 'BrandController');

	$this->any('planes/search', 'PlaneController@search')->name('planes.search');
	$this->resource('planes', 'PlaneController');

	$this->post('states', 'StateController@search')->name('states.search');
	$this->get('states', 'StateController@index')->name('states.index');

	$this->any('state/{initials}/cities/search', 'CityController@search')->name('state.cities.search');
	$this->get('state/{initials}/cities', 'CityController@index')->name('state.cities');

	$this->any('flights/search', 'FlightController@search')->name('flights.search');
	$this->resource('flights', 'FlightController');
	
	
	$this->resource('city/{id}/airports', 'AirportController');
	$this->any('city/{id}/airports/search', 'AirportController@search')->name('airports.search');

	$this->any('users/search', 'UserController@search')->name('users.search');
	$this->resource('users', 'UserController');

	$this->resource('reserves', 'ReservesController', [
		'except' => ['show', 'destroy']
	]);

	$this->get('home', 'PainelController@index')->name('painel');

});

$this->get('/promocoes', 'Site\SiteController@promotions')->name('promotions');
$this->get('/', 'Site\SiteController@index');

// Route::get('/', function () {
// return view('welcome');
// });

Auth::routes();
