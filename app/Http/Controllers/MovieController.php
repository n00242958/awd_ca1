<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|max:500',
            'release_date' => 'required|max:500',
            'review_score' => 'required|integer',
            'age_rating' => 'required|integer'
        ]);

        // Parse the date field
        $releaseDate = Carbon::parse($request->release_date);

        // Save the movie's poster
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/movies'), $imageName);

        // Finally, store the movie
        Movie::create([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
            'release_date' => $releaseDate,
            'review_score' => $request->review_score,
            'age_rating' => $request->age_rating,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Return to index and notify success
        return to_route('movies.index')->with('success', 'Movie created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit')->with('movie', $movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|max:500',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|max:500',
            'release_date' => 'required|max:500',
            'review_score' => 'required|integer',
            'age_rating' => 'required|integer'
        ]);

        // Parse the date field
        $releaseDate = Carbon::parse($request->release_date);

        // Organise new fields
        $updateFields = [
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $releaseDate,
            'review_score' => $request->review_score,
            'age_rating' => $request->age_rating,
            'updated_at' => now()
        ];

        // If an image was submitted, save it and add to the update fields
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/movies'), $imageName);
            $updateFields['image'] = $imageName;
        }

        // Finally, update the movie
        $movie->update($updateFields);

        // Return to index and notify success
        return to_route('movies.index')->with('success', 'Movie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
