<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>

<form method="POST" action="{{route('login')}}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        @error('email')
        <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password">

    </div>
    <div>
        <button type="submit" name="sendMe" value="1">Войти</button>
    </div>
</form>

</body>
</html>
