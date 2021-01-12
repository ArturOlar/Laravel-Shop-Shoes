@extends('admin.layout.layout')

@section('content')
    <div class="container">

        <h3 class="text-center my-5">{{ $title }}</h3>

        <table class="table border-top mt-5">
            <thead>
            <tr>
                <th scope="col">id товара</th>
                <th scope="col">наименование товара</th>
                <th scope="col">имя пользователя</th>
                <th scope="col">почта пользователя</th>
                <th scope="col">отзыв</th>
                <th scope="col">статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->product->id_product }}</td>
                    <td>{{ $review->product->name }}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->user_email }}</td>
                    <td>{{ $review->review }}</td>
                    <td>{{ $review->status->name }}</td>
                    <td>
                        @if($review->id_status != 2)
                            <a class="btn btn-success"
                               href="{{ route('transfer-review-publish', ['id' => $review->id_review]) }}">Опубликовать</a>
                        @endif
                        @if($review->id_status != 3)
                            <a class="btn btn-danger"
                               href="{{ route('transfer-review-canceled', ['id' => $review->id_review]) }}">Отменить</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="my-5 d-flex justify-content-center">
            {{ $reviews->links() }}
        </div>
    </div>
@endsection
