<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shoes</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!-- styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css" rel="stylesheet"/>

    <!-- libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    @include('user.layout.header')
    @include('alert.alert')
    @yield('content')
    @include('user.layout.footer')

    {{--  выпадающий список из несколькими чекбоксами  --}}
    <script>
        $('.allow-focus').on('click', function(event){
            event.stopPropagation();
        });
    </script>

    {{--  изменить количество товаров которое нужно добавить в корзину (из карточки товара)  --}}
    <script>
        let count = $('#add-to-basket-count').val();

        $('#add-to-basket-plus').on('click', function (event) {
            $('#add-to-basket-count').attr('value', ++count);
            event.preventDefault();
        });

        $('#add-to-basket-minus').on('click', function (event) {
            if (count > 1) {
                $('#add-to-basket-count').attr('value', --count);
            }
            event.preventDefault();
        });
    </script>

    {{--  изменить количество товаров которое нужно добавить в корзину (из каталога)  --}}
    <script>
        function addToBasketCatalog(idProduct) {
            let counter = parseInt($('#add-to-basket-count-catalog-' + idProduct).val());
            $('#add-to-basket-count-catalog-' + idProduct).attr('value', ++counter);
        }

        function minusToBasketCatalog(idProduct) {
            let counter = parseInt($('#add-to-basket-count-catalog-' + idProduct).val());
            if (counter > 1) {
                $('#add-to-basket-count-catalog-' + idProduct).attr('value', --counter);
            }
        }
    </script>

    {{--  слайдер изображений  --}}
    <script>
        $(document).ready(function(){
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: true,
                centerMode: true,
                focusOnSelect: true
            });
        });
    </script>

    {{--  слайдер изображений брендов  --}}
    <script>
        $('.center').slick({
            centerMode: true,
            centerPadding: '70px',
            slidesToShow: 5,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 1000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '20px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '20px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>

    <script>
        $('.main-products').slick({
            dots: true,
            infinite: false,
            speed: 1500,
            slidesToShow: 5,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
</body>
</html>
