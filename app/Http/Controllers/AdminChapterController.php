<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Chapter;
use Illuminate\Http\Request;

class AdminChapterController extends Controller
{
    public function index(Manga $manga)
    {
        $chapters = $manga->chapters()->orderBy('chapter_number')->get();
        return view('admin.chapters.index', compact('manga', 'chapters'));
    }

    public function create(Manga $manga)
    {
        return view('admin.chapters.create', compact('manga'));
    }

    public function store(Request $request, Manga $manga)
    {
        $request->validate([
            'chapter_number' => 'required|integer',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $manga->chapters()->create($request->all());

        return redirect()->route('admin.mangas.chapters.index', $manga->id)
            ->with('success', 'Chapter created successfully.');
    }

    public function edit(Manga $manga, Chapter $chapter)
    {
        return view('admin.chapters.edit', compact('manga', 'chapter'));
    }

    public function update(Request $request, Manga $manga, Chapter $chapter)
    {
        $request->validate([
            'chapter_number' => 'required|integer',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $chapter->update($request->all());

        return redirect()->route('admin.mangas.chapters.index', $manga->id)
            ->with('success', 'Chapter updated successfully.');
    }

    public function destroy(Manga $manga, Chapter $chapter)
    {
        $chapter->delete();

        return redirect()->route('admin.mangas.chapters.index', $manga->id)
            ->with('success', 'Chapter deleted successfully.');
    }
}
