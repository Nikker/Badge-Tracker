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

Route::get('/', [
	'as' => 'home',
	'uses' => function() {
		return redirect()->route('challenger.index');
	}
]);

Route::get('about', [
	'as' => 'about',
	'uses' => function() {
		return redirect()->route('about.leaders');
	}
]);

Route::get('about/rules', [
	'as' => 'about.rules',
	'uses' => function() {
		return view('about.rules');
	}
]);

Route::get('about/leaders', [
	'as' => 'about.leaders',
	'uses' => function() {
		return view('about.leaders');
	}
]);

Route::group([
	'as' => 'admin.',
	'middleware' => ['auth','can:admin'],
	'namespace' => 'Admin'
], function() {

	Route::get('/challengers/new', [
		'uses' => 'ChallengerController@create',
		'as' => 'challenger.create'
	]);

	Route::post('/challengers', [
		'uses' => 'ChallengerController@store',
		'as' => 'challenger.store'
	]);
		
	Route::get('/challengers/{challenger}/edit', [
		'uses' => 'ChallengerController@edit',
		'as' => 'challenger.edit'
	]);

	Route::post('/challengers/{challenger}', [
		'uses' => 'ChallengerController@update',
		'as' => 'challenger.update'
	]);

	Route::get('/challengers/{challenger}/award/{badge?}', [
		'uses' => 'ChallengerController@award',
		'as' => 'challenger.award'
	]);

	Route::post('/challengers/{challenger}/award', [
		'uses' => 'ChallengerController@submitAward',
		'as' => 'challenger.submitAward'
	]);

	Route::delete('/challengers/{challenger}/badge/{badge}', [
		'uses' => 'ChallengerController@deleteBadge',
		'as' => 'challenger.badge.delete'
	]);


	Route::get('/challengers/{challenger}/register', [
		'uses' => 'ChallengerController@showSeasonRegistration',
		'as' => 'challenger.register'
	]);
	
	Route::post('/challengers/{challenger}/register', [
		'uses' => 'ChallengerController@register',
		'as' => 'challenger.register.submit'
	]);

});

Route::get('/challengers', [
	'uses' => 'ChallengerController@index',
	'as' => 'challenger.index'
]);

Route::get('/challengers/{challenger}', [
	'uses' => 'ChallengerController@show',
	'as' => 'challenger.show'
]);


Route::get('/logout', [
	'uses' => 'FacebookController@logout',
	'as' => 'logout'
]);

Route::get('/login', [
	'uses' => 'FacebookController@login',
	'as' => 'login'
]);

Route::get('/facebook/callback', [
	'uses' => 'FacebookController@callback',
	'as' => 'facebook.callback'
]);