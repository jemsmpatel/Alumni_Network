<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'graduation_year' => 'required|digits:4',
            'degree' => 'string|max:255',
            'industry' => 'string|max:255',
            'job' => 'string|max:255',
            'skills' => 'string|max:255',
            'location' => 'string|max:255',
            'resume' => 'mimes:pdf|max:2048',
        ]);

        $user = Auth::user();

        // Check if an alumni record already exists for this user
        $alumni = $user->alumni;

        if ($alumni) {
            // Handle file upload
            if ($request->hasFile('resume')) {
                $resume = $request->file('resume');
                $filename = time().'_'.$resume->getClientOriginalName();
                $path = $resume->move(public_path('resumes'), $filename); // moves to /public/images

                $resumePath = 'resumes/' . $filename;
            } else {
                $resumePath = null;
            }

            // Update existing alumni record
            $updateData = [
                'graduation_year' => $request->graduation_year,
                'degree' => $request->degree,
                'industry' => $request->industry,
                'job' => $request->job,
                'skills' => $request->skills,
                'location' => $request->location,
                'resume' => $resumePath,
            ];

            // Conditionally handle is_active
            if ($alumni->is_active === 0) {
                $updateData['is_active'] = null;
            }

            $alumni->update($updateData);

            return back()->with('success', 'Alumni record updated successfully.');
        }

        // Handle file upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $filename = time().'_'.$resume->getClientOriginalName();
            $path = $resume->move(public_path('resumes'), $filename); // moves to /public/images

            $resumePath = 'resumes/' . $filename;
        } else {
            $resumePath = null;
        }

        // If no alumni record exists, create a new one
        $newAlumni = new Alumni([
            'graduation_year' => $request->graduation_year,
            'degree' => $request->degree,
            'industry' => $request->industry,
            'job' => $request->job,
            'skills' => $request->skills,
            'location' => $request->location,
            'resume' => $resumePath,
        ]);

        $user->alumni()->save($newAlumni);

        return back()->with('success', 'Alumni record created successfully.');
    }
}
