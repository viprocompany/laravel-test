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
  //вывод стандартной страницы Laravel
    return view('welcome');

});
 Route::get('/404', function () {
  //вывод стандартной страницы Laravel
  return view('test/error404');

});
 //более поздние файлы затирают ранние(верхние)
// IndexController@index контролер и экшн этого контроллера
Route::get('/','IndexController@index' );
Route::get('/about','IndexController@about' );
//маршруту можно давать имя типа route1, это удобно при изменении ссылки
//когда в коде в контроллере используется имя роута , а не явно указанный урл
Route::post('/test','IndexController@testPost' )->name('route2');
Route::get('/test','IndexController@testGet' )->name('route1');
//Route::get('/news/{id}/{id2}','IndexController@getNews' )
//    -> where('id', '[0-9]+');
/* для id задаем ограничение с помощью where , согласно каоторому
id может быть только целым числом в соответствии  с регулярным выражением
[0-9]+ , второй параметр для подстановки новости идет без ограничений типов*/
Route::get('/news/{slug}/{id}','IndexController@getNewsSlug' )
    -> where([
        'slug' => '[a-z0-9-_]+',
        'id' => '[0-9]+']
    );


//Route::group(['prefix'=> 'admin/user'], function()
//{
//});