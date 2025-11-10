<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
// use Illuminate\Support\Facades\Auth;

class AdminAlumniController extends Controller
{
    public function get() {
        $requested_alumni = Alumni::with(['user' => function ($query) {
            $query->select('id', 'name', 'email', 'phone', 'year', 'interests', 'goals', 'profile_image');
        }])->whereNull('is_active')->get();

        $alumni = Alumni::with(['user' => function ($query) {
            $query->select('id', 'name', 'email', 'phone', 'year', 'interests', 'goals', 'profile_image');
        }])->where('is_active', true)->get();

        $rejected_alumni = Alumni::with(['user' => function ($query) {
            $query->select('id', 'name', 'email', 'phone', 'year', 'interests', 'goals', 'profile_image');
        }])->where('is_active', false)->get();

        return view('admin.alumni', compact('requested_alumni','alumni', 'rejected_alumni'));
    }

    public function update($id) {
        $alumni = Alumni::select('id', 'user_id', 'graduation_year', 'degree', 'job', 'skills', 'location', 'industry', 'resume', 'is_active')
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.alumniupdate', compact('alumni'));
    }

    public function update_alumni(Request $request, $id) {

        $request->validate([
            'graduation_year' => 'required|digits:4',
            'degree' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'job' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'resume' => 'nullable|mimes:pdf|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $alumni = Alumni::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $filename = time().'_'.$resume->getClientOriginalName();
            $path = $resume->move(public_path('resumes'), $filename); // moves to /public/images

            $resumePath = 'resumes/' . $filename;
        } else {
            $resumePath = null;
        }

        $alumni->update([
            'graduation_year' => $request->graduation_year,
            'degree' => $request->degree,
            'industry' => $request->industry,
            'job' => $request->job,
            'skills' => $request->skills,
            'location' => $request->location,
            'resume' => $resumePath ?? $alumni->resume,
            'is_active' => $request->is_active ?? false,
        ]);

        return redirect()->back()->with('success', 'Alumni updated successfully!');
    }

    public function accept($id) {
        $alumni = Alumni::findOrFail($id);

        $alumni->update([
            'is_active' => 1
        ]);
        return redirect()->back()->with('success', 'Alumni updated successfully!');
    }

    public function reject($id) {
        $alumni = Alumni::findOrFail($id);

        $alumni->update([
            'is_active' => 0
        ]);
        return redirect()->back()->with('success', 'Alumni updated successfully!');
    }
}
