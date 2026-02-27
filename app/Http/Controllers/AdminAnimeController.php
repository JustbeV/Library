<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('admin.animes.index', compact('animes'));
    }

    public function create()
    {
        return view('admin.animes.create');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|in:ongoing,completed',
        'video' => 'nullable|mimes:mp4,mov,avi,webm|max:51200', // max 50MB
    ]);

    $anime = new Anime($request->only(['title', 'description', 'status']));

    if ($request->hasFile('video')) {
        $videoPath = $request->file('video')->store('videos', 'public');
        $anime->video = $videoPath;
    }

    $anime->save();

    return redirect()->route('admin.animes.index')->with('success', 'Anime added successfully.');
}

    public function edit(Anime $anime)
    {
        return view('admin.animes.edit', compact('anime'));
    }

   public function update(Request $request, Anime $anime)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|in:ongoing,completed',
        'video' => 'nullable|mimes:mp4,mov,avi,webm|max:51200',
    ]);

    $anime->update($request->only(['title', 'description', 'status']));

    if ($request->hasFile('video')) {
        // Delete old video if exists
        if ($anime->video && Storage::disk('public')->exists($anime->video)) {
            Storage::disk('public')->delete($anime->video);
        }
        $anime->video = $request->file('video')->store('videos', 'public');
        $anime->save();
    }

    return redirect()->route('admin.animes.index')->with('success', 'Anime updated successfully.');
}

    public function destroy(Anime $anime)
{
    if ($anime->video && Storage::disk('public')->exists($anime->video)) {
        Storage::disk('public')->delete($anime->video);
    }

    $anime->delete();

    return redirect()->route('admin.animes.index')
        ->with('success', 'Anime deleted successfully.');
}
}