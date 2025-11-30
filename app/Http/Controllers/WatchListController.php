<?php

namespace App\Http\Controllers;

use App\Models\WatchList;
use App\Models\Movie;
use Illuminate\Http\Request;

class WatchListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $watch_lists = WatchList::all();
        return view('watch_lists.index', compact('watch_lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all the movies for our checkboxes
        $movies = Movie::all();

        return view('watch_lists.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|max:500',
            'movies' => 'required|array', // Makes sure at least one checkbox is checked
            'movies.*' => 'exists:movies,id' // Ensures selected IDs exist in the database
        ]);

        // Save the watch list's poster
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/watch_lists'), $imageName);

        // Finally, store the watch list
        $watch_list = WatchList::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'image' => $imageName,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Attach the list of movies
        $watch_list->movies()->attach($request->movies);

        // Return to index and notify success
        return to_route('watch_lists.index')->with('success', 'Watch list created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(WatchList $watchList)
    {
        // Get movies belonging to this watch list
        $watchList->load("movies");
        // Get owner of this watch list
        $watchList->load("user");
        return view('watch_lists.show', compact('watchList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WatchList $watchList)
    {
        // Get all the movies for our checkboxes
        $movies = Movie::all();
        // Get movies belonging to this watch list
        $watchList->load("movies");

        return view('watch_lists.edit', compact('movies'))->with('watchList', $watchList);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WatchList $watchList)
    {
        // validate roles and ownership
        if (auth()->user()->role != 'admin' && auth()->user() != $watchList->user) {
            return redirect()->route('watch_lists.show', $watchList)->with('failure', 'Access denied.');
        }

        // Validate the request
        $request->validate([
            'name' => 'required|max:500',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|max:500',
            'movies' => 'required|array', // Makes sure at least one checkbox is checked
            'movies.*' => 'exists:movies,id' // Ensures selected IDs exist in the database
        ]);

        // Organise new fields
        $updateFields = [
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => now()
        ];

        // If an image was submitted, save it and add to the update fields
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/watch_lists'), $imageName);
            $updateFields['image'] = $imageName;
        }

        // Finally, update the watch list
        $watchList->update($updateFields);

        // Attach the list of movies
        $watchList->movies()->sync($request->movies);

        // Return to index and notify success
        return to_route('watch_lists.index')->with('success', 'Watch list updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WatchList $watchList)
    {
        // validate roles and ownership
        if (auth()->user()->role != 'admin' && auth()->user() != $watchList->user) {
            return redirect()->route('watch_lists.index')->with('failure', 'Access denied.');
        }

        // Remove specified model from database
        $watchList->delete();

        // Return to index and notify success
        return to_route('watch_lists.index')->with('success', 'Watch list deleted successfully');
    }
}
