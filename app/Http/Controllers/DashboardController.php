<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Student;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{

    public function index(): Response
    {
        $user = Auth::user();
        $data = [];

        // Admin dashboard - see all resources
        if ($user->hasRole('admin')) {

            $data = [
                'courses' => Course::count(),
                'departments' => Department::count(),
                'students' => Student::count(),
                'videos' => Video::count(),
                'userRole' => 'admin',
                'dashboardType' => 'admin',
            ];
        }
        // Student dashboard - see assigned courses and videos
        elseif ($user->hasRole('student')) {
            // Get student record linked to this user
            $student = Student::where('email', $user->email)->first();

            $data = [
                'courses' => $student ? Course::where('id', $student->course_id)->count() : 0,
                'enrolledCourses' => $student ? Course::where('id', $student->course_id)->get() : [],
                'videos' => $student ? Video::count() : 0,
                'userRole' => 'student',
                'dashboardType' => 'student',
                'studentName' => $student->name ?? $user->name,
            ];
        }
        // Default fallback
        else {
            $data = [
                'courses' => Course::count(),
                'userRole' => 'guest',
                'dashboardType' => 'guest',
            ];
        }

        return Inertia::render('Dashboard', $data);
    }
}
