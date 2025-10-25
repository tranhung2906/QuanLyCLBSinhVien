<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::select('id', 'name', 'mssv', 'classes', 'department', 'avatar', 'role')->whereIn('role', [2, 3, 4])->get();
        return view('admin.member.member', compact('members'));
    }
    public function create()
    {
        return view('admin.member.member-create');
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'classes' => 'required|string|max:255',
                'mssv' => 'required|string|max:50|unique:users',
                'department' => 'required|string|max:255',
                'date_of_birth' => 'nullable|date',
                'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $path = null;
            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store('avatars', 'public');
            }

            User::create([
                'name' => $validated['name'],
                'email' => $validated['mssv'],
                'password' => Hash::make('thanhniennhiethuyet'),
                'email_verified_at' => now(),
                'mssv' => $validated['mssv'],
                'date_of_birth' => $validated['date_of_birth'] ?? null,
                'classes' => $validated['classes'],
                'department' => $validated['department'],
                'avatar' => $path,
                'role' => 4,
            ]);
            return redirect()->route('admin.member')->with('success', 'Thêm sinh viên thành công!');
        } catch (Exception $e) {
            Log::error('Lỗi thêm sinh viên: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }

    public function edit($id)
    {
        $member = User::findOrFail($id);
        return view('admin.member.member-edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        try {
            $member = User::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255',
                'classes' => 'required|string|max:255',
                'mssv' => 'required|string|max:50',
                'department' => 'required|string|max:255',
                'date_of_birth' => 'nullable|date',
                'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);
            $member->name = $request->name;
            $member->classes = $request->classes;
            $member->mssv = $request->mssv;
            $member->department = $request->department;
            $member->date_of_birth = $request->date_of_birth;
            if ($request->hasFile('avatar')) {
                if ($member->avatar && Storage::disk('public')->exists($member->avatar)) {
                    Storage::disk('public')->delete($member->avatar);
                }
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $member->avatar = $avatarPath;
            }
            $member->save();
            return redirect()->route('admin.member')->with('success', 'Cập nhật thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }
    public function delete($id){
        $member = User::findOrFail($id);
        if($member){
            if($member->avatar){
                Storage::delete($member->avatar);
            }
            $member->delete();
            return redirect()->route('admin.member')->with('success', 'Đã xóa thành viên');
        }else{
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }
}
