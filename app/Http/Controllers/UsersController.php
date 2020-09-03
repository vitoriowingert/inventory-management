<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function listUsers()
    {
        $users = $users = DB::table('users')->get();
        return view('listUsers', ['users' => $users]);
    }
}
