<div class="bg-light py-2">
    {{--  верхний header  --}}
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto mt-lg-0">

                    {{--  управление заказами  --}}
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="orders" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Управление заказами</button>
                        <div class="dropdown-menu" aria-labelledby="orders">
                            <a class="dropdown-item" href="{{ route('admin-all-orders') }}">Все заказы</a>
                            <a class="dropdown-item" href="{{ route('admin-new-orders') }}">Новые заказы</a>
                            <a class="dropdown-item" href="{{ route('admin-in-work-orders') }}">В работе</a>
                            <a class="dropdown-item" href="{{ route('admin-canceled-orders') }}">Выполненные</a>
                            <a class="dropdown-item" href="{{ route('admin-completed-orders') }}">Отмененные</a>
                        </div>
                    </div>

                    <li class="nav-item">
                        <span class="nav-link"> | </span>
                    </li>

                    {{--  управление товарами  --}}
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="products" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Управление товарами</button>
                        <div class="dropdown-menu" aria-labelledby="products">
                            <a class="dropdown-item" href="{{ route('product.index') }}">Все товары</a>
                            <a class="dropdown-item" href="{{ route('product.create') }}">Создать товар</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('gender.index') }}">Все гендеры</a>
                            <a class="dropdown-item" href="{{ route('gender.create') }}">Создать гендер</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('category.index') }}">Все категории</a>
                            <a class="dropdown-item" href="{{ route('category.create') }}">Создать категорию</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('brand.index') }}">Все бренды</a>
                            <a class="dropdown-item" href="{{ route('brand.create') }}">Создать бренд</a>
                        </div>
                    </div>

                    <li class="nav-item">
                        <span class="nav-link"> | </span>
                    </li>

                    {{--  управление отзывами  --}}
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="brands" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Управление отзывами</button>
                        <div class="dropdown-menu" aria-labelledby="brands">
                            <a class="dropdown-item" href="{{ route('all-review') }}">Все отзывы</a>
                            <a class="dropdown-item" href="{{ route('new-review') }}">Новые отзывы</a>
                            <a class="dropdown-item" href="{{ route('publish-review') }}">Опубликованные отзывы</a>
                            <a class="dropdown-item" href="{{ route('canceled-review') }}">Отмененные отзывы</a>
                        </div>
                    </div>

                    <li class="nav-item">
                        <span class="nav-link"> | </span>
                    </li>

                    {{--  управление пользователми  --}}
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="brands" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Управление пользователями</button>
                        <div class="dropdown-menu" aria-labelledby="brands">
                            <a class="dropdown-item" href="{{ route('all-users') }}">Все пользователи</a>
                        </div>
                    </div>

                    <li class="nav-item">
                        <span class="nav-link"> | </span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('main') }}">На сайт</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
