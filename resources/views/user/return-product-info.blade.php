@extends('user.layout.layout')

@section('content')
    <div class="container">
        <div>
            <h4 class="mt-5">Основная информация</h4>
            <div class="mt-3">
                <ol>
                    <li>Упакуйте товар и положите его в коробку вместе с заполненным и подписанным Документом Возврата.
                        Если у Вас нет Документа Возврата скачайте бланк здесь.
                    </li>
                    <li>Нажмите осуществить возврат и выберите товары, которые хотите вернуть, выберите причину
                        возврата.
                    </li>
                    <li>Вы можете отправить возврат одной из транспортных компаний: <br>
                        - Для отправки посылки через Meest Express укажите адрес 79035, м. Львов, вул. Зеленая 147,
                        получатель – Росан Глобал Eobuv.com, номер тел. 0676702303. Для отправки через Meest Express
                        выберите услугу к Двери.
                        <br>
                        - Для отправки посылки через Новую Почту укажите г. Львов Отделение Новая Почта №3, вул.
                        Угорская 22, тел. +380504301430, получатель – СП Росан (Возврат Eobuv.com).
                        <br>
                        - Для отправки посылки через Укрпочту укажите адрес 79000, г. Львов, вул. Словацкого 1 а/я 79.
                        <br>
                    </li>
                    <li>Возврат средств произойдет в течение 7 банковских дней с момента проверки Вашего возврата. В
                        особых ситуациях время может быть несколько дольше, но не будет превышать 14 дней.
                    </li>
                </ol>
            </div>
        </div>

        <div class="mt-5 border-top">
            <h4 class="mt-5">Важно</h4>
            <div class="mt-3">
                <p>Внимание, мы не принимаем посылок с наложенным платежом. Если вы оплачивали заказ курьеру наличными
                    при получении возврата средств можем осуществить на карту Вашего банка, если вы осуществили
                    предоплату заказа на сайте через платежную систему PayU, возврат средств произойдет на карту с
                    которой мы получили оплату.</p>
            </div>
        </div>

        <div class="mt-5 border-top">
            <h4 class="mt-5">Самые популярные вопросы</h4>
            <div class="mt-3">
                <a href="#">1. Как осуществить обмен?</a> <br>
                <a href="#">2. В течение какого времени будет осуществлен возврат?</a> <br>
                <a href="#">3. При каких условиях мы не можем принять возврат?</a>
            </div>
        </div>

        <div>
            <p class="mt-5"><b>1. Как осуществить обмен?</b></p>
            <p class="mt-3">Мы осуществляем систему обмена в виде возврата, а также размещение нового заказа и
                осуществления новой
                оплаты. Верните заказанный продукт и осуществите возврат как можно быстрее. Мы можем зарезервировать
                выбранный товар на 10 дней.</p>
        </div>

        <div>
            <p class="mt-5"><b>2. В течение какого времени будет осуществлен возврат?</b></p>
            <p class="mt-3">
                Если Вы осуществили предоплату на сайте через платежную систему PayU возврат средств состоится на карту
                с которой мы получили оплату в течение 3-5 дней от момента получения и проверки возврата. Если оплату
                осуществили курьеру наличными при получении возврата средств можем осуществить на карту вашего банка в
                течение 7 банковских дней с момента получения и проверки возврата. В особых ситуациях время может быть
                несколько длиннее, но не будет превышать 14 дней.</p>
        </div>

        <div>
            <p class="mt-5"><b>3. При каких условиях мы не можем принять возврат?</b></p>
            <p class="mt-3">
                Возврат мы можем не принять если возврат осуществили по окончании 30-дневного срока. Товар, который был в использовании – возврату не подлежит.
            </p>
        </div>
    </div>
@endsection
