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

Route::resource('/','IndexController',[
									'only' =>['index'],
									'names' => [
										'index'=>'home'
									]
									]);

Route::resource('catalogs','CatalogsController');

Route::resource('articles','ArticlesController',[

												'parameters'=>[

													'articles' => 'alias'

												]

												]);


Route::get('articles/cat/{cat_alias?}',['uses'=>'ArticlesController@index','as'=>'articlesCat'])->where('cat_alias','[\w-]+');
Route::get('articles/cat/stock',['as'=>'stock']);


Route::resource('comment','CommentController',['only'=>['store']]);

Route::match(['get','post'],'/oplata',['uses'=>'OplataController@index','as'=>'oplata']);

Route::match(['get','post'],'/lichniy-kabinet',['uses'=>'LichniykabinetController@index','as'=>'lichniy-kabinet']);

Route::match(['get','post'],'/contacts',['uses'=>'ContactsController@index','as'=>'contacts']);

Route::match(['get','post'],'/politica',['uses'=>'PoliticaController@index','as'=>'politica']);


/* Sitemap */
Route::get('sitemap.xml', 'SitemapController@sitemap');
