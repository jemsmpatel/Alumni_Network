<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;

class AlumniController extends Controller
{
    public function get(Request $request) {
        $alumni = Alumni::with(['user' => function ($query) {
            $query->select('id', 'name', 'email', 'phone', 'year', 'interests', 'goals', 'profile_image');
        }])->where('is_active', true)->get();

        // dd($alumni);

        return view('alumni', compact('alumni'));
    }
}
