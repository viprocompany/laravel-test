<p>Test.</p>
<h1>Привет, {{$name}} !</h1>
<h1>Тебе {{$age}} !</h1>

<form method="POST" action="" >

    {{  csrf_field() }}
    Login: <input type="text" name="login"><br>
    Password: <input type="text" name="password">
    <input type="submit" value="Go!">
</form>
{{-- двойные {{}} это вызов, в данном случае вывод ,  csrf_field это стандартный
 хелпер Laravel , который генерирует разметку и генерит токен , который
  защищает от инъекций csrf-атака или межсайтовая подделка запроса--}}