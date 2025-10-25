<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index () {
        $club = Club::first();
        return view('admin.club.club', compact('club'));
    }
}
