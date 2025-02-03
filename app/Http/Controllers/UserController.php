<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view("users.register");
    }

    public function login(){
        return view("users.login");
    }

    public function list(){
        $users = User::get();

        return view("users.list", [
            'users' =>  $users
        ]);
    }

    public function create(){
        return view("users.create");
    }
}
