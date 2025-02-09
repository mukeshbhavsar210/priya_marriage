<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view("admin.users.register");
    }

    public function login(){
        return view("admin.users.login");
    }

    public function list(){
        $users = User::get();

        return view("admin.users.list", [
            'users' =>  $users
        ]);
    }

    public function create(){
        return view("admin.users.create");
    }
}
