@extends('admin.layout.layout')

@section('content')

    {{-- все статусы --}}
    <div class="container">
        <h3 class="text-center my-5">Все пользователи</h3>
        <table class="table my-5 table-bordered">
            <thead class="table-info">
            <tr>
                <th scope="col">ID пользователя</th>
                <th scope="col">Имя пользователя</th>
                <th scope="col">Email</th>
                <th scope="col">Статус</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allUsers as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if($user->id_role == 2)
                        <td>Обычный пользователь</td>
                        <td>
                            <form action="{{ route('change-status', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button name="changeToAdmin" value="changeToAdmin" class="btn btn-warning">Сделать
                                    админом
                                </button>
                            </form>
                        </td>
                    @elseif($user->id_role == 1)
                        <td>Администратор</td>
                        <td>
                            <form action="{{ route('change-status', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button name="changeToUser" value="changeToUser" class="btn btn-danger">Забрать права
                                    админа
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="justify-content-center d-flex pt-5">
            {{ $allUsers->links() }}
        </div>
    </div>
@endsection
