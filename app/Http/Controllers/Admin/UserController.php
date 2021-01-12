<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // все пользователи
    public function allUsers()
    {
        $allUsers = User::paginate(20);
        return view('admin.users.all', [
            'allUsers' => $allUsers
        ]);
    }

    // изменить статус пользователя
    public function changeStatus(Request $request, $id)
    {
        if ($request->changeToUser) {
            $user = User::find($id);
            $user->id_role = 2;
            $user->save();
            return redirect()->back();
        } elseif ($request->changeToAdmin) {
            $user = User::find($id);
            $user->is_admin = 1;
            $user->save();
            return redirect()->back();
        }
    }
}
