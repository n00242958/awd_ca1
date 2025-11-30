<?php

namespace App\Http\Controllers;

use App\Models\Casting;
use Illuminate\Http\Request;
use App\Models\Movie;

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
    public function create(Movie $movie)
    {
        // Give view the parent movie
        return view('castings.create')->with('movie', $movie);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Movie $movie)
    {
        // validate roles
        if (auth()->user()->role != 'admin') {
            return redirect()->route('movies.show', $movie)->with('failure', 'Access denied.');
        }

        // validate inputs
        $request->validate([
            'person' => 'required|string|min:1|max:512',
            'role' => 'required|string|min:1|max:1024',
        ]);

        $movie->castings()->create([
            'movie_id' => $movie->id,
            'person' => $request->input('person'),
            'role' => $request->input('role')
        ]);

        // redirect with success
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
        return view('castings.edit')->with('casting', $casting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Casting $casting)
    {
        // validate roles
        if (auth()->user()->role != 'admin') {
            return redirect()->route('movies.show', $casting->movie)->with('failure', 'Access denied.');
        }

        // validate inputs
        $request->validate([
            'person' => 'required|string|min:1|max:512',
            'role' => 'required|string|min:1|max:1024',
        ]);

        // Organise new fields
        $updateFields = [
            'person' => $request->person,
            'role' => $request->role,
            'updated_at' => now()
        ];

        // Finally, update the watch list
        $casting->update($updateFields);

        // Return to index and notify success
        return to_route('movies.show', $casting->movie)->with('success', 'Casting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Casting $casting)
    {
        // validate roles
        if (auth()->user()->role != 'admin') {
            return redirect()->route('movies.show', $casting->movie)->with('failure', 'Access denied.');
        }

        // Remove specified model from database
        $casting->delete();

        // Return to index and notify success
        return to_route('movies.show', $casting->movie)->with('success', 'Casting deleted successfully');
    }
}
