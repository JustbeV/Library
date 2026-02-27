<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('animes.index', compact('animes'));
    }

    public function create()
    {
        return view('animes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        Anime::create($request->all());

        return redirect()->route('animes.index')
            ->with('success', 'Anime added successfully!');
    }

    public function edit(Anime $anime)
    {
        return view('animes.edit', compact('anime'));
    }

    public function update(Request $request, Anime $anime)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $anime->update($request->all());

        return redirect()->route('animes.index')
            ->with('success', 'Anime updated successfully!');
    }

    public function destroy(Anime $anime)
    {
        $anime->delete();

        return redirect()->route('animes.index')
            ->with('success', 'Anime deleted successfully!');
    }
    public function show($id)
{
    $anime = \App\Models\Anime::with('episodes')->findOrFail($id);
    return view('animes.show', compact('anime'));
}
}
