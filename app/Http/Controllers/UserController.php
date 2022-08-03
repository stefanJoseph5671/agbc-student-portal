<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index');
    }

    public function getUsers() {
        $users = User::paginate(5);
        return view('administrator.users.index',compact('users'));
        // $users = DB::select('select * from users')->paginate(15);
        // return view('administrator.users.index',['users'=>$users]);
     }
}
