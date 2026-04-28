<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{

    public function index(): Response
    {
        return Inertia::render('Dashboard', [
            'courses' => \App\Models\Course::count(),
            'departments' => \App\Models\Department::count(),
        ]);
    }
}
