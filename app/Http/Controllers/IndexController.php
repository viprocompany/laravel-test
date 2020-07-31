<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
  public function  index(){
    return 'Main page';
  }

  public function  about(){
    return 'About page';
  }

  public function  testGet(Request $request){
    $name = $request->input('name');
    $age = $request->input('age');

    return view('test.asd',[
        'name' => $name,
        'age' => $age
    ]);
  }

  public function  testPost(Request $request){
    $allInput = $request->all();
    // можно проверить в каком маршруте мы находимся
    if ($request->route()->named('route2')){
      echo 'We are here!';
    }
  /*  $request->all() отдает массив из всех значений , которые он обработал*/
      if( $allInput['login'] == 'admin' && $allInput['password'] == '1111'){
        dump($allInput);
        return 'Ok!';
      }else {
        //return redirect('/test');
        // можно сделать гибко без явного указания маршрута
//        с ориентировкой на имя маршрута, которе не меняется в отличии от указанного
//        пути , которыйможно изменить
        return redirect(route('route1'));
      }
  }
//метод для работы с двумя параметрами
  public function getNews(Request $request, $id, $id2)
    {
      return 'NEWS CONTENT.' .'<br>'. 'Category: ' . $id  .'<br>'. 'Title: ' . $id2;
    }
//метод для работы с двумя параметрами, первый из которых $slug
  public function getNewsSlug(Request $request, $slug, $id)
  {
    return 'NEWS CONTENT.' .'<br>'. 'Title: ' . $slug  .'<br>'. 'Category: ' . $id;
  }
}
