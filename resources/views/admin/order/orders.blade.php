@extends('admin.layout.layout')

@section('content')
    <div class="container">

        <h3 class="text-center my-5">{{ $title }}</h3>

        <table class="table border-top mt-5">
            <thead>
            <tr>
                <th scope="col">id заказа</th>
                <th scope="col">имя покупателя</th>
                <th scope="col">фамилия покупателя</th>
                <th scope="col">номер мобильного</th>
                <th scope="col">почта</th>
                <th scope="col">доставка</th>
                <th scope="col">статус</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id_order }}</td>
                    <td>{{ $order->user_name }}</td>
                    <td>{{ $order->user_surname }}</td>
                    <td>{{ $order->user_phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->delivery }}</td>
                    <td>{{ $order->status->name }}</td>
                    <td>
                        <a href="{{ route('one-order', ['id' => $order->id_order ]) }}" class="btn btn-success">Открыть</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="my-5 d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
