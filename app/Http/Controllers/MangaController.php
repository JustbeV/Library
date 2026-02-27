<?php
// This controller will handle:
    // list mangas
    // add manga
    // edit manga
    // delete manga

// use App\Http\Controllers\Controller;
namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Chapter;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function index()
    {
        $mangas = Manga::all();
        return view('mangas.index', compact('mangas'));
    }

    public function show($id)
{
    $manga = Manga::with('chapters')->findOrFail($id);
    return view('mangas.show', compact('manga'));
}


   // Show the form to create a new chapter for a manga
public function createChapter($mangaId)
{
    $manga = Manga::findOrFail($mangaId);
    return view('chapters.create', compact('manga'));
}

// Store the new chapter
public function storeChapter(Request $request, $mangaId)
{
    $request->validate([
        'chapter_number' => 'required|integer',
        'title' => 'nullable|string',
        'content' => 'required|string',
    ]);

    $manga = Manga::findOrFail($mangaId);

    $manga->chapters()->create($request->all());

    return redirect()->route('mangas.show', $mangaId)
        ->with('success', 'Chapter added successfully!');
}

// Show the form to edit a chapter
public function editChapter($mangaId, $chapterId)
{
    $manga = Manga::findOrFail($mangaId);
    $chapter = $manga->chapters()->findOrFail($chapterId);

    return view('chapters.edit', compact('manga', 'chapter'));
}

// Update the chapter
public function updateChapter(Request $request, $mangaId, $chapterId)
{
    $request->validate([
        'chapter_number' => 'required|integer',
        'title' => 'nullable|string',
        'content' => 'required|string',
    ]);

    $manga = Manga::findOrFail($mangaId);
    $chapter = $manga->chapters()->findOrFail($chapterId);
    $chapter->update($request->all());

    return redirect()->route('mangas.show', $mangaId)
        ->with('success', 'Chapter updated successfully!');
}

// Delete a chapter
public function destroyChapter($mangaId, $chapterId)
{
    $manga = Manga::findOrFail($mangaId);
    $chapter = $manga->chapters()->findOrFail($chapterId);
    $chapter->delete();

    return redirect()->route('mangas.show', $mangaId)
        ->with('success', 'Chapter deleted successfully!');
}
// Show a specific chapter for a manga
public function showChapter($mangaId, $chapterId)
{
    $manga = Manga::findOrFail($mangaId);
    $chapter = $manga->chapters()->findOrFail($chapterId);

    return view('chapters.show', compact('manga', 'chapter'));
}
public function create()
{
    return view('mangas.create');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    Manga::create($validated);

    return redirect()->route('mangas.index')
                     ->with('success', 'Manga created successfully.');
}




}
?>