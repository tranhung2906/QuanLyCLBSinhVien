<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = User::select('id', 'name', 'email', 'mssv', 'classes', 'department', 'avatar', 'role')->whereIn('role', [2, 3, 4])->get();
        return view('admin.account.account', compact('accounts'));
    }
    public function create()
    {
        return view('admin.account.account-create');
    }
}
