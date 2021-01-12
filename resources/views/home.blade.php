@extends('user.layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="my-5">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <button class="btn btn-link">Выйти</button>
                    </div>
                </form>

                <form method="POST" action="{{ route('update-info-user') }}">
                    @csrf
                    <input name="id" type="hidden" value="{{ $user->id }}">

                    <div class="form-group">
                        <label>Ваш логин</label>
                        <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>Ваш email</label>
                        <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
