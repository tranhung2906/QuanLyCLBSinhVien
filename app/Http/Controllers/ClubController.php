<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    public function index()
    {
        $club = Club::first();
        return view('admin.club.club', compact('club'));
    }
    public function edit()
    {
        $club = Club::first();
        return view('admin.club.club-edit', compact('club'));
    }
    public function update(Request $request, $id)
    {
        try {
            $club = Club::first();
            $request->validate([
                'name' => 'required|string',
                'status' => 'required|boolean',
                'logo' => 'nullable|image'
            ]);
            $club->name = $request->name;
            $club->status = $request->status;
            if ($request->hasFile('logo')) {
                if ($club->logo && Storage::disk('public')->exists($club->logo)) {
                    Storage::disk('public')->delete('$club->logo');
                }
                $logoPath = $request->file('logo')->store('logo', 'public');
                $club->logo = $logoPath;
            }
            $club->save();
            return redirect()->route('admin.club')->with('success', 'Cập nhật câu lạc bộ thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }
}
