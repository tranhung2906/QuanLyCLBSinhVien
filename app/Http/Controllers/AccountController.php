<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function edit($id)
    {
        $account = User::findOrFail($id);
        return view('admin.account.account-edit', compact('account'));
    }
    public function update(Request $request, $id)
    {
        try {
            $account = User::findOrFail($id);
            $request->validate([
                'role' => 'required'
            ]);
            $account->role = $request->role;
            $account->save();
            return redirect()->route('admin.account')->with('success', 'Cập nhật tài khoản thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }
    public function resetPassword(Request $request, $id){
        try{
            $account = User::findOrFail($id);
            $account->password = Hash::make('thanhniennhiethuyet');
            $account->save();
            return redirect()->back()->with('success', 'Cấp lại mật khẩu thành công');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }
}
