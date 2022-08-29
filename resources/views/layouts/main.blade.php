
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @section('head')
        <link href="css/app.css" rel="stylesheet" type="text/css" >
        <link href="css/slicknav.min.css" rel="stylesheet" type="text/css" >
        <link href="css/style.css" rel="stylesheet" type="text/css" >
        <link href="css/modal.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @endsection
    @yield('head')
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="header__wrapper-top">
                <div class="header__logo">
                    <a href="/" class="header__logo-link">
                        <img src="img/logo95x95.png" alt="LOGO" class="header__logo-pic">
                    </a>
                    <div class="header__logo__info">
                        <div class="header__logo__slogan">Официальный Интернет-ресурс</div>
                        <div class="header__logo__title">Нотариальная палата города Шымкент</div>
                    </div>
                </div>

                <div class="header__elements">
                    <input type="text" class="header__search" />
                    {{--<a href="#" class="header__link-top header__link-top-contact">Контакты</a>--}}
                    <a href="#!" class="header__link-top">қаз</a>
                    <a href="#!" class="header__link-top">рус</a>
                    <a href="#!" class="header__link-top">eng</a>
                    @auth
                        <a href="{{ route('logout') }}" class=" header__sign">Выход ({{Auth::user()->email}})</a>
                    @else
                        <a href="#!" onclick="document.getElementById('id01').style.display='block'" class=" header__sign">Вход</a>
                    @endauth

                </div>

            </div>

            <nav class="main__menu">
                <ul class="res-menu">
                    <li class="dropdown">
                        <a href="#">О нотариате</a>
                        <ul class="menu-area">
                            {{-- <ul>
                                 --}}{{--<h4>Our Company</h4>--}}{{--
                                 <img src="img/logo95x95.png" alt="logo">
                             </ul>--}}
                            <ul>
                                {{--<h4>Закон РК &quot;О нотариате&quot;</h4>--}}
                                <li><a href="#">Закон РК &quot;О нотариате&quot;</a></li>
                                <li><a href="#">НПА о Нотариате</a></li>
                                <li><a href="#">НПА</a></li>
                                <li><a href="#">Устав НП города Шымкент</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Правоприменительная практика</a>
                        <ul class="menu-area">
                            <ul>
                                <li><a href="#">Методические рекомендации</a></li>
                                <li><a href="#">Обобщения, анализы</a></li>
                                <li><a href="#">Разъяснение МЮ, РНП, ДЮ и др</a></li>
                                <li><a href="#">Бюллетень нотариуса</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Списки нотариусов</a>
                        <ul class="menu-area">
                            <ul>
                                <li><a href="#">Действующие</a></li>
                                <li><a href="#">Временно не работающие</a></li>
                                <li><a href="#">Исключенные</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Документы</a>
                        <ul class="menu-area">
                            <ul>
                                <li><a href="#">РНП, НП</a></li>
                                <li><a href="#">Органы юстиции</a></li>
                                <li><a href="#">Правоохранительные органы, судебные исполнители и т.д.</a></li>
                                <li><a href="#">Судебные акты</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Финмониторинг</a>
                        <ul class="menu-area">
                            <ul>
                                <li><a href="#">Перечень организаций и лиц, связанные с финансированием терроризма и экстремизма</a></li>
                            </ul>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('file.index')}}">Архив</a>
                    </li>
                    <li>
                        <a href="#">Контакты</a>
                    </li>

                </ul>
            </nav>
        </header>

        <main class="content__section">
            {{--TODO modal window--}}
            <div id="id01" class="modal">
                <form class="modal-content animate" action="{{route('login')}}" method="post">
                    @csrf
                    <div class="container">
                        <label for="uname"><b>Логин</b></label>
                        <input type="text" class="modal_text" placeholder="Введите логин" name="email" required>
                        @error('email')
                        <div>{{$message}}</div>
                        @enderror
                        <label for="psw"><b>Пароль</b></label>
                        <input type="password" class="modal_password" placeholder="Введите пароль" name="password" required>
                        @error('password')
                        <div>{{$message}}</div>
                        @enderror
                        <button class="modal_button" type="submit">Вход</button>
                       {{-- <label>
                            <input type="checkbox" checked="checked" value="false" name="remember"> Запомнить пароль
                        </label>--}}
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="modal_button cancelbtn">Отмена</button>
                        {{--<span class="psw">Forgot <a href="#">password?</a></span>--}}
                    </div>
                </form>
            </div>

            @yield('main_content')
        </main>


        <footer class="footer">
            <div>
                <nav class="footer__nav">
                    <ul class="footer__menu title__sub_li">
                        <li class="footer__menu-item">
                            <a href="#!" class="footer__menu-title">Карта сайта</a>
                        </li>
                        <li class="footer__menu-item">
                            <a href="#!" class="footer__menu-title">Контакты</a>
                        </li>
                    </ul>
                </nav>

                <nav class="footer__nav">
                    <ul class="footer__menu title__social-media">
                        <li class="footer__menu-item">
                            <a class="fa facebook" href="#!" target="_blank"></a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="fa twitter" href="#!" target="_blank"></a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="fa youtube" href="#!" target="_blank"></a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="fa instagram" href="#!" target="_blank"></a>
                        </li>
                        <li class="footer__menu-item">
                            <a class="fa linkedin" href="#!" target="_blank"></a>
                        </li>
                    </ul>
                </nav>

                <div class="footer__logo">
                    <img src="img/logo_freeback.png" alt="NIS" class="footer__logo-pic">
                    <div class="footer__logo__info">
                        <div class="footer__logo__slogan">Официальный Интернет-ресурс</div>
                        <div class="footer__logo__title">Нотариальная палата города Шымкент</div>
                        <div class="footer__copyright">© <?php echo date("Y"); ?> - 2022 Copyright.</div>
                    </div>
                </div>

            </div>
        </footer>
    </div>
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
