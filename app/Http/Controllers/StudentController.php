<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Student;
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

    public function store(StudentRequest $request)
    {
        $validated = $request->validated();

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

    public function update(StudentRequest $request, Student $student)
    {
        $validated = $request->validated();

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
