<?php

namespace App\Http\Controllers;

use App\Models\Casting;
use Illuminate\Http\Request;

class CastingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // TODO: make separate page for form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'person' => 'required|string|min:1|max:512',
            'role' => 'required|string|min:1|max:1024',
        ]);

        $movie->castings()->create([
            'movie_id' => $movie->id(),
            'person' => $request->input('person'),
            'role' => $request->input('role')
        ]);

        return redirect()->route('movies.show', $movie)->with('success', 'Casting added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Casting $casting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Casting $casting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Casting $casting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Casting $casting)
    {
        //
    }
}
