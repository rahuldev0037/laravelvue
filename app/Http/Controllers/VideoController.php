<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VideoController extends Controller
{
    public function index()
    {
        return Inertia::render('Videos/Index', [
            'videos' => Video::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Videos/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        Video::create($request->only('title', 'url'));

        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }

    public function show(Video $video)
    {
        return Inertia::render('Videos/Show', [
            'video' => $video,
        ]);
    }

    public function edit(Video $video)
    {
        return Inertia::render('Videos/Edit', [
            'video' => $video,
        ]);
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $video->update($request->only('title', 'url'));

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }
}
