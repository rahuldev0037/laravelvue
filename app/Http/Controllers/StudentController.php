<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Student/Index', [
            'students' => Student::with('department', 'course')->latest()->get(),
        ]);
    }

    public function create()
    {
        $deparments = Department::latest()->get();
        $courses = Course::latest()->get();
        return Inertia::render('Student/Create', [
            'departments' => $deparments,
            'courses' => $courses,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'department_id' => 'required|exists:departments,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully!');
    }

    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        $deparments = Department::latest()->get();
        $courses = Course::latest()->get();
        return Inertia::render('Student/Edit', [
            'student' => $student,
            'departments' => $deparments,
            'courses' => $courses,
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'department_id' => 'required|exists:departments,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
