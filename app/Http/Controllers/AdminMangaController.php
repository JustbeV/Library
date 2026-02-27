<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;

class AdminMangaController extends Controller
{
    public function index()
    {
        $mangas = Manga::all();
        return view('admin.mangas.index', compact('mangas'));
    }

    public function create()
    {
        return view('admin.mangas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Manga::create($request->all());

        return redirect()->route('admin.mangas.index')
            ->with('success', 'Manga created successfully.');
    }

    public function edit(Manga $manga)
    {
        return view('admin.mangas.edit', compact('manga'));
    }

    public function update(Request $request, Manga $manga)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $manga->update($request->all());

        return redirect()->route('admin.mangas.index')
            ->with('success', 'Manga updated successfully.');
    }

    public function destroy(Manga $manga)
    {
        $manga->delete();

        return redirect()->route('admin.mangas.index')
            ->with('success', 'Manga deleted successfully.');
    }
}
