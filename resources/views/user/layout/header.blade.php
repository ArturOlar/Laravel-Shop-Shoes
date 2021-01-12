<div class="bg-light py-2">
    {{--  верхний header  --}}
    <div class="container pb-2">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="mr-5">
                <a class="navbar-brand" href="{{ route('main') }}">Shoes</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div>
                <form method="get" action="{{ route('search-product') }}" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="поиск..." value="{{ old('search') }}">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </div>

            <div class="collapse navbar-collapse ml-5">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">Войти</a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link"> | </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('register') }}">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link"> | </span>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="pl-3" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Выйти</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a class="pl-3" href="{{ route('home') }}">Кабинет</a>
                            </div>
                        </li>
                    @endguest

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('return-product') }}">Условия возврата</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link"> | </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('about') }}">О нас</a>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <a href="{{ route('show-basket') }}" class="btn btn-secondary w-75">Корзина</a>
            </div>
        </nav>
    </div>

    {{--  список категорий  --}}
    <div class="container border-top py-2">
        <ul class="nav justify-content-center menu">
            <li class="nav-item mx-3">
                <a class="nav-link btn btn-primary" href="{{ route('products') }}">ВСЕ ТОВАРЫ</a>
            </li>
            @foreach($genders as $gender)
                <li class="nav-item mx-3">
                    <a class="nav-link text-dark"
                       href="http://shoes/public/products?price_from=&price_to=&id_gender%5B%5D={{ $gender->id_gender }}">{{ mb_strtoupper($gender->name) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
