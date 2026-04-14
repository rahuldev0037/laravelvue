<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseController extends Controller
{
    public function index()
    {
        // $arr = [2, 3, 4, 8, 23, 56, 754, 45, 23, 56, 78, 90];
        // $getSecondLastitem = $arr[count($arr) - 5];
        // dd($getSecondLastitem);
        return Inertia::render('Courses/Index', [
            'courses' => Course::latest()->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Courses/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'short_name' => 'required|string|max:50',
            'type' => 'required|string|max:100',
            'fee' => 'required|integer|min:0',
        ]);

        $course = Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        // return Inertia::render('Courses/Edit');
    }

    public function edit(Course $course)
    {
        return Inertia::render('Courses/Edit');

    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:50',
            'type' => 'required|string|max:100',
            'fee' => 'required|integer|min:0',
        ]);

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}
