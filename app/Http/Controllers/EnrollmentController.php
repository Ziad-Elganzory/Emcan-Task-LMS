<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Auth::user()->enrollments()->with('course')->get();
        return view('enrollments.index', ['enrollments' => $enrollments]);
    }

    public function store(Course $course)
    {
        if (Auth::check()) {
            Enrollment::create([
                'user_id' => Auth::id(),
                'course_id' => $course->id,
            ]);

            return redirect()->route('user.courses')->with('success', 'You have successfully enrolled in the course.');
        } else {
            return redirect()->route('login')->with('error', 'You need to be logged in to enroll in a course.');
        }
    }
}
