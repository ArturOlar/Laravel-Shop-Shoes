<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // редактировать информацию о пользователе
    public function updateInfoUser(Request $request)
    {
        $obj = User::find($request->id);
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->save();

        session()->flash('success', 'Данные успешно обновлены');
        return redirect()->back();
    }
}
