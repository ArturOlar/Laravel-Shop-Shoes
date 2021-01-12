<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shoes</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    @include('admin.layout.header')
    @include('alert.alert')
    @yield('content')
    @include('admin.layout.footer')

    {{--  выпадающий список из несколькими чекбоксами  --}}
    <script>
        $('.allow-focus').on('click', function(event){
            event.stopPropagation();
        });
    </script>

    {{--  удалить изображение при редактировании товара  --}}
    <script>
        function deleteImage(idImage) {
            $.ajax({
                url: '{{ route('delete-image') }}',
                method: "POST",
                data: {id_image:idImage},
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},

                success: function (data) {
                    alert(JSON.parse(data));
                    location.reload();
                }
            });
        }
    </script>

    {{--  изменить баланс остатков товаров  --}}
    <script>
        function changeBalanceProductPlus(idProduct) {
            count = parseInt($('#change-balance-product-count-' + idProduct).val());
            $('#change-balance-product-count-' + idProduct).attr('value', ++count);
        }

        function changeBalanceProductMinus(idProduct) {
            count = parseInt($('#change-balance-product-count-' + idProduct).val());
            if (count > 0) {
                $('#change-balance-product-count-' + idProduct).attr('value', --count);
            }
        }
    </script>
</body>
</html>
